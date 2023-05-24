<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");


// include database and object files
include_once './config/connectDB.php';
include_once './object/student.php';

$id = $student_id;

// instantiate database and studente object
$database = new Db();
$db = $database->getConnection();

// initialize object
$studente = new studente($db);

// query studente
$stmt = $studente->readOne($id);
$num = $stmt->rowCount();

// check if more than 0 record found
if ($num > 0) {
    // studente array
    $studente_arr = array();
    $studente_arr["records"] = array();

    // retrieve table contents
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // extract row
        extract($row);
        $studente_item = array(
            "id" => $row['id'],
            "data_nascita" => $row['data_nascita'],
            "codice_fiscale" => $row['codice_fiscale'],
            "cognome" => $row['cognome'],
            "nome" => $row['nome'],
            "id_classe" => $row['id_classe']
        );
        array_push($studente_arr["records"], $studente_item);
    }
    echo json_encode($studente_arr);
} else {
    echo json_encode(
            array("message" => "No products found.")
    );
}

?>