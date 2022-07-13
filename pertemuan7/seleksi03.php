<!-- Ambil data sekali banyak menggunakan fetch all -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mencoba database</title>
</head>
<body>
  <?php 
    include_once('functions.php');
    $db = dbConnect();
    if($db->connect_errno == 0){
      $sql = "select IdPegawai, concat(NamaDepan, ' ', NamaBelakang)Nama, Jabatan from pegawai where jabatan<>'Sales Rep'";
      $res = $db->query($sql);
      if($res){
        ?>
        <table border="1"> 
          <tr>
            <th>ID Pegawai</th>
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
          ?>
        </table>
        <?php
      } else {
          echo "Tidak ditemukan data";
        }
    } else {
        echo "Gagal Koneksi ke Database: (".$db->connect_errno.") ".$db->connect_error;
    }
?>
</body>
</html>