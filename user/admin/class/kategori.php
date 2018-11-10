<?php
class Kategori{
    public $connect;
    public function __construct(){
        require_once("../../../config/admindb.php");
        $this->connect = new adminDb();
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

    public function cek($id){
        try{
            $sql = "SELECT * FROM kategori WHERE id=?";
            $arg = $this->connect->db->prepare($sql);
            $arg->bindparam(1, $id);
            $arg->execute();
            if($arg->rowCount() > 0){
                return false;
            }
            else{
                return true;
            }
        }
        catch(PDOexception $e){
            return false;
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
            $upd->bindparam(1, $data[1]);
            $upd->bindparam(2, $data[0]);
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
            $upd = $this->connect->db->prepare($sql);
            $upd->execute();
            return $upd;
        }
        catch(PDOexception $e){
            return false;
        }
    }

    public function deleteKat($id){
        try{
            $sql = "DELETE FROM kategori WHERE id = ?";
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