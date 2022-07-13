<?php

    //Membuat Array Ada 2 Cara
    //Cara 1
    $angka = array(1,4,5,-1,3);
    echo "<pre>";
    print_r($angka);
    echo "</pre>";
    echo "<br>";
    echo "<hr>";

    // Cara ke 2
    $ibuKota = array("jabar" => "Bandung");
    echo "<pre>";
    print_r($ibuKota);
    echo "</pre>";
    echo "<br>";
    echo "<hr>";

    //Menampilkan Array dengan perulangan
    echo "Menampilkan Array";
    for($i = 0; $i<count($angka);$i++)
        echo $angka[$i]."<br>";
    echo "<br>";
    echo "<hr>";
    
    // Menulusrui isi Array
    $arrIbuKota = array("jabar" => "Bandung",
                        "kepri" => "Tanjung Pinang",
                        "jateng" => "Semarang");
    foreach ($arrIbuKota as $ibuKota => $kota) {
        echo "Nama Ibukota $ibuKota adalah $kota <br>";
    }

    foreach ($arrIbuKota as $kota) {
        echo "$kota <br>";
    }
    echo "<hr>";


    // Array Multidimensi
    // Array dalam Array

    $matrix = array(array(1,3,1),
                    array(2,1,0));
    
    foreach ($matrix as $key) {
        $i = 0;
        while($i<1){
            echo "$key[0]";
            $i++;
        }    
    }  
?>