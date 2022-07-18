<?php
session_start();
if(!isset($_SESSION["email"])){
  header("Location: index.php?error=4");
}
include_once('../functions.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Edit Data Penjualan</title>
</head>
<body>
  <h1>Edit Data Penjualan</h1>
  <?php
  if(isset($_GET["id"])){
    $db=dbConnect();
    $id=$db->escape_string($_GET["id"]);
    if($dataPenjualan = getDataPenjualan($id)){
      ?>
      <a href="index.php"><button class="btn btn-primary">View Penjualan</button></a>
      <div class="container">
        <div class="mt-3 px-3" >
          <form action="edit-penjualan.php" method="post">
            <input type="hidden" name="id" value="<?php echo $dataPenjualan["id"];?>">

            <div class="col-md-4 mt-2">
              <label for="nama" class="form-label">Nama Pasien</label>
              <select name="idPasien" class="form-select col-md-4">
                <option selected>Pilih Nama Pasien</option>
                <?php
                $listPasien = getListPasien();
                foreach($listPasien as $pasien){
                  echo "<option value='$pasien[id]'>$pasien[id] - $pasien[nama]</option>";
                }
                ?>
              </select>
            </div>

            <div class="col-md-4 mt-2">
              <label for="idObat" class="form-label">ID Obat</label>
              <select name="idObat" class="form-select col-md-4">
                <option>Pilih ID Obat</option>
                <?php
                $listObat = getListObat();
                foreach($listObat as $obat){
                  echo "<option value='$obat[id]'>$obat[id] - $obat[nama]</option>";
                }
                ?>
              </select>
            </div>

            <div class="col-md-4 mt-2">
              <label for="tanggal" class="form-label">Tanggal</label>
              <input type="date" name="tanggal" class="form-control border-success" value="<?php echo $dataPenjualan["tanggal"];?>">
            </div>

            <div class="col-md-4 mt-2">
              <label for="jumlah">Jumlah</label>
              <input type="text" name="jumlah" class="form-control border-success" value="<?php echo $dataPenjualan["qty"];?>">
            </div>
            
            <div class="col-md-4 mt-2">
              <label for="total" class="form-label">Nama Admin</label>
              <select name="idAdmin" class="form-select col-md-4">
                <option selected>Pilih ID Admin</option>
                <?php
                $listAdmin = getListAdmin();
                foreach($listAdmin as $admin){
                  echo "<option value='$admin[id]'>$admin[id] - $admin[nama]</option>";
                }
                ?>
              </select>
            </div>
            <div class="pt-2 mt-2">
              <button class="btn btn-warning" name="edit">Edit</button>
            </div>
          </form>
        </div>
      </div>
      <?php
    }
  }
  ?>
</body>
</html>