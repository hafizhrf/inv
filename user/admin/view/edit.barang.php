
<?php
session_start();
if(empty($_SESSION['user_id']) || $_SESSION['level'] !== "admin")
{
    header("Location: ../../../view/login.php");
}
elseif(empty($_GET['id'])){
    header("Location: index.barang.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../../asset/css/bootstrap.min.css"> 
    <script src="../../../asset/js/jquery.min.js"></script>
    <link rel="icon" href="../../../asset/img/logo/inv.png">
    <title>Edit</title>
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
        <form action="../proses/barang.php?proses=Update" method="POST">
            <table>
            <?php
                    require('../class/barang.php');
                    $lib = new Barang();
                    $data = $lib->editBar($_GET['id']);
                    foreach($data as $Bar){
                ?>
                <tr>
                    <td>Id</td>
                    <td><input class="form-control" readonly type="text" name="id" value="<?php echo $Bar['id'];?>"></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td><input class="form-control" type="text" name="nama" value="<?php echo $Bar['nama'];?>"></td>
                </tr>
                <tr>
                    <td>Kuantiti</td>
                    <td><input class="form-control" type="number" value="<?php echo $Bar['qty'];?>" name="qty"></td>
                </tr>
                <tr>
                    <td>Kondisi</td>
                    <?php
                        if ($Bar['kondisi'] == "Baik"){
                            $baik = "checked";
                            $buruk = "";
                        }
                        else{
                            $baik = "";
                            $buruk = "checked";
                        }
                    ?>
                    <td><input type="radio" value="Baik" <?php echo $baik ?> name="kondisi">Baik
                    <input type="radio" value="Buruk" <?php echo $buruk ?> name="kondisi">Buruk</td>
                </tr>
                <tr>
                    <td>Kategori</td>
                    <td><select class="form-control" name="id_kat">
                    <?php
                    require('../class/kategori.php');
                    $lib = new Kategori();
                    $data = $lib->readKat();
                    foreach($data as $kat){
                ?>
                    <option value="<?php echo $kat[0];?>"><?php echo $kat[1];?></option>
                    <?php
                    }
                    ?>
                    </select><br></td>
                </tr>
                <tr>
                    <td><input class="form-control" type="submit" value="Update" name="proses"></td> 
                    <td><a href="index.barang.php" class="btn btn-danger">Kembali</a></td>
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