<?php
session_start();
if(empty($_SESSION['user_id']) || $_SESSION['level'] !== "petugas")
{
  header("Location: ../../../view/login.php");
}
require('../class/pengembalian.php');
$lib = new Pengembalian();
$data = $lib->readPeng();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="icon" href="../../../asset/img/logo/inv.png">
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



  <title>Pengembalian</title>
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
    width:120px;
    margin-bottom:3px;
  }
  .beli{
    margin-left:2px;
    background-color:white;
    border-radius: 10px;
    padding:12px;
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
  }
  th{
    color: orange;
  }
  h1{
    color: darkgrey;s
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
          <li class="nav-item ">
            <a class="nav-link" href="index.barang.php">
              <p>Barang</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="peminjaman.php">
              <p>Peminjaman</p>
            </a>
          </li>
          <li class="nav-item active">
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
       <h1>List Pengembalian</h1>
       <div class="card">
        <table class="table datat">
          <thead class="orange">
            <tr>
              <th>ID</th> 
              <th>Nama Peminjam</th>
              <th>Tanggal</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <?php
          foreach($data as $Bar){
            ?>
            <tr>
              <td><?php echo $Bar[0]; ?></td>
              <td><?php echo $Bar[1]; ?></td>
              <td><?php echo $Bar[2]; ?></td>
              <td><a class="btn btn-warning "  href="detail.peminjaman.php?id=<?=$Bar[0]?>&j=k"><span> </span></a></td>
              </tr>
              <?php 
            }
            ?>
          </table>
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
</body>
<script type="text/javascript">
  $(document).ready(function(){
    $("#bukabel").click(function(){
      $(".beli").slideToggle("fast");
    });
    $('.kat').select2();
    $('.datat').DataTable();
  });
</script>

</html>