# UnCon 2016

## Elasticsearch file search

Copyright (C) 2016 SugarCRM Inc.

Proof of concept module adding customizations to the new Elasticsearch framework. This customization extends the GlobalSearch provider adding the ability to perform full text search on files for both Notes/Attachments as well as for the Documents module.

### Requirements
- Sugar v7.7.1.0 installed
- Attachment plugin for Elasticsearch https://github.com/elastic/elasticsearch-mapper-attachments
- Supported file types are available at http://tika.apache.org/1.5/formats.html

### Installation
- Install SugarCRM 7.7.1.0
- Use module loader to install the latest release zip from this repository
- Perform a full reindex with "drop existing data" to ensure the mapping is up-to-date

### Usage
- Add notes and/or documents with file attachments
- Execute "php cron.php" to make sure everything is properly indexed
- Use global search bar at the top to search for text

### Notes
- File attachment modules are forced to be indexed in an asynchronous manner to avoid inline indexing when users are saving huge file attachements. Therefor always make sure you run cron or that cron is automatically triggered.

