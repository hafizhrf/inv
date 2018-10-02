<?php
class adminDb{
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
        }
        catch(PDOexception $exception){
                echo("Error at Connecting to Database, err code : ".$exception->getMessage());
                die();

        }
    }
}

$connect = new adminDb();
?>