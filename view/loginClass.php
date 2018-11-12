<?php
class Validation
{
    
    public $connect;
    public function __construct(){
        require_once("../config/admindb.php");
        $this->connect = new adminDb();
    }

    public function Login($username, $password)
    {
        try {
            $sql = "SELECT id,level FROM user WHERE username = ? AND password = ?";
            $login = $this->connect->db->prepare($sql);
            $login->bindParam(1, $username);
            $login->bindParam(2,$password);
            $login->execute();
            if ($login->rowCount() > 0) {
                return $login->fetch(PDO::FETCH_OBJ);
            } else {
                return false;
            }
        } 
        catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function register($nama, $username, $password, $level)
    {
        try{
            $sql = "INSERT INTO user(nama, username, password, level) VALUES (?, ?, ?, ?)";
            $nupl = $this->connect->db->prepare($sql);
            $nupl->bindparam(1,$nama);
            $nupl->bindparam(2,$username);
            $nupl->bindparam(3,$password);
            $nupl->bindparam(4,$level);
            $nupl->execute();
            return true;
        } catch(PDOException $e){
            return false;
        }
    }

    public function getUser($id){
        try{
            $sql = "SELECT * FROM user WHERE id = ?";
            $get = $this->connect->db->prepare($sql);
            $get->bindparam(1, $id);
            $get->execute();
            if ($get->rowCount() > 0) {
                return $get->fetch(PDO::FETCH_OBJ);
            }
        }
        catch(PDOexception $e){
            return "Failed to update";
        }
    }   
}