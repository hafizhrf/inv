<<?php
    session_start();
    if(empty($_SESSION['user_id']))
    {
        header("Location: ../../../view/login.php");
    }
else{
    require('../class/kategori.php');
    $lib = new Kategori();
    $data = array(
        @$_POST['id'],
        @$_POST['des']
    );
    $id = @$_REQUEST['id'];

    if($_GET['proses'] == "Add"){
        $check = $lib->cek($id);
        if($check == false){
            echo "<script>alert('Id Kategori Sudah Terdaftar');</script>";
            echo "<script>url:location='../view/index.kategori.php';</script>";
        }
        else{
            $proc = $lib->addKat($data);
            if($proc == true){
                echo "<script>url:location='../view/index.kategori.php';</script>";
            }
            else{
                echo "<script>alert('Failed');</script>";
                echo "<script>url:location='../view/add.kategori.php';</script>";
            }
        }
    }
    elseif($_GET['proses'] == "Update"){
        $proc = $lib->updateKat($data);
        if($proc == true){
            echo "<script>url:location='../view/index.kategori.php';</script>";
        }
        else{
            echo "<script>alert('Failed');</script>";
            echo "<script>url:location='../view/edit.kategori.php';</script>";
        }
    }
}
?>