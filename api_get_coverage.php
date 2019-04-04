<?php

header("Content-Type:application/json");

// get the HTTP method, path and body of the request
$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'),true);

//obtain the filename of the file which is the JSON file
$my_file = $input['filename'];
$handle = fopen($my_file, 'r');
$data = fread($handle,filesize($my_file));

echo $data;

?>