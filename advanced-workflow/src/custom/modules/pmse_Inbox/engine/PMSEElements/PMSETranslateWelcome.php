<?php
use \Zend\Http\Client;
use \Sugarcrm\Sugarcrm\ProcessManager;

/**
 * Email translation action used to send translated emails to new
 * Applicants.
 *
 * Yandex API documentation can be found at:
 * https://tech.yandex.com/translate/doc/dg/concepts/About-docpage/
 */
class PMSETranslateWelcome extends PMSEScriptTask
{
    /**
     * The Yandex service URL
     * @var string
     */
    protected $apiUrl = 'https://translate.yandex.net/api/v1.5/tr.json/';

    /**
     * List of available endpoints for consumption
     * @var array
     */
    protected $endpoints = [
        'getLangs' => 'getLangs',
        'translate' => 'translate',
    ];

    /**
     * The Yandex service key for authentication
     * @var string
     */
    protected $apiKey = 'ENTER_YOUR_YANDEX_API_KEY_HERE';

    /**
     * List of supported languages for translation
     * @var array
     */
    protected $supportedLanguages = [];

    /**
     * @inheritDoc
     */
    public function run($flowData, $bean = null, $externalAction = '', $arguments = array())
    {
        if (!$this->verifyPreferredLanguage($bean)) {
            return;
        }

        // If we are here then we are golden. Grab our parsed template.
        $this->sendTranslatedWelcomeEmail($bean);

        // If we are waking up then update this flow, otherwise create a new one
        $flowAction = $externalAction === 'RESUME_EXECUTION' ? 'UPDATE' : 'CREATE';
        return $this->prepareResponse($flowData, 'ROUTE', $flowAction);
    }

    /**
     * Gets the list of supported translation languages as an array of
     * key (language code) => name (English name of the language) pairs
     * @return array
     */
    public function getSupportedLanguages()
    {
        // Load up the languages if we haven't already
        if (empty($this->supportedLanguages)) {
            // The args needed for this request
            $args = [
                'ui' => 'en',
            ];
            $data = $this->callService('getLangs', $args);

            // If for some reason we didn't get back a good response just send back english
            $this->supportedLanguages = isset($data['langs']) ? $data['langs'] : ['en' => 'English'];
        }

        return $this->supportedLanguages;
    }

    /**
     * Translates text based on the language preference set on the bean.
     * NOTE: This is protected since certain assurances are required for this to
     * run and those assurances are handled elsewhere in this class.
     * @param SugarBean $bean The SugarBean object with the 'preferred_language' field set
     * @param string $text The text to translate
     * @param string $format One of either 'plain' or 'html'
     * @return string
     */
    protected function translateText(SugarBean $bean, $text, $format = 'plain')
    {
        // The arguments needed for this endpoint
        $args = [
            // This set up is FROMLANGUAGECODE-TOLANGUAGECODE
            'lang' => 'en-' . $bean->preferred_language,
            // Since the HTTP client will escape characters for us, only urlencode
            // if we are plain text translation
            'text' => $format === 'html' ? $text : urlencode($text),
            // Set the format so the service knows what to do with this request
            'format' => $format,
        ];
        $data = $this->callService('translate', $args);

        // If there is a translation, return it, otherwise return the original
        return isset($data['text']) ? urldecode($data['text'][0]) : $text;
    }

    /**
     * Verifies that the preferred language on the bean is a code that is understandable
     * by the service provider
     * @param  SugarBean $bean SugarBean object with the 'preferred_language' field set
     * @return boolean
     */
    protected function verifyPreferredLanguage(SugarBean $bean)
    {
        if (empty($bean->preferred_language)) {
            return false;
        }

        $languages = $this->getSupportedLanguages();
        return !empty($languages[$bean->preferred_language]);
    }

