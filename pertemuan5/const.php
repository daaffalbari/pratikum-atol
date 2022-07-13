<?php

    class Math{
        const pi = 3.14;
        function luasLingkaran($jariJari){
            return (self::pi * $jariJari * $jariJari);
        }

        function luasPersegi($sisi){
            return ($sisi * $sisi);
        }

        function luasSegitiga($alas, $tinggi){
            return ($alas * $tinggi / 2);
        }
    }

    echo "Nilai PI : " . Math::pi . "<br>";
    $bangunDatar = new Math();
    echo "Luas Lingkaran dengan jari-jari 5 cm : " . $bangunDatar->luasLingkaran(5) . "<br>";
?>