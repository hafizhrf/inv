<?php
if(!isset($_POST['proses'])){
    echo "<script>url:location='../../../view/notfound.html';</script>";
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

    if($_POST['proses'] == "Add"){
        $proc = $lib->addBar($data);
        if($proc == true){
            echo "<script>url:location='../view/index.barang.php';</script>";
        }
        else{
            echo "<script>alert('Failed');</script>";
            echo "<script>url:location='../view/add.barang.php';</script>";
        }
    }
    elseif($_POST['proses'] == "Update"){
        $proc = $lib->updateBar($data);
        if($proc == true){
            echo "<script>url:location='../view/index.barang.php';</script>";
        }
        else{
            echo "<script>alert('Failed');</script>";
            echo "<script>url:location='../view/edit.barang.php';</script>";
        }
    }
    elseif($_POST['proses'] == "Delete"){
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