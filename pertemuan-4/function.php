<?php
    // Function Total
    function total($arr) {
        $total = 0;
        foreach ($arr as $value) {
            $total += $value;
        }
        return $total;
    }
    

    // Function Max
    function terbesar($arr){
        $max = $arr[0];
        foreach($arr as $value){
            if($value > $max){
                $max = $value;
            }
        }
        return $max;
    }

    // Function mencari nilai terkecil
    function terkecil($arr){
        $min = $arr[0];
        foreach($arr as $value){
            if($value < $min){
                $min = $value;
            }
        }
        return $min;
    }

    // function mengubah angka menjadi string terbilang
    function terbilang($x) {
        $angka = ["", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas"];
      
        if ($x < 12)
          return " " . $angka[$x];
        else if ($x < 20)
          return terbilang($x - 10) . " belas";
        else if ($x < 100)
          return terbilang($x / 10) . " puluh" . terbilang($x % 10);
        else if ($x < 200)
          return "seratus" . terbilang($x - 100);
        else if ($x < 1000)
          return terbilang($x / 100) . " ratus" . terbilang($x % 100);
        else if ($x < 2000)
          return "seribu" . terbilang($x - 1000);
        else if ($x < 1000000)
          return terbilang($x / 1000) . " ribu" . terbilang($x % 1000);
        else if ($x < 1000000000)
          return terbilang($x / 1000000) . " juta" . terbilang($x % 1000000);
      }
?>


