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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../../asset/css/bootstrap.min.css"> 
    <script src="../../../asset/js/jquery.min.js"></script>
    <script src="../../../asset/js/bootstrap.min.js"></script>
    <title>Barang</title>
</head>
<body>
<style>
    .fwhite{
        color:white;
    }
</style>
    
<div class="container">
    <h1>List Barang</h1>
    <table class="table-striped table">
    <thead class="orange">
        <tr>
            <th>ID</th> 
            <th>Nama Barang</th>
            <th>Kuantiti</th>
            <th>Kondisi</th>
            <th>Kategori</th>
            <th>Aksi</th>
        </tr>
    </thead>
        <?php
            require('../class/barang.php');
            $lib = new Barang();
            $data = $lib->readBar();
            foreach($data as $Bar){
        ?>
        <tr>
            <td><?php echo $Bar['id']; ?></td>
            <td><?php echo $Bar['nama']; ?></td>
            <td><?php echo $Bar['qty']; ?></td>
            <td><?php echo $Bar['kondisi']; ?></td>
            <td><?php echo $Bar['kategori']; ?></td>
            <td>
            <a href="?id=<?php echo $Bar['id'] ?>" data-toggle="modal" data-target="#EditBarang"><button type="button"<?php $id = $Bar['id'];?> class="btn btn-primary" data-toggle="modal" data-target="#EditBarang">
            Edit</button></a> |
            <a href="../proses/barang.php?id=<?php echo $Bar['id'] ?>&&proses=Delete" ><button  class="btn btn-primary">
            Hapus</button></a> 
            </td>
        </tr>
            <?php 
            }
            ?>
    </table>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddBarang">
Add
</button>

<!-- Modal -->
<div class="modal fade" id="AddBarang" tabindex="-1" role="dialog" aria-labelledby="AddBarangTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Barang</h5>
      </div>
      <div class="modal-body">
      <form action="../proses/barang.php?proses=Add" method="POST">
    <table>
        <tr>
            <td>Id</td>
            <td> </td>
            <td><input type="text" name="id" class="form-control" autocomplete="off"></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td> </td>
            <td><input type="text" class="form-control" name="nama"></td>
        </tr>
        <tr>
            <td>Kuantiti</td>
            <td> </td>
            <td><input type="number" name="qty" class="form-control"></td>
        </tr>
        
        <tr>
            <td>Kategori</td>
            <td> </td>
            <td><select name="id_kat" class="form-control">
            <?php
            require('../class/kategori.php');
            $kategori = new Kategori();
            $data = $kategori->readKat();
            foreach($data as $kat){
        ?>
            <option value="<?php echo $kat[0];?>"><?php echo $kat[1];?></option>
            <?php
            }
            ?>
            </select></td>
        </tr>
        <tr>
            <td>Kondisi</td>
            <td> </td>
            <td>
            <div class="btn-group btn-group-toggle" data-toggle="buttons">
            <label class="btn btn-primary active">    
            <input type="radio" value="Baik" name="kondisi" checked>Baik
            </label>
            <label class="btn btn-primary">
            <input type="radio" value="Buruk" name="kondisi">Buruk</td>
            </label>
            </div>
        </tr>
    </table>
      </div>
      <div class="modal-footer">
          
      <td><input type="submit" value="Add" class="btn btn-primary" name="proses"></td>
    </form>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="EditBarang" tabindex="-1" role="dialog" aria-labelledby="AddBarangTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Barang</h5>
      </div>
      <div class="modal-body">
      <form action="../proses/barang.php?proses=Update" method="POST">
    <table>
    <?php
            $edit = $lib->editBar($id);
            foreach($edit as $Bar){
        ?>
        <tr>
            <td>Id</td>
            <td> </td>
            <td><input readonly type="text" name="id" value="<?php echo $Bar['id'];?>"></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td> </td>
            <td><input type="text" name="nama" value="<?php echo $Bar['nama'];?>"></td>
        </tr>
        <tr>
            <td>Kuantiti</td>
            <td> </td>
            <td><input type="number" value="<?php echo $Bar['qty'];?>" name="qty"></td>
        </tr>
        <tr>
            <td>Kondisi</td>
            <td> </td>
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
            <td><input type="radio" value="Baik" <?php echo $baik ?> selected name="kondisi">Baik
            <input type="radio" value="Buruk" <?php echo $buruk ?> name="kondisi">Buruk</td>
        </tr>
        <tr>
            <td>Kategori</td>
            <td> </td>
            <td><select name="id_kat">
            <?php
            $arg = $kategori->readKat();
            foreach($arg as $kat){
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
      <div class="modal-footer">
          
      <td><input type="submit" value="Add" class="btn btn-primary" name="proses"></td>
    </form>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</body>
</html>