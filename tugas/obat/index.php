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
  <title>Obat</title>
</head>
<body>
  <?php navbar(); ?>
  <div class="container">
    <h2>Tambah obat</h2>
    <?php
    $db=dbConnect();
    if($db->connect_errno == 0){
      $sql = "SELECT * FROM obat";
      $res = $db->query($sql);
      if($res){
        ?>
        <a href="./tambah-obat.php">
        <button class="btn btn-primary" name="tambah-obat">Tambah Obat</button>
        </a>
        <br><br>
        <form action="" method="POST">
          <input type="text" class="form py-1" name="keyword" size="40" placeholder="Masukan keyword pencarian">
          <button class="btn btn-info">Cari Data</button>
        </form>
        <table class="table">
        <thead>
          <tr>
            <th>Id</th>
            <th>Nama Obat</th>
            <th>Stok</th>
            <th>Harga</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $data =  $res->fetch_all(MYSQLI_ASSOC);
          foreach ($data as $key) {
            ?>
            <tr>
              <td><?php echo $key["id"];?></td>
              <td><?php echo $key["nama"];?></td>
              <td><?php echo $key["stok"];?></td>
              <td><?php echo $key["harga"];?></td>
              <td>
                <a href="edit-form.php?id=<?php echo $key["id"];?>">
                  <button class="btn btn-warning">Edit</button>
                </a>
                <a href="hapus-obat.php?id=<?php echo $key["id"]?>">
                  <button class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapusnya?');">Hapus</button>
                </a>
            </tr>
          </tbody>
          <?php
          }
          ?>
      </table>
    <?php
    $res->free_result();
      } else {
        echo "Gagal Eksekusi Query". $db->error. "<br>";
      }
    } else {
      echo "Gagal Koneksi". $db->connect_errno. "<br>";
    }
?>
  </div>
</body>
</html>