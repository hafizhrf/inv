<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../../asset/css/materialize.min.css">
    <link rel="stylesheet" href="../../../asset/css/materialize.min.css">
    <title>Barang</title>
</head>
<body>
<script src="../../../asset/js/materialize.min.js"></script>
<div class="container">
    <h1>List Barang</h1>
    <table class="responsive-table striped">
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
            require('../class/barang.php');
            $lib = new Barang();
            $data = $lib->readBar();
            foreach($data as $Bar){
        ?>
        <tr>
            <td><?php echo $Bar['id']; ?></td>
            <td><?php echo $Bar['nama']; ?></td>
            <td><?php echo $Bar['qty']; ?></td>
            <td><?php echo $Bar['kondisi']; ?></td>
            <td><?php echo $Bar['kategori']; ?></td>
            <td>
            <form action="edit.barang.php?id=<?php echo $Bar['id'] ?>" method="POST">
            <input type="submit" class="mui-btn mui-btn--primary" width="100%" value="Edit" name="proses">
            </form>
            <form action="../proses/barang.php?id=<?php echo $Bar['id'] ?>" method="POST">
            <input type="submit" class="mui-btn mui-btn--primary" value="Delete" name="proses">
            </form>
            </td>
        </tr>
            <?php 
            }
            ?>
    </table>
    <a href="add.barang.php"class="waves-effect waves-light orange btn">Add</a>
    </div>
</body>
</html>