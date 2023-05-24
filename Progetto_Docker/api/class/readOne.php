<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once './config/connectDB.php';
include_once './object/classe.php';

$database = new Db();
$db = $database->getConnection();

$classe = new classe($db);

$stmt = $classe->readOne($id);
$num = $stmt->rowCount();

if ($num > 0) {
    $classe_arr = array();
    $classe_arr["records"] = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

        extract($row);
        $classe_item = array(
            "id" => $row['id'],
            "anno" => $row['anno'],
            "sezione" => $row['sezione'],
            "spec" => $row['spec']
        );
        array_push($classe_arr["records"], $classe_item);
    }
    echo json_encode($classe_arr);
} else {
    echo json_encode(
            array("message" => "No products found.")
    );
}