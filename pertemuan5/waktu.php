<?php

    include_once('class.php');
    $w = new Waktu();


    echo "1. Total Menit : " . $w->getTotalMenit() . "<br>";
    $w->setJam(10);

?>