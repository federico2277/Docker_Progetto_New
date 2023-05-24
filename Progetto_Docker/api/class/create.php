<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// include database and object files
include_once './config/connectDB.php';
include_once './object/class.php';

$database = new Db();
$db = $database->getConnection();

// initialize object
$classe = new classe($db);

// get posted data
$data = json_decode(file_get_contents("php://input", true));

// set classe property value
$classe->anno = $data->anno;
$classe->sezione = $data->sezione;
$classe->spec = $data->spec;

// create the classe
if ($classe->create()) {
    echo '{';
    echo '"message": "classe was created."';
    echo '}';
}

// if unable to create the classe, tell the user
else {
    echo '{';
    echo '"message": "Unable to create classe."';
    echo '}';
}