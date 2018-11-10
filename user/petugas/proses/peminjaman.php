<?php
session_start();
if(empty($_SESSION['user_id']))
{
    header("Location: ../../../view/login.php");
}
else{
    require('../class/peminjaman.php');
    $lib = new Peminjaman();
    require('../class/barang.php');
    $bar = new Barang();
    @$nama = $_POST['nama'];
    $tgl = date('Y-m-d');
    $status = 'Ongoing';

    if(@$_GET['proses'] == "Add"){
        $proc = $lib->addPem($nama,$tgl,$status);
        $max = $lib->pemMax();
        $cart = $bar->readCart();
        $maxid = $max->id;
        foreach($cart as $a){
            $add = $lib->addDetail($maxid,$a[1]);
            $getqty = $bar->barangPem($a[1]);
            $qty = $getqty;
            $upd = $bar->updQty($a[1],$qty);
            $del = $bar->delCart($a[0]);
        }
        if($add || $upd || $del){
            echo "<script>url:location='../view/peminjaman.php';</script>";
        }
        else{
            echo "<script>alert('Failed');</script>";
            echo "<script>url:location='../view/index.barang.php';</script>";
        }
    }

    else{
        $id = @$_POST['id'];
        if(!empty($id)){
            require('../class/pengembalian.php');
            $lib = new Pengembalian();
            $set = $lib->addPeng($_SESSION['user_id'],$id,$tgl);
            if($lib){
                $edit = $lib->status($id);
                $loop = $lib->cekDet($id);
                foreach($loop as $a){
                    $qty = $lib->readBar($id,$a['id_barang']);
                    foreach ($qty as $b) {
                        $qtytmbh = $b['qty']+1;
                        $gantiqty = $lib->editQty($b['id'],$qtytmbh);
                    }
                }
                if($edit || $gantiqty){
                    echo "<script>url:location='../view/peminjaman.php';</script>";
                }
                else{
                    echo "<script>alert('Failed');</script>";
                    echo "<script>url:location='../view/peminjaman.php';</script>";
                }
            }
        }
    }
}
?>

