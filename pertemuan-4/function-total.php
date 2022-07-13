<?php

    $nim = 10120212;
    $kd_fakultas = substr($nim, 0, 1);
    $kd_prodi = substr($nim, 1, 2);
    $nama_fakultas = array(1=>"Teknik Informatika","Ekonomi","Hukum","Sosial Politik");

    echo "NIM : $nim<br>";
    echo "Fakultas: ".$nama_fakultas[$kd_fakultas]."<br>";
    echo "Prodi : ";
    if($kd_prodi == "01"){
        echo "Teknik Informatika S1";
    } else if($kd_prodi == "02"){
        echo "Teknik Komputer S1";
    } else if($kd_prodi == "03"){
        echo "Manajemen Informatika D3";
    } else {
        echo "Tidak Diketahui";
    }

    echo "Numur urut : ".substr($nim,5,3);
?>

