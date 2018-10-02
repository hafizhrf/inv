<?php
if(!isset($_POST['proses'])){
    echo "<script>url:location='../../../view/notfound.html';</script>";
}
else{
    require('../class/kategori.php');
    $lib = new Kategori();
    $data = array(
        @$_POST['id'],
        @$_POST['des']
    );
    $id = @$_REQUEST['id'];

    if($_POST['proses'] == "Add"){
        $proc = $lib->addKat($data);
        if($proc == true){
            echo "<script>url:location='../view/index.kategori.php';</script>";
        }
        else{
            echo "<script>alert('Failed');</script>";
            echo "<script>url:location='../view/add.kategori.php';</script>";
        }
    }
    elseif($_POST['proses'] == "Update"){
        $proc = $lib->updateKat($data);
        if($proc == true){
            echo "<script>url:location='../view/index.kategori.php';</script>";
        }
        else{
            echo "<script>alert('Failed');</script>";
            echo "<script>url:location='../view/edit.kategori.php';</script>";
        }
    }
    elseif($_POST['proses'] == "Delete"){
        $proc = $lib->deleteKat($id);
        if($proc == true){
            echo "<script>url:location='../view/index.kategori.php';</script>";
        }
        else{
            echo "<script>alert('Failed');</script>";
            echo "<script>url:location='../view/index.kategori.php';</script>";
        }
    }
}
?>