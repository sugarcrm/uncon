<?php

if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

class EngagementDashletDataApi extends SugarApi
{
    public function registerApiRest()
    {
        return array(
            'GetEnagagementDashletDataUIVerticalSlice' => array(
                'reqType' => 'GET',
                'path' => array('engagement-dashlet', 'get-engagement-dashlet-data'),
                'pathVars' => array(),
                'method' => 'getEnagagementDashletData',
                'shortHelp' => 'Built with low effort and minimising API calls in mind it returns a vertical slice of data for the dashlet, although not pretty it is pragmatic',
                'longHelp' => '',
            )
        );
    }

    /**
     * Returns the vertical slice of data required
     * This is not considered a beautiful design, it's simply pragmatic
     */
    public function getEnagagementDashletData($api, $args) {
        // get access to db via global
        global $db;

        // question for attendees: what potential risks are there if we leave this code as it is?
        $days = $args['days'];
        $accountId = $args['account_id'];

        // execute the query
        $result = $db->query(
            $this->getEngagementDashletDataQuery($accountId, $days)
        );

        $return = [];

        // question for attendees: see anything else that could be an issue here?
        while ($row = $db->fetchByAssoc($result)) {
            $return['calls'] = [
                'total' => (int)$row['total_calls'],
                'scheduled' => (int)$row['scheduled_calls'],
                'canceled' => (int)$row['canceled_calls'],
                'held' => (int)$row['held_calls'],
            ];

            $return['meetings'] = [
                'total' => (int)$row['total_meetings'],
                'scheduled' => (int)$row['scheduled_meetings'],
                'canceled' => (int)$row['canceled_meetings'],
                'held' => (int)$row['held_meetings'],
            ];

            $return['next_call'] = empty($row['next_call']) ? 'N/A' : $row['next_call'];
            $return['next_meeting'] = empty($row['next_meeting']) ? 'N/A' : $row['next_meeting'];
        }

        // question for attendees: what should we do here?
        $return = (empty($return)) ? ["result" => false] : $return;

        return json_encode($return);
    }

    /**
     * Get the query to return the data for the dashlet
     * @param $accountId
     * @param $days
     * @return string
     */
    protected function getEngagementDashletDataQuery($accountId, $days)
    {
        // question for attendees: imagine you were asked to review this query, do you see any issues with it?

        return "SELECT
(
  SELECT count(*) from calls WHERE parent_id = '{$accountId}' AND date_start >= DATE_SUB(CURDATE(), INTERVAL {$days} DAY)
) as total_calls,
(
  SELECT count(*) from calls WHERE parent_id = '{$accountId}' AND status = 'Planned' AND date_start >= DATE_SUB(CURDATE(), INTERVAL {$days} DAY)
) as scheduled_calls,
(
  SELECT count(*) from calls WHERE parent_id = '{$accountId}' AND status = 'Not Held' AND date_start >= DATE_SUB(CURDATE(), INTERVAL {$days} DAY)
) as canceled_calls,
(
  SELECT count(*) from calls WHERE parent_id = '{$accountId}' AND status = 'Held' AND date_start >= DATE_SUB(CURDATE(), INTERVAL {$days} DAY)
) as held_calls,
(
  SELECT count(*) from meetings WHERE parent_id = '{$accountId}' AND date_start >= DATE_SUB(CURDATE(), INTERVAL {$days} DAY)
) as total_meetings,
(
  SELECT count(*) from meetings WHERE parent_id = '{$accountId}' AND status = 'Planned' AND date_start >= DATE_SUB(CURDATE(), INTERVAL {$days} DAY)
) as scheduled_meetings,
(
  SELECT count(*) from meetings WHERE parent_id = '{$accountId}' AND status = 'Not Held' AND date_start >= DATE_SUB(CURDATE(), INTERVAL {$days} DAY)
) as canceled_meetings,
(
  SELECT count(*) from meetings WHERE parent_id = '{$accountId}' AND status = 'Held' AND date_start >= DATE_SUB(CURDATE(), INTERVAL {$days} DAY)
) as held_meetings,
(
  SELECT date_start from meetings WHERE parent_id = '{$accountId}' AND status = 'Planned' AND date_start >= DATE_SUB(CURDATE(), INTERVAL {$days} DAY) ORDER BY date_start asc LIMIT 1
) as next_meeting,
(
  SELECT date_start from calls WHERE parent_id = '{$accountId}' AND status = 'Planned' AND date_start >= DATE_SUB(CURDATE(), INTERVAL {$days} DAY) ORDER BY date_start asc LIMIT 1
) as next_call;
        ";
    }

}

