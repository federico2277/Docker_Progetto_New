<?php


class Studente{
    //connessione database
    private $conn;
    private $table_name = "ALUNNO";

    //proprietà classe
    public $id;
    public $codice_fiscale;
    public $cognome;
    public $nome;
    public $id_classe;
    public $data_nascita;


    //database function connect
    public function __construct($db)
    {
        $this->conn = $db;
    }

    //funzione READ
    function read(){
        $sql = "SELECT *
            FROM
                " . $this->table_name . " a
            ORDER BY
                a.id";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt;
    }

    //funzione CREATE
    function create(){
        $sql = "INSERT INTO
        " . $this->table_name . "
    SET
        codice_fiscale=:codice_fiscale,
        cognome=:cognome,
        nome=:nome,
        data_nascita=:data_nascita,
        id_classe=:id_classe";


    $stmt = $this->conn->prepare($sql);
    $this->codice_fiscale = htmlspecialchars(strip_tags($this->codice_fiscale));
    $this->cognome = htmlspecialchars(strip_tags($this->cognome));
    $this->nome = htmlspecialchars(strip_tags($this->nome));
    $this->data_nascita = htmlspecialchars(strip_tags($this->data_nascita));
    $this->id_classe = htmlspecialchars(strip_tags($this->id_classe));

    $stmt->bindParam(":codice_fiscale", $this->codice_fiscale);
    $stmt->bindParam(":cognome", $this->cognome);
    $stmt->bindParam(":nome", $this->nome);
    $stmt->bindParam(":data_nascita", $this->data_nascita);
    $stmt->bindParam(":id_classe", $this->id_classe);

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
            codice_fiscale=:codice_fiscale,
            cognome=:cognome,
            nome=:nome,
            data_nascita=:data_nascita,
            id_class=:id_classe
            WHERE
                id=:id";

        // prepare query statement
        $stmt = $this->conn->prepare($sql);

        // sanitize
        $this->codice_fiscale = htmlspecialchars(strip_tags($this->codice_fiscale));
        $this->cognome = htmlspecialchars(strip_tags($this->cognome));
        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->data_nascita = htmlspecialchars(strip_tags($this->data_nascita));
        $this->id_classe = htmlspecialchars(strip_tags($this->id_classe));
        $this->id = htmlspecialchars(strip_tags($this->id));

        // bind new values
        $stmt->bindParam(":codice_fiscale", $this->codice_fiscale);
        $stmt->bindParam(":cognome", $this->cognome);
        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":data_nascita", $this->data_nascita);
        $stmt->bindParam(":id_classe", $this->id_classe);
        $stmt->bindParam(":id", $this->id);

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
        $stmt = $this->conn->prepare($sql);

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