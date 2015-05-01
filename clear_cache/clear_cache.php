<?php
/*
 * This file should be used either as a file watcher or after save script in your IDE.
 * The usage is php clear_cache.php -s "path/to/sugar/instance" [-f "file/touched.php]"
 * ex. php clear_cache.php -s "/var/www/html/sugarcrm" -f "custom/clients/base/views/record/record.js"
 *
 * Passing the file is highly recommended as that will ensure only the minimum number of cache files are cleared.
 */


function remove($path)
{
    if (!file_exists($path)) {
        return true;
    }
    if (is_file($path)) {
        return unlink($path);
    }
    $d = dir($path);
    while ($e = $d->read()) {
        if ($e == '.' || $e == '..') {
            continue;
        }
        $nPath = $path . '/' . $e;
        remove($nPath);
    }
    $d->close();

    return rmdir($path);
}


$options = getopt('s:f:');
$path = $options['s'];
$file = empty($options['f']) ? "" : strtolower($options['f']);

//Do not clear cache for a cache file
if (!empty($file) && strpos($file, "cache/") > -1) {
    echo "Not clearing cache for cache file\n";
    exit(1);
}

if (is_dir($path . "/sugarcrm")) {
    $path .= "/sugarcrm";
}

if (!is_dir($path)) {
    echo "Required options -s was not a valid directory\n";
    echo "usage is php clear_cache.php -s path/to/sugar/instance [-f file/touched.php]\n";
    exit(1);
}

if (is_dir($path)) {
    //always clear the modules file_map and class_map
    remove($path . "/cache/file_map.php");
    remove($path . "/cache/class_map.php");
    remove($path . "/cache/dashlets");

    //PHP only handling
    if (empty($file) || substr($file, -4) == ".php") {
         //Only clear the cache for a single module if we can
        if (!empty($file) && preg_match('/modules\/([\w\d]*)\//', $file, $matches)) {
            remove($path . "/cache/modules/{$matches[1]}");
        } else {
            remove($path . "/cache/modules");
        }

        //Nuke the metadata cache for all php files (probably a metadata file touched)
        remove($path . "/cache/api");
        remove($path . "/cache/blowfish");
        if (empty($file) || preg_match('/vardefs|metadata|tabledictionary/', $file)) {
            remove($path . "/Relationships");
        }
        //Only need to clear the API service dictionary cache if we touched an API file
        if (empty($file) || preg_match('/clients.*api/', $file)) {
            remove($path . "/cache/include/api");
        }
        //Only clear lang cache for lang files
        if (empty($file) || preg_match('/\.lang\.php/', $file)) {
            remove($path . "/cache/jsLanguage");
        }
        //SugarLogic
        if (empty($file) || preg_match('/Expressions/', $file)) {
            remove($path . "/cache/Expressions");
        }
    }
    //Smarty templates
    if (empty($file) || substr($file, -4) == ".tpl") {
         //Only clear the smarty cache for a single module. No need to blow the whole cache out for smarty
        if (!empty($file) && preg_match('/modules\/([\w\d]*)\//', $file, $matches)) {
            remove($path . "/cache/modules/{$matches[1]}");
        }
        remove($path . "/cache/smarty");
    }
    //Only clear themes if we have touched a file that affects them
    if (empty($file) || preg_match('/\.css|styleguide|\.less|themes/i', $file)) {
        remove($path ."/cache/themes");
    }
    if (empty($file) || substr($file, -3) == ".js") {
        //javascript handling
        remove($path . "/cache/javascript");
        remove($path . "/cache/include/javascript");
    }
}