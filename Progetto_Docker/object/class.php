<?php

class Classe{
    //connessione database
    private $conn;
    private $table_name = "CLASSE";

    //proprietà classe
    public $id;
    public $anno;
    public $sezione;
    public $spec;

    //database function connect
    public function __construct($db)
    {
        $this->$conn = $db;
    }

    //funzione READ
    function read(){
        $sql = "SELECT *
            FROM
                " . $this->table_name . " as c
            ORDER BY
                c.id";
        
        $stmt = $this->$conn->query($sql);
        $stmt->execute();
        return $stmt;
    }

    //funzione CREATE
    function create(){
        $sql = "INSERT INTO
        " . $this->table_name . "
    SET
        anno=:anno,
        sezione=:sezione,
        spec=:spec";


    $stmt = $this->$conn->prepare($sql);
    $this->anno = htmlspecialchars(strip_tags($this->anno));
    $this->sezione = htmlspecialchars(strip_tags($this->sezione));
    $this->spec = htmlspecialchars(strip_tags($this->spec));

    $stmt->bindParam(":anno", $this->anno);
    $stmt->bindParam(":sezione", $this->sezione);
    $stmt->bindParam(":spec", $this->spec);

    // execute query
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
   
    }

    //function UPDATE
    function update(){
        $sql = "UPDATE
                " . $this->table_name . "
            SET
                anno=:anno,
                spec=:spec,
                sezione=:sezione
            WHERE
                id=:id";

        // prepare query statement
        $stmt = $this->$conn->prepare($sql);

        // sanitize
        $this->anno = htmlspecialchars(strip_tags($this->anno));
        $this->spec = htmlspecialchars(strip_tags($this->spec));
        $this->sezione = htmlspecialchars(strip_tags($this->sezione));
        $this->id = htmlspecialchars(strip_tags($this->id));

        // bind new values
        $stmt->bindParam(':anno', $this->anno);
        $stmt->bindParam(':spec', $this->spec);
        $stmt->bindParam(':sezione', $this->sezione);
        $stmt->bindParam(':id', $this->id);

        // execute the query
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    //Funzione DELETE
    function delete()
    {
        // delete query
        $sql = "DELETE FROM " . $this->table_name . " WHERE id= ?";

        // prepare query
        $stmt = $this->$conn->prepare($sql);

        // sanitize
        $this->id = htmlspecialchars(strip_tags($this->id));

        // bind id of record to delete
        $stmt->bindParam(1, $this->id);

        // execute query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

 }