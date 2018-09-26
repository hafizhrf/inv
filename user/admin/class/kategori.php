<?php
class Kategori{
    public $connect;
    public function __construct(){
        require_once("../../../config/db.php");
        $this->connect = new Connect();
    }
    public function addKat($data){
        try{
            $sql = "INSERT INTO kategori(id,description) VALUES(?,?)";
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
    public function editKat($id){
        try{
            $sql = "SELECT * FROM kategori WHERE id=?";
            $get = $this->connect->db->prepare($sql);
            $get->bindparam(1, $id);
            $get->execute();
            return $get;
        }
        catch(PDOexception $e){
            return false;
        }
    }
    public function updateKat($data){
        try{
            $sql = "UPDATE kategori SET description = ? WHERE id = ?";
            $upd = $this->connect->db->prepare($sql);
            $upd->bindparam(1, $data[0]);
            $upd->bindparam(2, $data[1]);
            $upd->execute();
            return true;
        }
        catch(PDOexception $e){
            return "Failed to update";
        }
    }   
    
    public function readKat(){
        try{
            $sql = "SELECT * FROM kategori";
            $arg = $this->connect->db->arg($sql);
            return $arg;
        }
        catch(PDOexception $e){
            return false;
        }
    }

    public function deleteKat($id){
        try{
            $sql = "DELETE * FROM kategori WHERE id = ?";
            $del = $this->connect->db->prepare($sql);
            $del->bindparam(1, $id);
            $del->execute();
            return true;
        }
        catch(PDOexception $e){
            return "Failed to delete";
        }
    }

}