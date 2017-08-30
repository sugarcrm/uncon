#!/usr/bin/env php
<?php
// Copyright 2017 SugarCRM Inc.  Licensed by SugarCRM under the Apache 2.0 license.

 /****** REPLACE THESE  *******/
 $packageID = "uncon2017-quotes-customizations";
 $packageName = "Quotes Customizations Uncon 2017";
 $packageLabel = "Installs the custom fields and files for the Quotes SugarCon 2017 Tutorial";
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
    'name' => $packageName,
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

$installdefs = array(
    'copy' => array(),
    'post_execute' => array(
        0 => '<basepath>/src/post_execute.php',
    ),
    'custom_fields' => array(
        array(
            'name' => 'total_damage_amount_c',
            'audited' => false,
            'calculated' => true,
            'comment' => 'Total Damage Amount calculated from Products discount_amount rollup',
            'default_value' => '0',
            'duplicate_merge' => false,
            'enforced' => true,
            'formula' => 'rollupConditionalSum($products, "total_amount", "type_name", "Property")',
            'help' => 'Total Damage Amount calculated from Products discount_amount rollup',
            'importable' => 'true',
            'label' => 'LBL_TOTAL_DAMAGE_AMOUNT',
            'len' => '26,2',
            'massupdate' => false,
            'module' => 'ProductBundles',
            'required' => false,
            'reportable' => true,
            'type' => 'currency',
        ),
        array(
            'name' => 'total_labor_amount_c',
            'audited' => false,
            'calculated' => true,
            'comment' => 'Total Labor Amount calculated from Products discount_amount rollup',
            'default_value' => '0',
            'duplicate_merge' => false,
            'enforced' => true,
            'formula' => 'rollupConditionalSum($products, "total_amount", "type_name", "Labor")',
            'help' => 'Total Labor Amount calculated from Products discount_amount rollup',
            'importable' => 'true',
            'label' => 'LBL_TOTAL_LABOR_AMOUNT',
            'len' => '26,2',
            'massupdate' => false,
            'module' => 'ProductBundles',
            'required' => false,
            'reportable' => true,
            'type' => 'currency',
        ),
        array(
            'name' => 'total_damage_amount_c',
            'audited' => false,
            'calculated' => true,
            'comment' => 'Total Damage Amount calculated from ProductBundles total_damage_amount_c rollup',
            'default_value' => '0',
            'duplicate_merge' => false,
            'enforced' => true,
            'formula' => 'rollupCurrencySum($product_bundles, "total_damage_amount_c")',
            'help' => 'Total Damage Amount calculated from ProductBundles total_damage_amount_c rollup',
            'importable' => 'true',
            'label' => 'LBL_TOTAL_DAMAGE_AMOUNT',
            'len' => '26,2',
            'massupdate' => false,
            'module' => 'Quotes',
            'required' => false,
            'reportable' => true,
            'type' => 'currency',
        ),
        array(
            'name' => 'total_damage_percent_c',
            'audited' => false,
            'calculated' => true,
            'comment' => 'Total Damage Percent calculated from ProductBundles total_damage_amount_c rollup',
            'default_value' => '0',
            'dbType' => 'decimal',
            'duplicate_merge' => false,
            'enforced' => true,
            'formula' => 'ifElse(not(equal($total_damage_amount_c, 0)), mul(divide($total_damage_amount_c, $total),100), 0)',
            'help' => 'Total Damage Percent calculated from ProductBundles total_damage_amount_c rollup',
            'importable' => 'true',
            'label' => 'LBL_TOTAL_DAMAGE_PERCENT',
            'len' => '26,2',
            'massupdate' => false,
            'module' => 'Quotes',
            'required' => false,
            'reportable' => true,
            'type' => 'float',
        ),
        array(
            'name' => 'total_labor_amount_c',
            'audited' => false,
            'calculated' => true,
            'comment' => 'Total Labor Amount calculated from Products discount_amount rollup',
            'default_value' => '0',
            'duplicate_merge' => false,
            'enforced' => true,
            'formula' => 'rollupCurrencySum($product_bundles, "total_labor_amount_c")',
            'help' => 'Total Labor Amount calculated from ProductBundles total_labor_amount_c rollup',
            'importable' => 'true',
            'label' => 'LBL_TOTAL_LABOR_AMOUNT',
            'len' => '26,2',
            'massupdate' => false,
            'module' => 'Quotes',
            'required' => false,
            'reportable' => true,
            'type' => 'currency',
        ),
        array(
            'name' => 'total_labor_percent_c',
            'audited' => false,
            'calculated' => true,
            'comment' => 'Total Labor Percent calculated from ProductBundles total_labor_amount_c rollup',
            'default_value' => '0',
            'duplicate_merge' => false,
            'enforced' => true,
            'formula' => 'ifElse(not(equal($total_labor_amount_c, 0)), mul(divide($total_labor_amount_c, $total),100), 0)',
            'help' => 'Total Labor Percent calculated from ProductBundles total_labor_amount_c rollup',
            'importable' => 'true',
            'label' => 'LBL_TOTAL_LABOR_PERCENT',
            'len' => '26,2',
            'massupdate' => false,
            'module' => 'Quotes',
            'required' => false,
            'reportable' => true,
            'type' => 'float',
        ),
    ),
);
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
