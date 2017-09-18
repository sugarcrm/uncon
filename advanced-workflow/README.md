# UnCon 2017

## Building code customizations for Advanced Workflow

Copyright (C) 2017 SugarCRM Inc.

### Requirements
- SugarCRM 7.9.0
  - SugarCRM 7.9.1 recommended
- PHP 5.4+
  - PHP 7.1 required for use with SugarCRM 7.9.2
- The Professor M Scenario
- A Yandex API Key
  - You can get one free at [https://translate.yandex.com/developers/keys](https://translate.yandex.com/developers/keys)

### Installation
- Install SugarCRM
- Install the Professor M Scenario
- Install the module loadable package from this repository
  - Enter your Yandex API key in the $apiKey property of the ***PMSETranslateWelcome*** class in the file at
  custom/modules/pmse_Inbox/engine/PMSEElements/PMSETranslateWelcome.php
- Import the included Process Email Template (`New_Applicant_Welcome_Email.pet`)
- Import the included Process Definition (`Send_New_Applicant_Welcome_Message.bpm`)
- Enable the imported Process Definition

### Notes
This repository contains a number of different icons that can be used in Process Definition. To change to a different icon, simply update the custom.less file and use a different image name from one of the choices.

### Use of included code
After installation of this code, you must run a Repair and Rebild and you must hard refresh your browser so that all changes to the CSS and Javascript are picked up in your instance.
