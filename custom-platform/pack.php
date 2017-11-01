#!/usr/bin/env php
<?php
// Copyright 2017 SugarCRM Inc.  Licensed by SugarCRM under the Apache 2.0 license.

 /****** REPLACE THESE  *******/
 $packageID = "uncon2017-custom-platform";
 $packageLabel = "UnCon 2017 Custom Platform Registration";
 $supportedVersionRegex = '^7.9.[\d]+.[\d]+$';
/******************************/

if (empty($argv[1])) {
    die("Use $argv[0] [version]\n");
}

$version = $argv[1];

$id = "{$packageID}-{$version}";

$zipFile = "releases/sugarcrm-{$id}.zip";

if (file_exists($zipFile)) {
    die("Release $zipFile already exists!\n");
}

$manifest = array(
    'id' => $packageID,
    'name' => $packageLabel,
    'description' => $packageLabel,
    'version' => $version,
    'author' => 'SugarCRM, Inc.',
    'is_uninstallable' => 'true',
    'published_date' => date("Y-m-d H:i:s"),
    'type' => 'module',
    'acceptable_sugar_versions' => array(
        'exact_matches' => array(
        ),
        'regex_matches' => array(
            $supportedVersionRegex,
        ),
    ),
);

$installdefs = array('copy' => array());
echo "Creating {$zipFile} ... \n";

$zip = new ZipArchive();
$zip->open($zipFile, ZipArchive::CREATE);
$basePath = realpath('src/');

$files = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($basePath, RecursiveDirectoryIterator::SKIP_DOTS),
    RecursiveIteratorIterator::LEAVES_ONLY
);

foreach ($files as $name => $file) {
    if ($file->isFile()) {
        $fileReal = $file->getRealPath();
        $fileRelative = 'src' . str_replace($basePath, '', $fileReal);
        echo " [*] $fileRelative \n";
        $zip->addFile($fileReal, $fileRelative);
        $installdefs['copy'][] = array(
            'from' => '<basepath>/' . $fileRelative,
            'to' => preg_replace('/^src\/(.*)/', '$1', $fileRelative),
        );
    }
}

$manifestContent = sprintf(
    "<?php\n\$manifest = %s;\n\$installdefs = %s;\n",
    var_export($manifest, true),
    var_export($installdefs, true)
);

$zip->addFromString('manifest.php', $manifestContent);
$zip->close();

echo "done\n";
exit(0);