    /**
     * Assures that the necessary elements of a translation request are in place
     * @param  SugarBean $bean SugarBean object with necessary data verified to be set
     * @return boolean
     */
    protected function verifyRequirements(SugarBean $bean)
    {
        // Needed for a few loggers
        $beanName = $bean->getModuleName();
        if (!$bean instanceof Person) {
            $this->getLogger()->warning("Could not send email to $beanName:{$bean->id}");
            return false;
        }

        if (empty($bean->preferred_language)) {
            $this->getLogger()->warning("No preferred language set, no translation needed.");
            return false;
        }

        if (empty($bean->email[0]['email_address'])) {
            $this->getLogger()->warning("No email address found for $beanName:{$bean->id}");
            return false;
        }

        if (empty($bean->full_name)) {
            $this->getLogger()->warning("No full name found for $beanName:{$bean->id}");
            return false;
        }

        return true;
    }

    /**
     * Sends a translated welcome email template to a SugarBean entity based on
     * the 'preferred_language' setting for that record.
     * @param SugarBean $bean SugarBean object to receive the translated email
     * @return null
     */
    protected function sendTranslatedWelcomeEmail(SugarBean $bean)
    {
        if (!$this->verifyRequirements($bean)) {
            return;
        }

        // Get the mailer... FROM headers are already handled here
        $mailer = MailerFactory::getSystemDefaultMailer();

        // Get the email template to translate
        $et = BeanFactory::newBean('pmse_Emails_Templates');
        $et->disable_row_level_security = true;
        $et->retrieve_by_string_fields([
            'name' => 'New Applicant Welcome Email',
            'base_module' => 'Leads',
        ]);

        // Needed to parse template variables
        $templateMerger = ProcessManager\Factory::getPMSEObject('PMSEBeanHandler');

        // Get the HTML email body
        $htmlBody = from_html($templateMerger->mergeBeanInTemplate($bean, $et->body_html));

        // Translate the body
        $htmlBody = $this->translateText($bean, $htmlBody, 'html');

        // Set the body into the mailer now
        $mailer->setHtmlBody($htmlBody);

        // Handle text body setting
        if (empty($et->body)) {
            $textBody = strip_tags(br2nl($htmlBody));
        } else {
            $textBody = $this->translateText($bean, $templateMerger->mergeBeanInTemplate($bean, $et->body));
        }
        $mailer->setTextBody($textBody);

        // Set the subject
        $subject = from_html($templateMerger->mergeBeanInTemplate($bean, $et->subject));
        $subject = $this->translateText($bean, $subject);
        $mailer->setSubject($subject);

        // Now address the thing
        $mailer->addRecipientsTo(
            new EmailIdentity(
                $bean->email[0]['email_address'],
                $bean->full_name
            )
        );

        // Finally, send the message
        try {
            $mailer->send();
        } catch (MailerException $mailerException) {
            $message = $mailerException->getMessage();
            $this->getLogger()->warning(
                "Error sending translated welcome email to {$bean->full_name}. Error: {$message}"
            );
        }
    }

    /**
     * Service consumer wrapper. Simply sends a request to the service and handles
     * the response
     * @param stromg $endpoint The endpoint of the service to consume
     * @param array $args The argument array needed by the service
     * @param string $method The HTTP method to consume the service with
     * @return array
     */
    private function callService($endpoint, array $args = [], $method = Zend_Http_Client::GET)
    {
        if (!isset($this->endpoints[$endpoint])) {
            return ['error' => "Endpoint '$endpoint' not found"];
        }

        // We always need this
        if (!isset($args['key'])) {
            $args['key'] = $this->apiKey;
        }

        // Build the getLangs endpoint URI
        $url = $this->apiUrl . $this->endpoints[$endpoint];
        $client = new Zend_Http_Client($url);

        if ($method !== Zend_Http_Client::POST) {
            $method = Zend_Http_Client::GET;
        }

        // Required to make our request work
        $call = 'setParameterGet';
        if ($method === Zend_Http_Client::POST) {
            $call = 'setParameterPost';
        }
        $client->{$call}($args);
        $reply = $client->request();

        // Reply should be a Zend_Http_Response object
        if (!$reply instanceof Zend_Http_Response) {
            // If it isn't send back an error array
            return ['error' => 'Request failed to return correct data'];
        }

        // Get the relevant part of the response needed for this method
        return json_decode($reply->getBody(), true);
    }
}
