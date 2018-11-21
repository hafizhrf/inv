<?php
session_start();
if (empty($_SESSION['user_id']) || $_SESSION['level'] !== "admin") {
header("Location: ../../../view/login.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../../../asset/img/logo/inv.png">
    <link rel="stylesheet" href="../../../asset//css/select2.min.css">
    <link href="../../../asset/css/material-dashboard.css?v=2.1.0" rel="stylesheet"/>
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
    <title>Dashboard</title>
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
            <a class="simple-text logo-normal">
                <img src="../../../asset/img/ic/ic-inv-x64.png"><br>
                <h2>InV</h2>
            </a>
        </div>
        <div class="sidebar-wrapper">
            <ul class="nav">
                <li class="nav-item active ">
                    <a class="nav-link" href="">
                    <p>Home</p>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="index.barang.php">
                    <p>Barang</p>
                    </a>
                </li>
                <li class="nav-item  ">
                    <a class="nav-link" href="index.kategori.php">
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
                <h2>Selamat Datang, Admin!</h2>
                <button type="button" class="btn btn-warning btn-round">
                    <a href="../../../view/logout.php" style="color: white;">Logout</a>
                </button>
            </div>
        </div>
</body>
<script type="text/javascript">
    $(document).ready(function () {
        $('.datat').DataTable();
    });

    $(document).ready(function () {
        $('.kat').select2();
    });

    $(document).ready(function () {
        $("#bukabel").click(function () {
            $(".tabel").slideToggle("fast");
            $(".beli").slideToggle("fast");
        });
    });
</script>

</html>