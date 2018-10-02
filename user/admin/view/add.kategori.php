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
    <title>Add Kategori</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <form action="../proses/kategori.php" method="POST">
    <table>
        <tr>
            <td>Id</td>
            <td><input type="text" name="id"></td>
        </tr>
        <tr>
            <td>Description</td>
            <td><input type="text" name="des"></td>
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