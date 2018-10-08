<?php
    session_start();
    if(empty($_SESSION['user_id']))
    {
        header("Location: ../../../view/login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kategori</title>
</head>
<body>
    <h1>List Kategori</h1>
    <table border=1>
        <tr>
            <th>ID</th>
            <th>Kategori</th>
            <th>Aksi</th>
        </tr>
        <?php
            require('../class/kategori.php');
            $lib = new Kategori();
            $data = $lib->readKat();
            foreach($data as $kat){
        ?>
        <tr>
            <td><?php echo $kat['id']; ?></td>
            <td><?php echo $kat['description']; ?></td>
            <td>
            <form action="edit.kategori.php?id=<?php echo $kat['id'] ?>" method="POST">
            <input type="submit" value="Edit" name="proses">
            </form>
            <form action="../proses/kategori.php?id=<?php echo $kat['id'] ?>" method="POST">
            <input type="submit" value="Delete" name="proses">
            </form>
            </td>
        </tr>
            <?php 
            }
            ?>
    </table>
    <form action="add.kategori.php" method="POST">
            <input type="submit" value="Add" name="proses">
            </form>
</body>
</html>