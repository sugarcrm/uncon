UnCon 2017 Code Samples
----------------------

Prerequisites:
- Git and PHP installed
- access to a Sugar instance (does not need to be locally installed)

## Installing Sample Packages

To install these code sample packages into any Sugar instance, use the following steps:

1. Login to Sugar as an Administrator.
2. Go to Administration > Module Loader.
3. "Upload" the zip from PACKAGE_NAME/releases directory.
4. Click "Install" on your package in the list.

## Editing and Rebuilding a new version of a Package

- Check out this Git repository and make changes to the package.

        $ git clone git@github.com:sugarcrm/uncon.git
        $ git checkout origin/2017
        $ cd PACKAGE_NAME

- Follow the directions in the README for each package for build instructions.
