
<?php
session_start();
if(empty($_SESSION['user_id']) || $_SESSION['level'] !== "petugas")
{
    header("Location: ../../../view/login.php");
}
elseif(empty($_GET['id'])){
    header("Location: peminjaman.php");
}

$a = $_GET['id'];
require('../class/peminjaman.php');
$lib = new Peminjaman();
$data = $lib->detPem($a);
$dat = $lib->detDet($a);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../../../asset/img/logo/inv.png">
    <link rel="stylesheet" href="../../../asset//css/select2.min.css">
    <link href="../../../asset/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
    <link rel="stylesheet" href="../../../asset/css/jquery.dataTables.css"> 
    <link rel="stylesheet" href="../../../asset/css/dataTables.bootstrap.css"> 
    <script src="../../../asset/js/jquery.min.js"></script>
    <script src="../../../asset/js/jquery.dataTables.js"></script>
    <script src="../../../asset/js/core/popper.min.js" type="text/javascript"></script>
    <script src="../../../asset/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
    <script src="../../../asset/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../../../asset/js/material-dashboard.min.js?v=2.1.0" type="text/javascript"></script>
    <script src="../../../asset/js/select2.min.js"></script>
    <title>Detail</title>
</head>
<body>
    <style>
    body{
        font-family: Segoe UI, Segoe UI Symbol;
        background-color:#edeeef;
        margin-top: 50px;
        margin-bottom: 50px;
    }
    .card{
        padding: 20px;
        margin: 0 auto;
        margin-top:5px;
    }
    h6{
        color: grey;
    }
    .card-body{
        text-align:center;
    }
    th{
        color: #007bff;
    }
    span{
        font-size: 35px;
    }
</style>
<div class="container">
    <?php 
    if (@$_GET['j'] == 'm') {
            # code...
        echo '<a href="peminjaman.php" class="btn btn-danger ">Kembali</a>';
    }
    else{
        echo '<a href="pengembalian.php" class="btn btn-danger">Kembali</a>';
    }
    ?>
    <div class="row">
      <div class="col-md-6 col-sm-6">
          <div class="card card-stats">
              <div class="card-header card-header-warning card-header-icon">
                <div class="card-icon">
                    <span></span>
                </div>
                <p class="card-category"><hr></p>
                <h3 class="card-title"><?=$data->id?></h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                  ID Peminjaman
              </div>
          </div>
      </div>
      <div class="card card-stats">
          <div class="card-header card-header-warning card-header-icon">
            <div class="card-icon">
                <span></span>
            </div>
            <p class="card-category"><hr></p>
            <h3 class="card-title"><?=$data->tgl_pinjam?></h3>
        </div>
        <div class="card-footer">
          <div class="stats">
              Tanggal
          </div>
      </div>
  </div>
</div>

<div class="col-md-6 col-sm-6">
  <div class="card card-stats">
      <div class="card-header card-header-success card-header-icon">
        <div class="card-icon">
          <span></span>
        </div>
      <p class="card-category"><hr></p>
      <h3 class="card-title"><?=$data->nama?></h3>
        </div>
        <div class="card-footer">
              <div class="stats">
                  Nama Peminjam
              </div>
          </div>
    </div>

    <div class="card card-stats">
        <div class="card-header card-header-success card-header-icon">
            <div class="card-icon">
                <span></span>
            </div>
        <p class="card-category"><hr></p>
        <h3 class="card-title"><?=$data->status?></h3>
    </div>
    <div class="card-footer">
              <div class="stats">
                  Status Peminjaman
              </div>
          </div>
</div>

</div>
<h4 class="card col-sm-12"><center>Barang Yang Dipinjam</center></h4>
<div class="barang card">
    <table class="table-striped table datat">
        <thead class="orange">
            <tr>
                <th>ID Barang</th> 
                <th>Nama Barang</th>
            </tr>
        </thead>
        <?php
        foreach($dat as $det){
            ?>
            <tr>
                <td><?php echo $det['id']?></td>
                <td><?php echo $det['nama']?></td>
            </tr>
            <?php
        }
        ?>
    </table>  
</div>
</div>
<script>
    $(document).ready(function(){
        $("#buka").click(function(){
            $(".barang").slideToggle("fast");
        });
    });
</script>
</body>
</html>