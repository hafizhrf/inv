<?php
    session_start();
    if(empty($_SESSION['user_id']))
    {
        header("Location: ../../../view/login.php");
    }
    elseif(empty($_GET['id'])){
        header("Location: index.kategori.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../../asset/css/bootstrap.min.css"> 
    <script src="../../../asset/js/jquery.min.js"></script>
    <link rel="icon" href="../../../asset/img/logo/inv.png">
    <title>Edit Kategori</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <style>
        body{
        font-family: Segoe UI;
        background-color:#edeeef;
        }
        .card{
            padding: 20px;
            margin: 0 auto;
            border-radius: 10px;
            top: 10em;
            border: 1px solid #ebebeb;
            box-shadow: 5px 5px 10px 1px grey;
        }
    </style>
<div class="container">
    <div class="card col-md-5">
    <form action="../proses/kategori.php?proses=Update" method="POST">
    <table>
    <?php
            require('../class/kategori.php');
            $lib = new Kategori();
            $data = $lib->editKat($_GET['id']);
            foreach($data as $kat){
        ?>
        <tr>
            <td>Id</td>
            <td><input class="form-control" readonly type="text" name="id" value="<?php echo $kat[0];?>"></td>
        </tr>
        <tr>
            <td>Description</td>
            <td><input class="form-control" type="text" name="des" value="<?php echo $kat[1];?>"></td>
        </tr>
        <tr>
            <td><input type="submit" class="btn btn-success" value="Update" name="proses"></td>
            <td><a href="index.kategori.php" class="btn btn-secondary">Kembali</a></td>
        </tr>
        <?php
            }
        ?>
    </form>
    </table>
    </div>
</div>
</body>
</html>