<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// include database and object files
include_once './config/connectDB.php';
include_once './object/student.php';

$database = new Db();
$db = $database->getConnection();

// initialize object
$studente = new studente($db);

// get posted data
$data = json_decode(file_get_contents("php://input", true));

// set ID property of studente to be updated
$studente->id = $data->id;
// set studente property value
$studente->nome = $data->nome;
$studente->cognome = $data->cognome;
$studente->data_nascita = $data->data_nascita;
$studente->codice_fiscale = $data->codice_fiscale;
$studente->id_classe = $data->id_classe;

// update the studente
if ($studente->update()) {
    echo '{';
    echo '"message": "studente was updated."';
    echo '}';
}

// if unable to update the studente, tell the user
else {
    echo '{';
    echo '"message": "Unable to update studente."';
    echo '}';
}