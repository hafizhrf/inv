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
    <link rel="icon" href="asset/img/logo/inv.png">

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
            <li class="nav-item dropdown">
                <?php

                if (!empty($_SESSION['user_id'])) {
                    echo '<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">';
                    echo $_SESSION['level'];
                    echo '</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Profil</a>
                    <a class="dropdown-item" href="#">Pengaturan</a>
                    <a class="dropdown-item" href="view/logout.php">Log Out</a>
                </div>';
                }

                ?>
            </li>
            <?php

            if (!empty($_SESSION['user_id'])){
            if ($_SESSION['level'] == "admin") {
                echo '<li class="nav-item">
                      <a class="nav-link" href="view/register.php">Daftarkan Member</a>
                      </li>';
            }}
            ?>
        </ul>
    </div>
</nav>
<div class="div-home-dashboard">
    <div class="dg-one" id="dgOne">
        <div class="dg-one-left" data-aos="fade-up"
             data-aos-duration="200">
            <h2>INV</h2>
            <p><i>Aplikasi <span><b>Peminjaman</b></span> - <span><b>Pengembalian</b></span> Barang</i></p>
        </div>
        <div class="dg-one-right" data-aos="fade-left"
             data-aos-anchor="#example-anchor"
             data-aos-offset="500"
             data-aos-duration="200">
            <img src="asset/img/box.png">
        </div>
        <div class="dg-one-middle" data-aos="fade-up"
             data-aos-duration="200">
            <?php

            if (empty($_SESSION['user_id'])) {
                echo '<button class="dg-button-login"><a href="view/login.php">Login</a></button>';
            }
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

        $("a[href^='#']").click(function (e) {
            e.preventDefault();

            var position = $($(this).attr("href")).offset().top;

            $("body, html").animate({
                scrollTop: position
            } /* speed */);
        });
    </script>
</body>
</html>