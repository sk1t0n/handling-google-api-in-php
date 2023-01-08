# handling-google-api-in-php

Handling Google API in php using the google/apiclient package.

## Set up your environment to work with Google API

[Guide](https://www.roelpeters.be/solved-the-caller-does-not-have-permission-using-the-api-with-a-private-google-spreadsheet/)

1. [Create](https://cloud.google.com/resource-manager/docs/creating-managing-projects) a Google Cloud Platform project.
2. [Enable](https://console.cloud.google.com/apis/library/sheets.googleapis.com?q=spreadsheet&id=739c20c5-5641-41e8-a938-e55ddc082ad1&supportedpurview=project) the API.
3. Go to the [service account page](https://console.cloud.google.com/iam-admin/serviceaccounts), select your project and create a new service account.
4. Download the key. Rename the file to credentials.json. Create a data folder and move the credentials.json file there.
5. Go back to the [service account page](https://console.cloud.google.com/iam-admin/serviceaccounts) and copy the email address associated with your service account.
6. Go to your spreadsheet and click Share in the top right corner.
7. Click Advanced in the bottom right corner of the window that pops up.
8. Send the invite to the service account by pasting the email address and clicking Send.

## Installation

Change the SPREADSHEET_ID and SHEET_ID variables in the .env file to your own.

Install the PHP dependencies:

```bash
composer install
```

## Run the program

```bash
# Linux
php ./src/Infrastructure/index.php

# Windows
php .\src\Infrastructure\index.php
```
