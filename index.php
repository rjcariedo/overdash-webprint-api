<!DOCTYPE html>
<html>
<head>
<title>How to put PHP in HTML</title>
</head>
<body>
<div>This is pure HTML message.</div>
<div>Next, we’ll display today’s date and day using PHP!</div>

<?php 

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
