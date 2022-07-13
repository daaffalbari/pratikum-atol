<?php

    include_once('class.php');
    $nilaiDaffa = new Nilai();

    $nilaiDaffa->setNilaiTugas(90);
    $nilaiDaffa->setNilaiUts(80);
    $nilaiDaffa->setNilaiUas(65);

    echo "Nilai Tugas: " . $nilaiDaffa->getNilaiTugas() . "<br>";
    echo "Nilai Uts: " . $nilaiDaffa->getNilaiUts() . "<br>";
    echo "Nilai Uas: " . $nilaiDaffa->getNilaiUas() . "<br>";
    echo "Nilai Akhir: " . $nilaiDaffa->getNilaiAkhir() . "<br>";
    echo "Index: " . $nilaiDaffa->getIndex() . "<br>";
?>