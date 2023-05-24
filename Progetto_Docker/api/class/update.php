<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once './config/connectDB.php';
include_once './object/class.php';

$database = new Db();
$db = $database->getConnection();

$classe = new classe($db);

$data = json_decode(file_get_contents("php://input", true));

$classe->id = $data->id;

$classe->anno = $data->anno;
$classe->sezione = $data->sezione;
$classe->spec = $data->spec;

// update the classe
if ($classe->update()) {
    echo '{';
    echo '"message": "classe was updated."';
    echo '}';
}


else {
    echo '{';
    echo '"message": "Unable to update classe."';
    echo '}';
}