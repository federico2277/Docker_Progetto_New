<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


// include database and object files
include_once './config/connectDB.php';
include_once './object/student.php';

$database = new Db();
$db = $database->getConnection();

// initialize object
$studente = new studente($db);

// set ID property of studente to be deleted
$studente->id = filter_input(INPUT_GET, 'id');

// delete the studente
if ($studente->delete()) {
    echo '{';
    echo '"message": "studente was deleted."';
    echo '}';
}

// if unable to delete the studente
else {
    echo '{';
    echo '"message": "Unable to delete studente."';
    echo '}';
}