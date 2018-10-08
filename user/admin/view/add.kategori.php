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
    <title>Add Kategori</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <form action="../proses/kategori.php?proses=Add" method="POST">
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