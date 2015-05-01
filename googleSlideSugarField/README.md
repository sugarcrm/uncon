googleSlideSugarField
---------------------
Google Docs SugarCRM field

Steps:

1. Make a presentation in Google Docs. Note the identifier (the hash-looking thing) in the URL.
2. Update the paths in `Makefile` to match your Sugar installation directory.  On Linux, you need to rename all the gmkdir's to plain mkdir's. On Mac OS X, brew install coreutils.
3. Run `make`
3. Log into Sugar as an Administrator
3. Run Admin > Repair > Quick Repair and Rebuild
4. Go to Admin > Studio and make a new field of Google Slides Presentation type in the Meetings module
5. Add the new field into the Record view
6. When editing, put the identifier in the field.
7. When viewing, you should see an embedded iframe. That's your Google presentation!

Copyright (C) SugarCRM, 2015.
