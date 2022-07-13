<?php

  $db = new mysqli("localhost", "root", "pknstan2020", "db10120212");
  if($db->connect_errno){
    echo "Gagal Koneksi ke Database: (".$db->connect_errno.") ".$db->connect_error;
  } else {
    echo "Koneksi ke Database Berhasil";
  }

?>