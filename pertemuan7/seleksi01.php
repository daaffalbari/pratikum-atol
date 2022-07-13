<?php

  include_once('functions.php');
  $db = dbConnect();
  if($db->connect_errno == 0){
    $sql = "select idPegawai, concat(NamaDepan, ' ', NamaBelakang)Nama, Jabatan from pegawai order by idPegawai";
    $res = $db->query($sql);
    if($res){
      echo "Ditemukan " . $res->num_rows . " data<br>";
      $data = $res->fetch_row();
      var_dump($data);
      echo "<br>";
      $data = $res->fetch_assoc();
      var_dump($data);
      echo "<br>";
      $data = $res->fetch_array();
      var_dump($data);
      echo "<br><br>";
      $res->data_seek(0);
      $data = $res->fetch_all(MYSQLI_ASSOC);
      var_dump($data);
      echo "<br>";
      $res->free_result();
    } else {
        echo "Tidak ditemukan data";
      }
  } else {
      echo "Gagal Koneksi ke Database: (".$db->connect_errno.") ".$db->connect_error;
    }
  


?>