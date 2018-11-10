<?php
    session_start();
    if(empty($_SESSION['user_id']) || $_SESSION['level'] !== "admin")
    {
        header("Location: ../../../view/login.php");
    }
    
    require('../class/kategori.php');
    $lib = new Kategori();
    $data = $lib->readKat();
    
    $del = "";
    if(!empty($_GET['id'])){
        $proc = $lib->deleteKat($_GET['id']);
        if($proc == true){
            header ("Location: index.kategori.php");
            $del = "Delete Berhasil";
        }
        else{
            $del = "Delete Gagal";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../../../asset/img/logo/inv.png">
    <link rel="stylesheet" href="../../../asset//css/select2.min.css">
    <link rel="stylesheet" href="../../../asset/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="../../../asset/css/jquery.dataTables.css"> 
    <link rel="stylesheet" href="../../../asset/css/dataTables.bootstrap.css"> 
    <script src="../../../asset/js/jquery.min.js"></script>
    <script src="../../../asset/js/jquery.dataTables.js"></script>
    <script src="../../../asset/js/bootstrap.min.js"></script>
    <script src="../../../asset/js/select2.min.js"></script>
    
 
 
    <title>Kategori</title>
</head>
<body>
<style>
    .fwhite{
        color:white;
    }
    body{
        font-family: Segoe UI;
        margin:0px;
        background-color:#edeeef;
        margin-bottom:50px;
    }
    .table{
        background-color: white;
        border-radius: 8px;
    }
    .fwhite{
        color:white;
    }
    .container{
        margin-top: 50px;
    }
    .habis{
        color: red;
    }
    .putih{
        color: white
    }
    .card{
        padding: 20px;
        border-radius: 10px;
        margin-top:20px;
    }
    .buton{
        margin-left:2px;
        margin-bottom:20px;
    }
    .beli{
        margin-left:2px;
        background-color:white;
        border-radius: 10px;
        padding:12px;
        /* display: none; */
    }
    h9{
        color:white;
    }
    .top-form{
        background-color: blue;
    }
    
</style>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a href="../../../view/indexadmin.php" class="navbar-brand"><img src="../../../asset/img/storage.png" width="30" height="30" class="d-inline-block align-top" alt=""><b> Home</b></a>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active nav-inline">
        <a class="nav-link" >|  &nbsp;Logged in as <?=$_SESSION['level']?></a>
      </li>
    </ul>
  </div>
</nav>

<div class="container">
    <h1>List Kategori</h1>
    <div class="buton">
    <button class="btn btn-primary" id="bukabel">Tambah Kategori</button>
    </div>
    <div class="beli">
    <div ><center> <h4>Add</h4></center></div>
    <form action="../proses/kategori.php?proses=Add" method="POST">
                <div class="form-group">
                    <label for="id" class="control-label"><b>ID</b></label>
                    <input type="text" name="id" required class="form-control" autocomplete="off">
                </div>

                <div class="form-group">
                    <label for="des" class="control-label"><b>Nama</b></label>
                    <input type="text" required class="form-control" name="des">
                </div>

                <div class="form-group">
                    <input type="submit" value="Tambah" class="btn btn-primary" name="proses">
                </div>
                </form>
        
    </div>
    <div class="card">
    <?php
        if ($del != "") {
            echo '<div class="alert alert-primary"><strong>Notice: </strong> ' . $del . '</div>';
        }
    ?>
    <table class="table-striped table datat">
    <thead class="orange">
        <tr>
            <th>ID</th>
            <th>Kategori</th>
            <th>Aksi</th>
        </tr>
    </thead>
        <?php
            foreach($data as $kat){
        ?>
        <tr>
            <td><?php echo $kat['id']; ?></td>
            <td><?php echo $kat['description']; ?></td>
            <td>
            <a class="btn btn-primary"  href="edit.kategori.php?id=<?=$kat['id']?>">
                edit</a> |
                <a href="?id=<?=$kat['id']?>" class="btn btn-danger">X</a>
            </td>
        </tr>
            <?php 
            }
            ?>
    </table>
    </div>
</body>
<script type="text/javascript">
    $(document).ready(function(){
        $('.datat').DataTable();
    });
    
    $(document).ready(function() {
        $('.jualbarang').select2();
    });

    $(document).ready(function(){
        $(".jualan").hide();        
        $(".beli").hide();        

        $("#bukapen").click(function(){
            $(".beli").hide();
            $(".jualan").slideToggle("fast");
        });

        $("#bukabel").click(function(){
            $(".jualan").hide();
            $(".beli").slideToggle("fast");
        });
    });
</script>

</html>