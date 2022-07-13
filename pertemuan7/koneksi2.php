<?php

  include_once("functions.php");
  $db = dbConnect();
  if($db->connect_errno == 0){
    echo "Koneksi ke Database Berhasil";
  } else {
    echo "Gagal Koneksi ke Database" . (DEVELOPMENT ? " ".$db->connect_error : ""). "<br>";
  }

?>