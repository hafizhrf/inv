<?php
    session_start();
    if(empty($_SESSION['user_id']))
    {
        header("Location: ../../../view/login.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit Barang</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
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
            <td><input readonly type="text" name="id" value="<?php echo $Bar['id'];?>"></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td><input type="text" name="nama" value="<?php echo $Bar['nama'];?>"></td>
        </tr>
        <tr>
            <td>Kuantiti</td>
            <td><input type="number" value="<?php echo $Bar['qty'];?>" name="qty"></td>
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
            <td><select name="id_kat">
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
            </select></td>
        </tr>
        <tr>
            <td><input type="submit" value="Update" name="proses"></td>
        </tr>
        <?php
            }
        ?>
    </form>
    </table>
</body>
</html>