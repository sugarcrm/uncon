# clear_cache CLI

Not all development changes (such as changes to JavaScript files) require a full Quick Repair and Rebuild in order to get these changes picked up by your Sugar installation.  Many times, all you need to do is clear the cached contents of these files under the cache/ directory of your Sugar installation.  This will force Sugar to rebuild this cache when these files are needed.

Provided here is a sample PHP script that can be used either with a file watcher or after save script in your IDE to clear your Sugar cache automatically as you make file changes.

## Setup

1. Download the `clear_cache.php` script
2. Configure your IDE or file watcher to trigger `php clear_cache.php -s "path/to/sugar/instance" [-f "file/touched.php]"`

## Tips
Passing the file is highly recommended as that will ensure only the minimum number of cache files are cleared.
