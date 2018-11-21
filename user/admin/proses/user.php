<?php
session_start();
if(empty($_SESSION['user_id']))
{
    header("Location: ../../../view/login.php");
}
else{
    require('../class/user.php');
    $lib = new User();
    $idauto = $lib->getMax();
    echo $idauto->id+1;
    $data = array(
        @$_POST['id']+1,
        @$_POST['nama'],
        @$_POST['username'],
        @$_POST['password'],
        @$_POST['level'],
    );
    $id = @$_REQUEST['id'];

    // if($_GET['proses'] == "Add"){
    //         $proc = $lib->addUs($data);
    //         if($proc == true){
    //             echo "<script>url:location='../view/index.barang.php';</script>";
    //         }
    //         else{
    //             echo "<script>alert('Failed');</script>";
    //             echo "<script>url:location='../view/add.barang.php';</script>";
    //         }
    // }
    // elseif($_GET['proses'] == "Update"){
    //     $proc = $lib->updateBar($data);
    //     if($proc == true){
    //         echo "<script>url:location='../view/index.barang.php';</script>";
    //     }
    //     else{
    //         echo "<script>alert('Failed');</script>";
    //         echo "<script>url:location='../view/edit.barang.php';</script>";
    //     }
    // }
}
?>