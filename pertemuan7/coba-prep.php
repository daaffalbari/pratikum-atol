<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <!-- <h2>Pencarian pegawai</h2>
  <form action="" method="post">
    <label for="">Cari pegawai</label>
    <input type="text" name="cari" id="">
    <input type="submit" value="Cari" name="btn-cari"> 
  </form> -->

  <?php
      include_once('functions.php');
      $db = dbConnect();
      if($db->connect_errno == 0){
        $sql = "select idPegawai, namaDepan, namaBelakang from pegawai where idPegawai=?";
        if($stmt=$db->prepare($sql)){
          $id='1002';
          $stmt->bind_param("i", $id);
          $stmt->execute();
          $res=$stmt->get_result();
          $data=$res->fetch_assoc();
          echo $data["idPegawai"]."".$data["namaDepan"]."".$data["namaBelakang"]."<br>";

          $id='1056';
          $stmt->execute();
          $res=$stmt->get_result();
          $data=$res->fetch_assoc();
          echo $data["idPegawai"]."".$data["namaDepan"]."".$data["namaBelakang"]."<br>";
        } else{
          echo "Gagal Prepare Query: (".$db->errno.") ".$db->error;
        }
      } else {
        echo "Gagal Koneksi ke Database: (".$db->connect_errno.") ".$db->connect_error;
      }
  ?>
</body>
</html>