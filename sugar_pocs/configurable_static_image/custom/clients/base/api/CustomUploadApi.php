<?php
class CustomUploadApi extends SugarApi
{
    public function registerApiRest()
    {
        return array(
            'customSaveTempImagePost' => array(
                'reqType' => 'POST',
                'path' => array('Home', 'temp', 'file', 'static_image'),
                'pathVars' => array('module', 'temp', '', 'field'),
                'method' => 'saveTempImagePost',
                'rawPostContents' => true,
                'shortHelp' => 'Saves an image to a temporary folder.',
                'longHelp' => 'include/api/help/module_temp_file_field_post_help.html',
            ),
            'customGetImage' => array(
                'reqType' => 'GET',
                'path' => array('Home', 'file', 'static_image'),
                'pathVars' => array('module', 'field'),
                'method' => 'getImage',
                'rawReply' => true,
                'allowDownloadCookie' => true,
                'shortHelp' => 'Reads an image.',
                'longHelp' => '',
            ),
            'customDeleteImage' => array(
                'reqType' => 'DELETE',
                'path' => array('deleteDashletImage'),
                'pathVars' => array(),
                'method' => 'deleteImage',
                'shortHelp' => 'Deletes an image.',
                'longHelp' => '',
            ),
        );
    }

    public function deleteImage($api, $args) {
       if ($args['image'] && SugarAutoloader::fileExists('dashletImages/' . $args['image'])) {
		   $fileUpload = new UploadStream();
		
			$fileUpload->unlink('upload://' . $args['image']);
       }
    }

    public function getImage($api, $args) {
        $fileInfo = finfo_open(FILEINFO_MIME_TYPE);
        $path = 'upload/' . $args['_hash'];

        $mime = finfo_file($fileInfo, $path);
        finfo_close($fileInfo);

        header("Pragma: public");
        header("Cache-Control: maxage=1, post-check=0, pre-check=0");

        header("Content-Type: {$mime}");
        header("X-Content-Type-Options: nosniff");
        //header("Content-Length: " . filesize($path));
        header('Expires: ' . gmdate('D, d M Y H:i:s \G\M\T', time() + 2592000));

		$fileUpload = new UploadFile();

        $fileUpload->temp_file_location = $path;
        echo $fileUpload->get_file_contents();

        die;
    }

    public function saveTempImagePost($api, $args)
    {
        $name = $_FILES["static_image"]["name"];
        $ext = end(explode(".", $name));

        $saveName = create_guid(). "." . $ext;
		SugarAutoLoader::ensureDir('upload');

		$fileUpload = new UploadStream();
		
        $fileUpload::move_uploaded_file($_FILES['static_image']['tmp_name'], "upload://" . $saveName);

        // This is a good return
        return array(
            'static_image' => $this->getFileInfo($saveName, $api),
            //'record' => $this->formatBean($api, $args, BeanFactory::getBean('Home'))
        );
    }

    protected function getFileInfo($filename,  $api) {
        $info = array();

        $filepath = 'upload://' . $filename;
        //$filedata = getimagesize($filepath);

        // Add in height and width for image types
        $info = array(
            'content-type' => $_FILES['static_image']['type'],
            //'content-length' => filesize($filepath),
            'name' => $filename,
            'path' => $filepath,
            //'width' => empty($filedata[0]) ? 0 : $filedata[0],
            //'height' => empty($filedata[1]) ? 0 : $filedata[1],
            'uri' => $api->getResourceURI(),
        );


        return $info;
    }
}