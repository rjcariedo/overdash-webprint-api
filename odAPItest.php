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

$a = array();

//sending text entry
$obj1->type = 0;
$obj1->content = $rows[0][0];	
$obj1->bold = 1;
$obj1->align =2;
$obj1->format = 3;
array_push($a,$obj1);

//sending image entry		
$obj2->type = 1;
$obj2->path = 'https://www.mydomain.com/image.jpg';
$obj2->align = 2;
array_push($a,$obj2);

//sending barcode entry		
$obj3->type = 2;
$obj3->value = '1234567890123';
$obj3->width = 100;
$obj3->height = 50;
$obj3->align = 0;
array_push($a,$obj3);

//sending QR entry		
$obj4->type = 3;
$obj4->value = 'sample qr text';
$obj4->size = 40;
$obj4->align = 2;
array_push($a,$obj4);

//sending HTML Code	
$obj5->type = 4;
$obj5->content = "<center><span style=\"font-weight:bold; font-size:20px;\">This is sample text</span></center>";
array_push($a,$obj5);

//sending empty line
$obj6->type = 0;
$obj6->content = ' ';
$obj6->bold = 0;
$obj6->align = 0;
array_push($a,$obj6);

//sending multi lines text
$obj7->type = 0;
$obj7->content = 'This text has<br />two lines';
$obj7->bold = 0;
$obj7->align = 0;
array_push($a,$obj7);

echo json_encode($a,JSON_FORCE_OBJECT);