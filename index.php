<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>InV</title>

    <!-- include framework css -->
    <link rel="stylesheet" href="asset/css/material-dashboard.css?v=2.0.2">
    <link rel="stylesheet" href="asset/aos-master/dist/aos.css">
    <link href="asset/css/style.css?v=<?php echo time(); ?>" rel="stylesheet">

    <!-- include icon tab browser -->
    <link rel="icon" href="asset/img/ic/ic-inv-x72.png">

</head>
<body>
<nav class="navbar fixed-top navbar-expand-lg bg-white">
    <img id="imglogo" src="asset/img/ic/ic-inv-x64.png" alt="logo">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-bar navbar-kebab"></span>
        <span class="navbar-toggler-bar navbar-kebab"></span>
        <span class="navbar-toggler-bar navbar-kebab"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#dgOne">Beranda<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Fitur</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Tentang</a>
            </li>
            <li class="nav-item">
                <p></p>
            </li>
        </ul>
    </div>
</nav>
<div class="div-home-dashboard">
    <div class="dg-one" id="dgOne">
        <div class="dg-one-left">
            <h2>INV</h2>
            <p><i>Aplikasi <span><b>Peminjaman</b></span> - <span><b>Pengembalian</b></span> Barang</i></p>
        </div>
        <div class="dg-one-right">
            <img src="asset/img/box.png">
        </div>
        <div class="dg-one-middle">
            <button class="dg-button-login"><a href="view/login.php">Login</a></button>
            <?php
            if(!empty($_SESSION['user_id']))
            {
                if($_SESSION['level'] == 'admin'){
                    echo '<button class="dg-button-login"><a href="view/login.php">Login</a></button>';
                }
                elseif($_SESSION['level'] == 'petugas'){
                    echo '<button class="dg-button-login"><a href="view/logout.php">Logout</a></button>';
                }
            }
            $login_error_message = "";

            ?>
        </div>
    </div>
    <div class="dg-two-bg">
        <div>
            <div class="dg-two-content">
            </div>
            <div class="dg-two-content-down">
            </div>
        </div>
    </div>
    <script src="asset/aos-master/dist/aos.js"></script>
    <script src="asset/js/core/jquery.min.js" type="text/javascript"></script>
    <script src="asset/js/core/popper.min.js" type="text/javascript"></script>
    <script src="asset/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>