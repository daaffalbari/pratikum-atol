<?php

  include_once('../functions.php');
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Penjualan</title>
</head>
<body>
  <?php navbar(); ?>
  <div class="container">
    <h2>Tambah Penjualan</h2>
    <?php
    $db=dbConnect();
    if($db->connect_errno==0){
      $sql="SELECT j.id, p.nama as namaPasien, o.id as idObat, j.tanggal, j.qty, a.nama from penjualan j join pasien p on j.idPasien=p.id join obat o on j.idObat=o.id join admin a on j.idAdmin=a.id order by j.id asc";
      $res=$db->query($sql);
      if($res){
        ?>
        <a href="tambah-penjualan.php">
          <button class="btn btn-primary mb-2" name="tambah">Tambah Penjualan</button>
        </a>

        <br><br>
        <form action="" method="POST">
          <input type="text" class="form py-1" name="keyword" size="40" placeholder="Masukan keyword pencarian">
          <button class="btn btn-info" name="cari">Cari Data</button>
        </form>

        <table class="table">
        <thead>
          <tr>
            <th>ID Penjualan</th>
            <th>Nama Pasien</th>
            <th>ID Obat</th>
            <th>Tanggal</th>
            <th>Jumlah</th>
            <th>Nama Admin</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
        <?php
        $data=$res->fetch_all(MYSQLI_ASSOC);
        foreach ($data as $key) {
          ?>
          <tr>
            <td><?php echo $key["id"];?></td>
            <td><?php echo $key["namaPasien"];?></td>
            <td><?php echo $key["idObat"];?></td>
            <td><?php echo $key["tanggal"];?></td>
            <td><?php echo $key["qty"];?></td>
            <td><?php echo $key["nama"];?></td>
            <td>
              <a href="edit-form-penjualan.php?id=<?php echo $key["id"];?>">
                <button class="btn btn-warning">Edit</button>
              </a>
              <a href="hapus-penjualan.php?id=<?php echo $key["id"]?>">
                <button class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</button>
              </a>
            </td>
          </tr>
          </tbody>
          <?php
        }
        ?>
        </table>
        <?php
        $res->free();
      } else {
        echo "div class='alert alert-danger'>Data tidak ditemukan</div>";
      }
    } else {
      echo "div class='alert alert-danger'>Koneksi gagal</div>";
    }
?>

</body>
</html>