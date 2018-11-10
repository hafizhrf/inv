<?php
session_start();
if(empty($_SESSION['user_id']) || $_SESSION['level'] !== "petugas")
{
    header("Location: ../../../view/login.php");
}
$a = @$_GET['id'];
$b = @$_GET['qty'] - 1;
require('../class/barang.php');
$lib = new Barang();
$data = $lib->readBar();
if(!empty($_GET['qty']) || !empty($_GET['id'])){
    $tmbh = $lib->addCart($a);
    $upd = $lib->updQty($a,$b);
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
    
    
    
    <title>Barang</title>
</head>
<body>
    <style>
    .fwhite{
        color:white;
    }
    body{
        font-family: Segoe UI,Segoe UI Symbol;
        margin:0px;
        font-size: 2em;
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
        padding:25px;
        display: none;
    }
    h9{
        color:white;
    }
    .top-form{
        background-color: blue;
    }
    .lol{
        width: 80px;
        text-align: center;
    }
    th{
        color: orange;
    }
    h1{
        color: darkgrey;
    }
    table{
        margin-top: 100px;
    }
    .nav-link{
        cursor: pointer;
    }
    .tabel{
        margin-top: 20px;
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
        <a class="nav-link" href="../../../view/index.admin.php">
          <p>Home</p>
      </a>
  </li>
  <li class="nav-item active ">
    <a class="nav-link" href="#">
      <p>Barang</p>
  </a>
</li>
<li class="nav-item  ">
    <a class="nav-link" href="peminjaman.php">
      <p>Peminjaman</p>
  </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="pengembalian.php">
      <p>Pengembalian</p>
  </a>
</li>
<li class="nav-item  ">
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
        <h1>List Barang</h1>
        <button class="btn btn-warning"  id="bukabel">Tambah Barang</button>
        <div class="card card-nav-tabs">
           
        <div class="beli">
            <form action="../proses/barang.php?proses=Add" method="POST">
                <div class="form-group">
                    <label for="id" class="bmd-label-floating"><b>ID</b></label>
                    <input type="text" name="id" required class="form-control" autocomplete="off">
                </div>

                <div class="form-group">
                    <label for="nama" class="bmd-label-floating"><b>Nama</b></label>
                    <input type="text" required class="form-control" name="nama">
                </div>

                <div class="form-group">
                    <label for="qty" class="bmd-label-floating"><b>Kuantiti</b></label>
                    <input type="number" name="qty" required class="form-control">
                </div>

                <div class="form-group">
                    <label for="kondisi" class="bmd-label-floating"><b>Kondisi</b></label><br>
                    <div class="form-check form-check-radio">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" value="Baik" name="kondisi" checked>Baik
                            <span class="circle">
                                <span class="check"></span>
                            </span>
                        </label>
                    </div>
                    <div class="form-check form-check-radio">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" value="Buruk" name="kondisi" checked>Buruk
                            <span class="circle">
                                <span class="check"></span>
                            </span>
                        </label>
                    </div>  
                </div>
                <div class="form-group">
                    <label for="id_kat" class="bmd-label-floating"><b>Kategori</b></label><br>
                    <select name="id_kat" class="form-control selectpicker kat" data-style="btn btn-link">
                        <?php
                        $s = $lib->readKat();
                        foreach($s as $kat){
                            ?>
                            <option value="<?php echo $kat[0];?>"><?php echo $kat[1];?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <input type="submit" value="Tambah" class="btn btn-warning" name="proses">
                </div>
            </form>

        </div>
        <div class="tabel">
            <table class="table datat">
                <thead class="orange">
                    <tr>
                        <th>ID</th> 
                        <th>Nama Barang</th>
                        <th>Kuantiti</th>
                        <th>Kondisi</th>
                        <th>Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <?php
                foreach($data as $Bar){
                    ?>
                    <tr>
                        <td><?php echo $Bar['id']; ?></td>
                        <td><?php echo $Bar['nama']; ?></td>
                        <td><?php
                        if($Bar['qty']<=0){
                            ?>
                            <h10 class="habis">Kosong</h10>
                            <?php
                        }else{
                            echo $Bar['qty'];
                        } 
                        ?></td>
                        <td><?php echo $Bar['kondisi']; ?></td>
                        <td><?php echo $Bar['kategori']; ?></td>
                        <td>


                            <div class="dropdown show">
                                <a class="lol" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span></span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item"  href="edit.barang.php?id=<?=$Bar['id']?>">edit</a>
                                    <?php
                                    if($Bar['qty'] > 0){
                                        ?>
                                        <form action="" method="GEt">
                                            <input type="hidden" name="id" value="<?=$Bar['id']?>">
                                            <input type="hidden" name="qty" value="<?=$Bar['qty']?>">
                                            <input type="submit" class="dropdown-item"  value="Pinjam">
                                        </form>
                                        <?php
                                    }
                                    ?>

                                </div>
                            </div>


                        </td>
                    </tr>
                    <?php 
                }
                ?>

            </table>
        </div>
    </div>
</div>
<footer class="footer">
    <div class="container-fluid">
      <nav class="float-left">
      </nav>
  </nav>
  <!-- your footer here -->
</div>
</footer>
</div>
</div>
</body>
<script type="text/javascript">
    $(document).ready(function(){
        $('.datat').DataTable();
    });
    
    $(document).ready(function() {
        $('.kat').select2();
    });

    $(document).ready(function(){
        $("#bukabel").click(function(){
            $(".tabel").slideToggle("fast");
            $(".beli").slideToggle("fast");
        });
    });
</script>

</html>