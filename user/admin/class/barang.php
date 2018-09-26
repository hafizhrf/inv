<?php
class barang{
    public $connect;
    public function __construct(){
        require_once("../../../config/db.php");
        $this->connect = new Connect();
    }
    public function addBar($data){
        try{
            $sql = "INSERT INTO barang(id_Baregori,id,nama,qty,kondisi) VALUES(?,?,?,?,?)";
            $ins = $this->connect->db->prepare($sql);
            $ins->bindparam(1, $data[0]);
            $ins->bindparam(2, $data[1]);
            $ins->bindparam(3, $data[2]);
            $ins->bindparam(4, $data[3]);
            $ins->bindparam(5, $data[4]);
            $ins->execute();
            return true;
        }
        catch(PDOexception $e){
            return "Failed to insert";
        }
    }
    public function editBar($id){
        try{
            $sql = "SELECT * FROM barang WHERE id=?";
            $get = $this->connect->db->prepare($sql);
            $get->bindparam(1, $id);
            $get->execute();
            return $get;
        }
        catch(PDOexception $e){
            return false;
        }
    }
    public function updateBar($data){
        try{
            $sql = "UPDATE barang SET id_kategori = ?, nama = ?, qty = ?, kondisi = ? WHERE id = ?";
            $upd = $this->connect->db->prepare($sql);
            $upd->bindparam(1, $data[0]);
            $upd->bindparam(2, $data[1]);
            $ins->bindparam(3, $data[2]);
            $ins->bindparam(4, $data[3]);
            $ins->bindparam(5, $data[4]);
            $upd->execute();
            return true;
        }
        catch(PDOexception $e){
            return "Failed to update";
        }
    }   
    
    public function readBar(){
        try{
            $sql = "SELECT * FROM barang";
            $arg = $this->connect->db->arg($sql);
            return $arg;
        }
        catch(PDOexception $e){
            return false;
        }
    }

    public function deleteBar($id){
        try{
            $sql = "DELETE * FROM barang WHERE id = ?";
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