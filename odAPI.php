<?php 
require __DIR__ . '/vendor/autoload.php';
// configure the Google Client
$client = new \Google_Client();
$client->setApplicationName('google sheets with php');
$client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);
$client->setAccessType('offline');
// credentials.json is the key file we downloaded while setting up our Google Sheets API
$path = __DIR__ . '/credentials.json';
$client->setAuthConfig($path);

// configure the Sheets Service
$service = new \Google_Service_Sheets($client);

// the spreadsheet id can be found in the url https://docs.google.com/spreadsheets/d/143xVs9lPopFSF4eJQWloDYAndMor/edit
$spreadsheetId = '1RRtqf_I85M4J5gtdFUqSvutJ5rl6AVZPxGsoX35V69I';
$spreadsheet = $service->spreadsheets->get($spreadsheetId);
// var_dump($spreadsheet);

// Fetch the rows
$range = 'Sheet18';
$response = $service->spreadsheets_values->get($spreadsheetId, $range);
$rows = $response->getValues();
// Remove the first one that contains headers
$headers = array_shift($rows);
// Combine the headers with each following row
$array = [];
foreach ($rows as $row) {
    $array[] = array_combine($headers, $row);
}
$myJSON = json_encode($array, JSON_PRETTY_PRINT);
var_dump($myJSON);
