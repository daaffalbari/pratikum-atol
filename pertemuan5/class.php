<?php 

    class Nilai {
        // Property 
        private $nilaiTugas = 0; 
        private $nilaiUts = 0;
        private $nilaiUas = 0;

        public function setNilaiTugas($nilaiTugas){
            if($nilaiTugas >= 0 && $nilaiTugas <= 100){
                $this->nilaiTugas = $nilaiTugas;
            }
        }

        public function setNilaiUts($nilaiUts){
            if($nilaiUts >= 0 && $nilaiUts <= 100){
                $this->nilaiUts = $nilaiUts;
            }
        }

        public function setNilaiUas($nilaiUas){
            if($nilaiUas >= 0 && $nilaiUas <= 100){
                $this->nilaiUas = $nilaiUas;
            }
        }

        public function getNilaiTugas(){
            return $this->nilaiTugas;
        }

        public function getNilaiUts(){
            return $this->nilaiUts;
        }

        public function getNilaiUas(){
            return $this->nilaiUas;
        }
        
        // Mencari Nilai Akhir
        function getNilaiAkhir(){
            return (0.2 * $this->nilaiTugas + 0.3 * $this->nilaiUts + 0.5 * $this->nilaiUas);
        } // 18 + 24 + 35 = 77

        // Mencari Index dari nilai Akhir
        function getIndex(){
            $nilaiAkhir = $this->getNilaiAkhir();
            if($nilaiAkhir >= 90){
                return "A";
            } else if($nilaiAkhir >= 80){
                return "B";
            } else if($nilaiAkhir >= 70){
                return "C";
            } else if($nilaiAkhir >= 60){
                return "D";
            } else {
                return "E";
            }
        }
    }



    class Waktu{
        private $menitWaktu;

        public function setMenit($m){
            if($m >= 0 && $m <= 59){
                $this->menitWaktu = $m;
            }
        }

        public function getMenit(){
            return $this->menitWaktu;
        }

        function setjam($j){
            if($j >= 0 && $j <= 23){
                $this->jamWaktu = $j;
            }
        }

        function getJam(){
            return $this->jamWaktu;
        }

        function getTotalMenit(){
            return ($this->jamWaktu * 60) + $this->menitWaktu;
        }

    }
?>