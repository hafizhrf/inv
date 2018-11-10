<?php
    session_start();
    unset($_SESSION['daftar']);
    header("Location: daftar.barang.php");
?>