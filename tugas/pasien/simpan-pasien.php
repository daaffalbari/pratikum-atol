<?php
session_start();
if(!isset($_SESSION["email"])){
  header("Location: index.php?error=4");
}
  include_once("../functions.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Simpan Data Pasien</title>
</head>
<body>
  <h1>Penyimpan Data Pasien</h1>
  <?php
  if(isset($_POST["simpan"])){
    $db=dbConnect();
    if($db->connect_errno == 0){
      $nama = $db->escape_string(htmlspecialchars($_POST["nama"]));
      $alamat = $db->escape_string(htmlspecialchars($_POST["alamat"]));
      $tanggal = $db->escape_string(htmlspecialchars($_POST["tanggal"]));

      $sql = "INSERT INTO pasien VALUES ('', '$nama', '$alamat', '$tanggal')";
      $res = $db->query($sql);
      if($res){
        if($db->affected_rows > 0){
          ?>
          <div class="alert alert-success">
            <strong>Berhasil!</strong> Data berhasil disimpan.<br>
            <a href="index.php"><button class="btn btn-primary">View Pasien</button></a>
          </div>
          <?php
        } 
      } else {
        ?>
        <div class="alert alert-danger">
          <strong>Gagal!</strong> Data gagal disimpan.<br>
          <a href="javascript:history.back()"><button class="btn btn-warning">Kembali</button></a>
        </div>
        <?php
      }
    } else {
      ?>
      <div class="alert alert-danger">
        <strong>Gagal!</strong> Koneksi ke database gagal.
        <?php echo $db->connect_error; ?>
      </div>
      <?php
    }
  }
?>
</body>
</html>