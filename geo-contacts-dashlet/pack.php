#!/usr/bin/env php
<?php
/*
 * Your installation or use of this SugarCRM file is subject to the applicable
 * terms available at
 * http://support.sugarcrm.com/06_Customer_Center/10_Master_Subscription_Agreements/.
 * If you do not agree to all of the applicable terms or do not have the
 * authority to bind the entity as an authorized representative, then do not
 * install or use this SugarCRM file.
 *
 * Copyright (C) SugarCRM Inc. All rights reserved.
 */

if (empty($argv[1])) {
    die("Use $argv[0] [version]\n");
}

$version = $argv[1];
$id = "scon15-geo-contacts-dashlet-{$version}";
$name = "SugarCon 2015 Elastichsearch Geo Searching POC";
$zipFile = "sugarcrm-{$id}.zip";

$manifest = array(
    'id' => 'scon15-geo-contacts-dashlet-' . $version,
    'name' => $name,
    'readme' => 'NOTE: Please run a full search re-index (delete existing data).',
    'description' => 'Adds a Contacts Near Me dashlet used to locate nearby contacts',
    'version' => $version,
    'author' => 'SugarCRM, Inc.',
    'is_uninstallable' => 'true',
    'published_date' => date("Y-m-d H:i:s"),
    'type' => 'module',
    'acceptable_sugar_versions' => array(
        'exact_matches' => array(),
        'regex_matches' => array(
            '7\.[56]*',
        ),
    ),
);

$installdefs = array(
    'id' => $manifest['id'],
    'custom_fields' => array(
        'Contactslat_long_c' => array(
            'id' => 'Contactslat_long_c',
            'name' => 'lat_long_c',
            'label' => 'LBL_LAT_LONG_C',
            'comments' => '',
            'help' => '',
            'module' => 'Contacts',
            'type' => 'varchar',
            'max_size' => '255',
            'require_option' => '0',
            'default_value' => '',
            'date_modified' => '2015-04-17 22:49:15',
            'deleted' => '0',
            'audited' => '0',
            'mass_update' => '0',
            'duplicate_merge' => '1',
            'reportable' => '1',
            'importable' => 'true',
            'ext1' => '',
            'ext2' => '',
            'ext3' => '',
            'ext4' => '',
        ),
        'Accountslat_long_c' => array(
            'id' => 'Accountslat_long_c',
            'name' => 'lat_long_c',
            'label' => 'LBL_LAT_LONG_C',
            'comments' => '',
            'help' => '',
            'module' => 'Accounts',
            'type' => 'varchar',
            'max_size' => '255',
            'require_option' => '0',
            'default_value' => '',
            'date_modified' => '2015-04-17 22:49:15',
            'deleted' => '0',
            'audited' => '0',
            'mass_update' => '0',
            'duplicate_merge' => '1',
            'reportable' => '1',
            'importable' => 'true',
            'ext1' => '',
            'ext2' => '',
            'ext3' => '',
            'ext4' => '',
        ),
    ),
);

$installerFiles = array("LICENSE.txt", "README.txt", "manifest.php");

echo "Creating {$zipFile} ... \n";
$zip = new ZipArchive();
$zip->open($zipFile, ZipArchive::CREATE);

$basePath = realpath('src/');
$files = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($basePath),
    RecursiveIteratorIterator::LEAVES_ONLY
);

foreach ($files as $name => $file) {
    if ($file->isFile()) {
        $fileReal = $file->getRealPath();
        $prefix = in_array($file->getFilename(), $installerFiles) ? '' : 'src';
        $fileRelative = $prefix . str_replace($basePath, '', $fileReal);
        echo " [*] $fileRelative \n";
        $zip->addFile($fileReal, $fileRelative);
        if (!in_array($file->getFilename(), $installerFiles)) {
            $installdefs['copy'][] = array(
                'from' => '<basepath>/' . $fileRelative,
                'to' => str_replace('src/', '', $fileRelative),
            );
        }
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
