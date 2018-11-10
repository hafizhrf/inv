<?php
class peminjaman{
    public $connect;
    public function __construct(){
        require_once("../../../config/admindb.php");
        $this->connect = new adminDb();
    }
   
    public function addPem($a,$b,$c){
        try{
            $sql = "INSERT INTO peminjaman(id_user,tgl_pinjam,status) VALUES(?,?,?)";
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
    public function addDetail($a,$b){
        try{
            $sql = "INSERT INTO detail_peminjaman(id_pinjam,id_barang) VALUES(?,?)";
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
    public function pemMax(){
        try{
            $sql = "SELECT max(id) as id FROM peminjaman";
            $arg = $this->connect->db->prepare($sql);
            $arg->execute();
            return $data = $arg->fetch(PDO::FETCH_OBJ);
        }
        catch(PDOexception $e){
            return false;
        }
    }
    public function readPem(){
        try{
            $sql = "SELECT * FROM user WHERE level = 'peminjam'";
            $arg = $this->connect->db->prepare($sql);
            $arg->execute();
            return $arg;
        }
        catch(PDOexception $e){
            return false;
        }
    }
    public function readPinjam(){
        try{
            $sql = "SELECT * FROM vpeminjaman WHERE status = 'Ongoing'";
            $arg = $this->connect->db->prepare($sql);
            $arg->execute();
            return $arg;
        }
        catch(PDOexception $e){
            return false;
        }
    }
    public function detPem($id){
        try{
            $sql = "SELECT * FROM vpeminjaman WHERE id = ?";
            $arg = $this->connect->db->prepare($sql);
            $arg->bindparam(1, $id);
            $arg->execute();
            return $data = $arg->fetch(PDO::FETCH_OBJ);
        }
        catch(PDOexception $e){
            return false;
        }
    }
    public function detDet($id){
        try{
            $sql = "SELECT * FROM vdetail WHERE id_pinjam = ?";
            $arg = $this->connect->db->prepare($sql);
            $arg->bindparam(1, $id);
            $arg->execute();
            return $arg;
        }
        catch(PDOexception $e){
            return false;
        }
    }
}