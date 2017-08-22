Professor M's School for Gifted Coders
----------------------

(more detailed instructions coming soon)

Prerequisites:
- Sugar 7.9.0.1 installed with NO sample data
- Postman installed (www.getpostman.com)

Install the modules and customizations:
- Download ProfM.zip
- Login to Sugar as an Administrator
- Go to Administration > Module Loader
- "Upload" the zip 
- Click "Install" for the ProfessorM module
- Review and accept the license agreement.  Click "Commmit."

Hide modules that will not be used:
- Login to Sugar as an Administrator if you have not already done so
- Go to Administration > Display Modules and Subpanels
- Drag the following modules from the Displayed Modules box to the Hidden Modules box:
  - Calendar
  - Calls
  - Meetings
  - Tasks
  - Notes
  - Emails
  - Campaigns
  - Targets
  - Target Lists
  - Quotes
  - Forecasts
  - Process Definitions
  - Processes
  - Process Business Rules
  - Process Email Templates
  - Documents
  - Cases
  - Tags
- Rearrange the items in the Displayed Modules box so they are in the following order from top to bottom:
  - Accounts
  - Leads
  - Contacts
  - Professors
  - Opportunities
  - Revenue Line Items
  - Reports
- Click Save

Use the Sugar REST API to create the Professor M sample data
- Download ProfessorM_SampleData/ProfessorM_PostmanCollection.json
- In Postman, click Import
- Click Choose Files and import the Postman collection you just downloaded
- Close the Import dialog
- Create a new Postman environment with the following keys and values
  - url: the url of your Sugar installation (for example, http://localhost:8888/profm)
  - rest_endpoint:  /rest/v10
  - username:  the username for an admin user in your Sugar installation
  - password:  the password associated with the username above
- Click Runner
- Select the "ProfessorM Sample Data" collection
- Ensure the environment you just created is selected
- Click Run ProfessorM S...
- Wait for the collection to finish running.
Hint:  If you see many failures, you may have forgotten to install the modules and customizations using ProfM.zip.  See instructions in previous section for how to do the install.

About the sample data
- coming soon
