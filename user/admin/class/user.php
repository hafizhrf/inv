<?php
class User {
    public $connect;
    public function __construct(){
        require_once("../../../config/db.php");
        $this->connect = new Db();
    }
    public function addUs($data){
        try{
            $sql = "INSERT INTO user (id,description) VALUES(?,?)";
            $ins = $this->connect->db->prepare($sql);
            $ins->bindparam(1, $data[0]);
            $ins->bindparam(2, $data[1]);
            $ins->execute();
            return true;
        }
        catch(PDOexception $e){
            return "Failed to insert";
        }
    }
    public function editUs($id){
        try{
            $sql = "SELECT * FROM user  WHERE id=?";
            $get = $this->connect->db->prepare($sql);
            $get->bindparam(1, $id);
            $get->execute();
            return $get;
        }
        catch(PDOexception $e){
            return false;
        }
    }
    public function updateUs($data){
        try{
            $sql = "UPDATE user  SET description = ? WHERE id = ?";
            $upd = $this->connect->db->prepare($sql);
            $upd->bindparam(1, $data[1]);
            $upd->bindparam(2, $data[0]);
            $upd->execute();
            return true;
        }
        catch(PDOexception $e){
            return "Failed to update";
        }
    }   
    
    public function readUs(){
        try{
            $sql = "SELECT * FROM user ";
            $upd = $this->connect->db->prepare($sql);
            $upd->execute();
            return $upd;
        }
        catch(PDOexception $e){
            return false;
        }
    }

    public function deleteUs($id){
        try{
            $sql = "DELETE FROM user  WHERE id = ?";
            $del = $this->connect->db->prepare($sql);
            $del->bindparam(1, $id);
            $del->execute();
            return true;
        }
        catch(PDOexception $e){
            return false;
        }
    }

}