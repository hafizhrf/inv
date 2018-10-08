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
    <title>Edit Kategori</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
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
            <td><input readonly type="text" name="id" value="<?php echo $kat[0];?>"></td>
        </tr>
        <tr>
            <td>Description</td>
            <td><input type="text" name="des" value="<?php echo $kat[1];?>"></td>
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