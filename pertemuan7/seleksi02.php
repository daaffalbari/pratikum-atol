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
      while($data = $res->fetch_assoc()){
        ?>
          <tr>
            <td><?php echo $data['IdPegawai'] ?></td>
            <td><?php echo $data['Nama']; ?></td>
            <td><?php echo $data['Jabatan']; ?></td>
          </tr>
        <?php
      }
      $res->free();
    } else {
        echo "Tidak ditemukan data";
      }
  } else {
      echo "Gagal Koneksi ke Database: (".$db->connect_errno.") ".$db->connect_error;
  }

?>
