<?php
class barang{
    public $connect;
    public function __construct(){
        require_once("../../../config/admindb.php");
        $this->connect = new adminDb();
    }
    public function addCart($a){
        try{
            $sql = "INSERT INTO cart(id_barang) VALUES(?)";
            $ins = $this->connect->db->prepare($sql);
            $ins->bindparam(1, $a);
            $ins->execute();
            return true;
        }
        catch(PDOexception $e){
            return "Failed to insert";
        }
    }
    public function addBar($data){
        try{
            $sql = "INSERT INTO barang(id_kategori,id,nama,qty,kondisi) VALUES(?,?,?,?,?)";
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
            $upd->bindparam(2, $data[2]);
            $upd->bindparam(3, $data[3]);
            $upd->bindparam(4, $data[4]);
            $upd->bindparam(5, $data[1]);
            $upd->execute();
            return true;
        }
        catch(PDOexception $e){
            return "Failed to update";
        }
    }   
    
    public function readBar(){
        try{
            $sql = "SELECT * FROM vBarang";
            $arg = $this->connect->db->prepare($sql);
            $arg->execute();
            return $arg;
        }
        catch(PDOexception $e){
            return false;
        }
    }
    public function readCart(){
        try{
            $sql = "SELECT * FROM cart";
            $arg = $this->connect->db->prepare($sql);
            $arg->execute();
            if($arg->rowCount() > 0){
                return $arg;
            }else{
                return false;
            }
        }
        catch(PDOexception $e){
            return false;
        }
    }
    public function updQty($id,$qty){
        try{
            $sql = "UPDATE barang SET qty = ? WHERE id =?";
            $arg = $this->connect->db->prepare($sql);
            $arg->bindparam(1, $qty);
            $arg->bindparam(2, $id);
            $arg->execute();
            return true;
        }
        catch(PDOexception $e){
            return false;
        }
    }
    public function daftarBar($id){
        try{
            $sql = "SELECT * FROM vBarang WHERE id = ?";
            $arg = $this->connect->db->prepare($sql);
            $arg->bindparam(1, $id);
            $arg->execute();
            return $arg;
        }
        catch(PDOexception $e){
            return false;
        }
    }
    public function barangPem($id){
        try{
            $sql = "SELECT qty FROM vBarang WHERE id = ?";
            $arg = $this->connect->db->prepare($sql);
            $arg->bindparam(1, $id);
            $arg->execute();
            $data = $arg->fetch(PDO::FETCH_OBJ);
            return $data->qty;
        }
        catch(PDOexception $e){
            return false;
        }
    }

    public function cek($id){
        try{
            $sql = "SELECT * FROM barang WHERE id=?";
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
    
    public function readFaktur(){
        try{
            $sql = "SELECT no_fp FROM pembelian ORDER BY no_fp DESC LIMIT 1";
            $ins = $this->connect->db->prepare($sql);
            $ins->execute();
            if($ins->rowCount() > 0){
                $data = $ins->fetch(PDO::FETCH_OBJ);
                return $data->no_fp;
            }
            else{
                return "0";
            }
        }
        catch(PDOexception $e){
            return "Failed to insert";
        }
    }
    
    public function deleteBar($id){
        try{
            $sql = "DELETE FROM barang WHERE id = ?";
            $del = $this->connect->db->prepare($sql);
            $del->bindparam(1, $id);
            $del->execute();
            return true;
        }
        catch(PDOexception $e){
            return "Failed to delete";
        }
    }
    public function delCart($id){
        try{
            $sql = "DELETE FROM cart WHERE id = ?";
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