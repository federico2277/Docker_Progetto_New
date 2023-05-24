<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once './config/connectDB.php';
include_once './object/student.php';

$database = new Db();
$db = $database->getConnection();

$studente = new studente($db);

$data = json_decode(file_get_contents("php://input", true));

$studente->codice_fiscale = $data->codice_fiscale;
$studente->cognome = $data->cognome;
$studente->nome = $data->nome;
$studente->data_nascita = $data->data_nascita;
$studente->id_classe = $data->id_classe;

if ($studente->create()) {
    echo '{';
    echo '"message": "studente was created."';
    echo '}';
}

else {
    echo '{';
    echo '"message": "Unable to create studente."';
    echo '}';
}