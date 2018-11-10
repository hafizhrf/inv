<?php
class Pengembalian{
    public $connect;
    public function __construct(){
        require_once("../../../config/admindb.php");
        $this->connect = new adminDb();
    }
    
    public function addPeng($a,$b,$c){
        try{
            $sql = "INSERT INTO pengembalian(id_petugas,id_pinjam,tgl_kembali) VALUES(?,?,?)";
            $ins = $this->connect->db->prepare($sql);
            $ins->bindparam(1, $a);
            $ins->bindparam(2, $b);
            $ins->bindparam(3, $c);
            $ins->execute();
            return true;
        }
        catch(PDOexception $e){
            return false;
        }
    }
    public function readBar($a,$b){
        try{
            $sql = "SELECT * FROM det WHERE id_pinjam = ? AND id = ?";
            $ins = $this->connect->db->prepare($sql);
            $ins->bindparam(1, $a);
            $ins->bindparam(2, $b);
            $ins->execute();
            return $ins;
        }
        catch(PDOexception $e){
            return false;
        }
    }
    public function cekDet($a){
        try{
            $sql = "SELECT * FROM detail_peminjaman WHERE id_pinjam = ?";
            $ins = $this->connect->db->prepare($sql);
            $ins->bindparam(1, $a);
            $ins->execute();
            return $ins;
        }
        catch(PDOexception $e){
            return false;
        }
    }
    public function status($a){
        try{
            $sql = "UPDATE peminjaman SET status = 'Selesai' WHERE id = ?";
            $ins = $this->connect->db->prepare($sql);
            $ins->bindparam(1, $a);
            $ins->execute();
            return true;
        }
        catch(PDOexception $e){
            return false;
        }
    }

    public function editQty($b,$a){
        try{
            $sql = "UPDATE barang SET qty = ? WHERE id = ?";
            $ins = $this->connect->db->prepare($sql);
            $ins->bindparam(1, $a);
            $ins->bindparam(2, $b);
            $ins->execute();
            return true;
        }
        catch(PDOexception $e){
            return false;
        }
    }
    public function readPeng(){
        try{
            $sql = "SELECT * FROM vpeminjaman WHERE status = 'Selesai'";
            $arg = $this->connect->db->prepare($sql);
            $arg->execute();
            return $arg;
        }
        catch(PDOexception $e){
            return false;
        }
    }
    
}