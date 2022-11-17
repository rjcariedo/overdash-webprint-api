<?php 

require __DIR__ . '/vendor/autoload.php';

//Reading data from spreadsheet.

$client = new \Google_Client();

$client->setApplicationName('google sheets with php');

$client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);

$client->setAccessType('offline');

$client->setAuthConfig(__DIR__ . '/credentials.json');

$service = new Google_Service_Sheets($client);

$spreadsheetId = "1RRtqf_I85M4J5gtdFUqSvutJ5rl6AVZPxGsoX35V69I";

$get_range = "Sheet18!A2:C3";

$response = $service->spreadsheets_values->get($spreadsheetId, $get_range);

$values = $response->getValues();

$update_range = "Sheet18!A2:C3";

$values = [[$value1, $value2]];

$body = new Google_Service_Sheets_ValueRange([

    'values' => $values

  ]);

  $params = [

    'valueInputOption' => 'RAW'

  ];

  $update_sheet = $service->spreadsheets_values->update($spreadsheetId, $update_range, $body, $params);
