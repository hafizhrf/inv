<?php
class Db{
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $dbName   = "inv";
    public $db;
    function __construct(){
        try{
            $this->db = new PDO("mysql:host={$this->host};
                                 dbname={$this->dbName}",
                                 $this->user,
                                 $this->pass);
            $this->db->setAttribute(PDO::ATTR_ERRMODE,
                                    PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOexception $exception){
                echo("Error at Connecting to Database, err code : ".$exception->getMessage());
                die();

        }
    }
}

$connect = new Db();
?>