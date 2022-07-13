<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h2>Pencarian pegawai</h2>
  <form action="" method="post">
    <label for="">Cari pegawai</label>
    <input type="text" name="cari" id="">
    <input type="submit" value="Cari" name="btn-cari"> 
  </form>

  <?php
    if(isset($_POST["btn-cari"])){
      include_once('functions.php');
      $db = dbConnect();
      $dicari = $_POST["cari"];
      echo $dicari;
      if($db->connect_errno == 0){
        $sql = "select idPegawai, concat(NamaDepan, ' ', NamaBelakang)Nama, Jabatan from pegawai where concat(NamaDepan, ' ', NamaBelakang) like '%$dicari%'";
        $res = $db->query($sql);
        if($res){
          if($res->num_rows > 0){
            echo "Data ditemukan sebanyak ". $res->num_rows ." baris";
            ?>
            <table border="1">
              <tr>
                <th>Id Pegawai</th>
                <th>Nama</th>
                <th>Jabatan</th>
              </tr>
              <?php
              $data = $res->fetch_all();
              foreach ($data as $key) {
              ?>
                <tr>
                  <td><?php echo $key[0] ?></td>
                  <td><?php echo $key[1]; ?></td>
                  <td><?php echo $key[2]; ?></td>
                </tr>
              <?php
              }
              $res->free_result();
              ?>
            </table>
            <?php
          } else {
            echo "Data tidak ditemukan";
          }
        } else {
          echo "Query gagal: " . $db->error;
        }
      } else {
        echo "Gagal Koneksi ke Database: (".$db->connect_errno.") ".$db->connect_error;
      }
    } else {
      echo "Tidak ada data yang dicari";
    }
  ?>
</body>
</html>