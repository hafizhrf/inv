<?php
session_start();
if (!empty($_SESSION['user_id'])) {
    if ($_SESSION['level'] == 'admin') {
        header("Location: ../user/admin/view/index.php");
    } elseif ($_SESSION['level'] == 'petugas') {
        header("Location: ../user/petugas/view/index.php");
    }
}
$login_error_message = "";
// Application library ( with DemoLib class )
require_once("loginClass.php");
$app = new Validation();

if (!empty($_POST['Login'])) {

    $username = ($_POST['username']);
    $password = ($_POST['password']);

    if ($username == "") {
        $login_error_message = 'Kolom username harus diisi!';
    } else if ($password == "") {
        $login_error_message = 'Kolom password harus diisi!';
    } else {
        $user = $app->Login($username, $password); // check user login
        if ($user > 0) {
            $_SESSION['user_id'] = $user->id;
            $_SESSION['level'] = $user->level;
            if ($user->level == 'admin') {
                header("Location: ../user/admin/view/index.php");
            } elseif ($user->level == 'petugas') {
                header("Location: ../user/petugas/view/index.php");
            }
        } else {
            $login_error_message = 'Password Atau Username salah';
        }
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../asset/css/material-dashboard.css?v=2.0.2">
    <link rel="icon" href="../asset/img/logo/inv.png">
    <link href="../asset/css/style.css?v=<?php echo time(); ?>" rel="stylesheet">
</head>
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
                <a class="nav-link" href="../index.php#dgOne">Beranda<span class="sr-only">(current)</span></a>
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
<body>
<style>
    body {
        background-color: #ebebeb;
    }

    .card {
        margin: 0 auto;
        top: 10em;
        border: 1px solid #ebebeb;
    }

    h4 {
        margin-top: 20px;
        margin-bottom: 20px;
        text-transform: uppercase;
        text-align: center;
    }
</style>
<div class="container">
    <div class="card col-md-5">

        <div class="form-group c">
            <h4>Login</h4>
            <?php
            if ($login_error_message != "") {
                echo '<div class="alert alert-danger"><strong>Error: </strong> ' . $login_error_message . '</div>';
            }
            ?>
            <form action="login.php" method="post">
                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" name="username" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control"/>
                </div>
                <div class="form-group">
                        <input type="submit" name="Login" class="btn btn-warning" 
                        style="position: relative; float: center;"
                        value="Login"/>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>