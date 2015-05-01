# UnCon 2015
Definitive source of all your UnCon materials

Copyright (C) 2015 SugarCRM Inc.

## Synopsis
UnCon was kicked off with an [introductory presentation](ROUNDTABLES/day1/UnCon 2015 Introduction.pdf).  This was then followed by roundtable discussions where small groups of Sugar Engineers and partners discussed various development topics ranging from topics for beginners all the way to advanced topics on new Sugar features and architectural changes.  Concurrent to roundtable discussions we had a hackathon where people worked on various code projects, some of which were presented at the end of UnCon.  All the available materials from the Roundtables and Hackathon are collected in this Git repository.

## Roundtable Discussions
Throughout UnCon we ran a true Un-conference via roundtable discussions.  Most of the slides that were presented along with notes, etc, are captured here under the [ROUNDTABLES](ROUNDTABLES/) directory.  For the full agenda and list of topics that were discussed at the Un-conference roundtables, please see the official [roundtable agenda](http://bit.ly/uncon2015agenda).

## (Some) Hackathon Ideas

- Bow ties are cool.  But dashlets are cooler.  Have a system you need to integrate with the Sugar UI?  Brand new to Sugar 7 development?  Then Dashlets are a great way to get your feet wet.  Try creating a chart!  Everybody loves those.  We've got plenty of Sugar Engineers around that can help you too.  *Create your first (or 100th) Sugar 7 dashlet.*

- Elasticsearch is REALLY FAST.  We are expanding our investment into Elasticsearch in future releases but the flexibility of Elastic means there's plenty of solutions that are made easier and much faster once you learn how to take advantage of it.  Whether that is full text document search or geolocation for Maps integrations.  *Explore use of Elasticsearch, with the help of the Sugar Architects, to create solutions to common customer requirements*

- Tools make everybody's life easier.  Have you had ideas for a Sugar 7 development tool but your regular job keeps getting in the way?  Now's your chance to give it a shot with the help of some friends or newly met acquaintances.  *Design and Prototype a Sugar 7 Development tool.*

- Everyone knows that in a big meeting with a prospective customer or execs, it's always LAPTOPS CLOSED and PHONES OFF.  Staring at a screen makes you appear disinterested and like you are not paying attention.  Sales is about relationships, your prospective customer will not buy from you if they do not trust you.  However, a sales person needs to be able to keep on top of any fires that might be starting at one of their other accounts or opportunities.  *Design and prototype a wearable that allows a CRM user to get silent, unobtrusive, and PRECISE notifications without looking at their phone or laptop.*

## UnCon 2015 Code Resources

### [clear_cache](clear_cache/)
Utility for clearing the Sugar application cache as files change.  This is a much faster method of propogating certain changes (like JavaScript changes) into your Sugar instance than using Quick Repair and Rebuild.

### [sugar_repair](sugar_repair/)
Command line script for triggering Sugar's Quick Repair and Rebuild that is easier and faster to run than using the Sugar Administration user interface.

### [geo-contacts-dashlet](geo-contacts-dashlet/)
Uses Geo-location plug-in for Elasticsearch to create a proof of concept Maps dashlet that allows you to find "Contacts near me".

### [Elastic-attachments](elastic-attachments/)
Proof of concept module loadable package that extends Sugar 7's GlobalSearch provider to perform full text search of files in Notes/Attachments and Documents modules.

### [SidecarDevTools](https://github.com/sugarcrm/SidecarDevTools)
Prototype for a Sidecar Chrome plug-in to help with Sugar 7 development.  

### [Node](node/)
Node.js Hackathon projects.  Node.js is great for quickly prototyping new integrations and solutions.  If you are interested in hacking on Internet of Things ideas via Node.js, this contains some resources to help you get started.

### [SugarLogic-Examples](sugarlogic-examples/)
Some examples of advanced metadata dependencies (beyond what is possible using Studio alone) are provided here.  

### [Google Docs SugarCRM Field](googleSlideSugarField/)
Example of a custom Sugar 7 field type that allows you to embed a Google Presentation into a field on a Sugar Record view.

## Other Resources

### [SugarCRM/Examples git repo](https://github.com/sugarcrm/examples)


### [Sugar Developer Guide](http://support.sugarcrm.com/02_Documentation/04_Sugar_Developer/)



