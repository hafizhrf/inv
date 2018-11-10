<?php
session_start();
if(empty($_SESSION['user_id']))
{
    header("Location: ../../../view/login.php");
}
else{
    require('../class/barang.php');
    $lib = new Barang();
    $data = array(
        @$_POST['id_kat'],
        @$_POST['id'],
        @$_POST['nama'],
        @$_POST['qty'],
        @$_POST['kondisi'],
    );
    $id = @$_REQUEST['id'];

    if($_GET['proses'] == "Add"){
        $check = $lib->cek($id);
        if($check == false){
            echo "<script>alert('Id Barang Sudah Terdaftar');</script>";
            echo "<script>url:location='../view/index.barang.php';</script>";
        }
        else{
            $proc = $lib->addBar($data);
            if($proc == true){
                echo "<script>url:location='../view/index.barang.php';</script>";
            }
            else{
                echo "<script>alert('Failed');</script>";
                echo "<script>url:location='../view/add.barang.php';</script>";
            }
        }
    }
    elseif($_GET['proses'] == "Update"){
        $proc = $lib->updateBar($data);
        if($proc == true){
            echo "<script>url:location='../view/index.barang.php';</script>";
        }
        else{
            echo "<script>alert('Failed');</script>";
            echo "<script>url:location='../view/edit.barang.php';</script>";
        }
    }
    elseif($_GET['proses'] == "Delete"){
        $proc = $lib->deleteBar($id);
        if($proc == true){
            echo "<script>url:location='../view/index.barang.php';</script>";
        }
        else{
            echo "<script>alert('Failed');</script>";
            echo "<script>url:location='../view/index.barang.php';</script>";
        }
    }
}
?>