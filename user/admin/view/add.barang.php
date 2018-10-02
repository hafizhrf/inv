<?php
if(!isset($_POST['proses'])){
    echo "<script>url:location='../../../view/notfound.html';</script>";
}
else{
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Add Barang</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../../asset/css/bootstrap.min.css">
</head>
<body>
    <form action="../proses/barang.php" method="POST">
    <table>
        <tr>
            <td>Id</td>
            <td><input type="text" name="id"></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td><input type="text" name="nama"></td>
        </tr>
        <tr>
            <td>Kuantiti</td>
            <td><input type="number" name="qty"></td>
        </tr>
        <tr>
            <td>Kondisi</td>
            <td>
            <div class="btn-group btn-group-toggle" data-toggle="buttons">
            <label class="btn btn-primary active">    
            <input type="radio" value="Baik" name="kondisi">Baik
            </label>
            <label class="btn btn-primary">
            <input type="radio" value="Buruk" name="kondisi">Buruk</td>
            </label>
            </div>
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
            <td><input type="submit" value="Add" name="proses"></td>
        </tr>
    </form>
    </table>
</body>
</html>
<?php
}
?>