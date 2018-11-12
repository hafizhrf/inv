<?php
require('loginClass.php');
include '../config/admindb.php';
if (isset($_POST["proses"])) {
    $nama = $_POST["txtnamal"];
    $username = $_POST["txtnama"];
    $password = $_POST["txtpass"];
    $level = $_POST["sllevel"];
    $reg = new Validation();
    $login = $reg->register($nama, $username, $password, $level);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="../asset/css/material-dashboard.css?v=2.0.2">
    <link href="../asset/css/style.css?v=<?php echo time(); ?>" rel="stylesheet">
</head>
<body>
<style>
    body{
        background-color: #ebebeb;
    }
    .card{
        margin: 0 auto;
        top: 10em;
        border: 1px solid #ebebeb;
        box-shadow: 8px 8px 20px 1px grey;
    }
    h4 {
        margin-top: 20px;
        margin-bottom: 20px;
        text-transform: uppercase;
        text-align: center;
    }
</style>
<nav class="navbar fixed-top navbar-expand-lg bg-white">
    <img id="imglogo" src="../asset/img/ic/ic-inv-x64.png" alt="logo">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-bar navbar-kebab"></span>
        <span class="navbar-toggler-bar navbar-kebab"></span>
        <span class="navbar-toggler-bar navbar-kebab"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="../index.php">Beranda<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Fitur</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Tentang</a>
            </li>
        </ul>
    </div>
</nav>
<div class="container">
    <div class="card col-md-5">
        <div class="form-group c">
            <h1>Register</h1>
            <form action="register.php" method="POST">
                <div class="form-group ">
                    <label for="">Nama</label>
                    <input type="text" name="txtnamal" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" name="txtnama" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="txtpass" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="">Level</label>
                    <select class="form-control" name="sllevel">
                        <option value="peminjam">peminjam</option>
                        <option value="petugas">petugas</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" name="reg" class="btn btn-warning" value="Login"/>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>