<?php

defined('API_KEY','XXX');

$url = sprintf('https://sheets.googleapis.com/v4/spreadsheets/1RRtqf_I85M4J5gtdFUqSvutJ5rl6AVZPxGsoX35V69I/values/Formularantworten%203?key=%s', API_KEY);
$json = json_decode(file_get_contents($url));
$rows = $json->values;

foreach($rows as $row) {
    var_dump($row);
}