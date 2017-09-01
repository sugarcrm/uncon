# Creating a Yearbook in the Student's side pane

## Prerequisites
1. This tutorial requires to have the Professor M package intalled. Please fin the instructions [here](https://github.com/sugarcrm/uncon/tree/2017/ProfessorM)
2. Download images.zip and uncompress it on your machine.
3. Open Postman, Click the gear icon in the upper right corner and select Manage Environments.
4. Add a key called "Note_Path" and fill the value with the absolute path of your 'images' folder. Exple: `/Users/<username>/Desktop/images`
5. Click on `Update` and then download the environment file.
6. Download `Notes_PostmanCollection.json` from this repo.
6. Install newman with `npm install -g newman` in your terminal.
7. Run: `newman run path/to/Notes_PostmanCollection.json --environment <environment_file>`. This creates Notes records in you instance and links the images to them.

## Let's build the yearbook!
The `custom` folder contains all the code necessary for the tutorial.
Please carefully follow the steps on the given document.
