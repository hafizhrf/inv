<?php
    session_start();
    if(empty($_SESSION['user_id']) || $_SESSION['level'] !== "admin")
    {
        header("Location: ../../../view/login.php");
    }
    
    require('../class/kategori.php');
    $lib = new Kategori();
    $data = $lib->readKat();
    
    $del = "";
    if(!empty($_GET['id'])){
        $proc = $lib->deleteKat($_GET['id']);
        if($proc == true){
            header ("Location: index.kategori.php");
            $del = "Delete Berhasil";
        }
        else{
            $del = "Delete Gagal";
        }
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
    .sidebar{
        background-color: #2f3542;
    }
    .sidebar p{
        color: white;
    }
    .sidebar h2{
        color: #ebebeb;
        font-size: 1.5em;
    }
    .fwhite{
        color:white;
    }
    body{
        font-family: Segoe UI,Segoe UI Symbol;
        margin:0px;
        background-color: #edeeef;
        margin-bottom:50px;
    }
    .select2{
        width: 300px;
        border-radius: 10px;
    }
    .table{
        background-color: white;
        border-radius: 8px;
    }
    .fwhite{
        color:white;
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
        margin-top:10px;
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
      <h2>InV</h2>
  </a>
</div>
<div class="sidebar-wrapper">
    <ul class="nav">
    <li class="nav-item">
        <a class="nav-link" href="index.php">
        <p>Home</p>
        </a>
    </li>
  <li class="nav-item ">
    <a class="nav-link" href="index.barang.php">
      <p>Barang</p>
  </a>
</li>
<li class="nav-item  active">
    <a class="nav-link " href="index.kategori.php">
      <p>Kategori</p>
  </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="index.user.php">
      <p>Petugas Dan Peminjam</p>
  </a>
</li>
<!-- your sidebar here -->
</ul>
</div>
</div>
<div class="main-panel">
<div class="content">
    <div class="container-fluid">
    <h1>List Kategori</h1>
    <div class="buton">
    <button class="btn btn-warning" id="bukabel">Tambah Kategori</button>
    </div>
    <div class="beli">
    <div ><center> <h4>Add</h4></center></div>
    <form action="../proses/kategori.php?proses=Add" method="POST">
                <div class="form-group">
                    <label for="id" class="control-label"><b>ID</b></label>
                    <input type="text" name="id" required class="form-control" autocomplete="off">
                </div>

                <div class="form-group">
                    <label for="des" class="control-label"><b>Nama</b></label>
                    <input type="text" required class="form-control" name="des">
                </div>

                <div class="form-group">
                    <input type="submit" value="Tambah" class="btn btn-warning" name="proses">
                </div>
                </form>
        
    </div>
    <div class="card">
    <?php
        if ($del != "") {
            echo '<div class="alert alert-warning"><strong>Notice: </strong> ' . $del . '</div>';
        }
    ?>
    <table class="table-striped table datat">
    <thead class="orange">
        <tr>
            <th>ID</th>
            <th>Kategori</th>
            <th>Aksi</th>
        </tr>
    </thead>
        <?php
            foreach($data as $kat){
        ?>
        <tr>
            <td><?php echo $kat['id']; ?></td>
            <td><?php echo $kat['description']; ?></td>
            <td>
            <a class="btn btn-warning"  href="edit.kategori.php?id=<?=$kat['id']?>">
                edit</a> |
                <a href="?id=<?=$kat['id']?>" class="btn btn-danger">X</a>
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
<script type="text/javascript">
    $(document).ready(function(){
        $('.datat').DataTable();
    });
    
    $(document).ready(function() {
        $('.jualbarang').select2();
    });

    $(document).ready(function(){
        $(".jualan").hide();        
        $(".beli").hide();        

        $("#bukapen").click(function(){
            $(".beli").hide();
            $(".jualan").slideToggle("fast");
        });

        $("#bukabel").click(function(){
            $(".jualan").hide();
            $(".beli").slideToggle("fast");
        });
    });
</script>

</body>
</html>