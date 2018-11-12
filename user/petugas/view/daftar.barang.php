<?php
error_reporting(0);
session_start();
$a = @$_GET['key'];
$b = @$_GET['qty'] + 1;
$c = @$_GET['idcart'];
require('../class/barang.php');
$lib = new Barang();
$data = $lib->readBar();
$cart = $lib->readCart();
if(!empty($_GET['qty']) || !empty($_GET['key']) || !empty($_GET['idcart'])){
    $upd = $lib->updQty($a,$b);
    $aaas = $lib->delCart($c);
    header("Location: daftar.barang.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../../../asset/img/logo/inv.png">
    <link rel="stylesheet" href="../../../asset//css/select2.min.css">
    <link href="../../../asset/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
    <link rel="stylesheet" href="../../../asset/css/jquery.dataTables.css"> 
    <link rel="stylesheet" href="../../../asset/css/dataTables.bootstrap.css"> 
    <script src="../../../asset/js/jquery.min.js"></script>
    <script src="../../../asset/js/jquery.dataTables.js"></script>
    <script src="../../../asset/js/core/popper.min.js" type="text/javascript"></script>
    <script src="../../../asset/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
    <script src="../../../asset/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../../../asset/js/material-dashboard.min.js?v=2.1.0" type="text/javascript"></script>
    <script src="../../../asset/js/select2.min.js"></script>
    <title>Admin Page</title>
</head>
<body>
    <style>
    .fwhite{
        color:white;
    }
    body{
        font-family: Segoe UI,Segoe UI Symbol;
        margin:0px;
        background-color:#edeeef;
        margin-bottom:50px;
    }
    .table{
        background-color: white;
        border-radius: 8px;
    }
    .fwhite{
        color:white;
    }
    .container{
        margin-top: 50px;
    }
    .habis{
        color: red;
    }
    .putih{
        color: white
    }
    .card{
        padding: 20px;
        border-radius: 10px;
        margin-top:20px;
    }
    .buton{
        margin-left:2px;
        margin-bottom:20px;
    }
    .beli{
        margin-left:2px;
        background-color:white;
        border-radius: 10px;
        padding:12px;
        /* display: none; */
    }
    h9{
        color:white;
    }
    .top-form{
        background-color: blue;
    }
    .kosong{
        font-size: 2em;
        font-family: 'consolas';
        margin : 50px;
    }
    .prosesan{
        display: none;
    }
    .panjang{
        width: 100%;
    }
    h1{
        color: darkgrey;
    }
</style>
<div class="wrapper ">
    <div class="sidebar" data-color="orange" data-background-color="white">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
    <div class="logo">
      <a  class="simple-text logo-normal">
          <img src="../../../asset/img/ic/ic-inv-x64.png"><br>
          InV
      </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item  ">
        <a class="nav-link" href="index.php">
          <p>Home</p>
      </a>
  </li>
  <li class="nav-item ">
    <a class="nav-link" href="index.barang.php">
      <p>Barang</p>
  </a>
</li>
<li class="nav-item ">
    <a class="nav-link" href="peminjaman.php">
      <p>Peminjaman</p>
  </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="pengembalian.php">
      <p>Pengembalian</p>
  </a>
</li>
<li class="nav-item active">
    <a class="nav-link" href="daftar.barang.php">
      <p>Cart</p>
  </a>
</li>
<!-- your sidebar here -->
</ul>
</div>
</div>
<div class="main-panel">
 <!-- Navbar -->
 <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
              <li class="nav-item">

              </li>
              <!-- your navbar here -->
          </ul>
      </div>
  </div>
</nav>
<!-- End Navbar -->
<div class="content">
    <div class="container-fluid">
        <h1>Cart</h1>
        <div class="card card-nav-tabs">
            <?php

            if($cart){
                ?>
                <table class="table-striped table datat">
                    <thead class="orange">
                        <tr>
                            <th>ID</th> 
                            <th>Nama Barang</th>
                            <th>Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <?php
                    foreach($cart as $a){
                        $data = $lib->daftarBar($a[1]);
                        foreach($data as $Bar){
                            ?><tr>
                                <td><?php echo $Bar['id']; ?></td>
                                <td><?php echo $Bar['nama']; ?></td>
                                <td><?php echo $Bar['kategori']; ?></td>
                                <td>
                                    <form action="" method="GET">
                                        <input type="hidden" name="key" value="<?= $a[1]?>">
                                        <input type="hidden" name="idcart" value="<?= $a[0]?>">
                                        <input type="hidden" name="qty" value="<?= $Bar['qty']?>">
                                        <input type="submit" class="btn btn-danger" value="">
                                    </form>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    ?>

                </table>
                <button class="btn btn-success" id="bukaproses">Proses</button>
                <div class="prosesan">
                    <form action="../proses/peminjaman.php?proses=Add" method="POST"><br><br>
                        <div class="form-group">
                            <label for="nama" class="control-label"><b>Nama Peminjam</b></label><br>
                            <select name="nama" class="form-control namas panjang">
                                <?php
                                require_once("../class/peminjaman.php");
                                $lib = new Peminjaman();
                                $s = $lib->readPem();
                                foreach($s as $kat){
                                    ?>
                                    <option value="<?php echo $kat['id'];?>">[<?php echo $kat['id'];?>] <?php echo $kat['nama'];?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Lanjut" class="btn btn-warning" name="proses">
                        </div>
                    </form>
                </div>
            </div>
            <?php

        }
        else{
            ?>
            <center>
                <div class="kosong">
                    <img src="../../../asset/img/cart.png"><br><br>
                    Cart Kosong
                </div>
            </table>
        </center>
        <?php
    }
    ?>
</div>
</div>
<footer class="footer">
    <div class="container-fluid">
      <nav class="float-left">
        <ul>
        </ul>
    </nav>
    <!-- your footer here -->
</div>
</footer>
</div>
</div>
<script>
    $(document).ready(function(){
        $("#bukaproses").click(function(){
            $(".prosesan").slideToggle("fast");
        });
        $('.namas').select2();
    });
</script>
</body>
</html>