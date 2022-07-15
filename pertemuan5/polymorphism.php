<?php
class karakter{
	private $dayahancur;
	private $energi=100;
	private $nama="";
	public function getNama(){
		return $this->nama;
	}	
	public function getEnergi(){
		return $this->energi;
	}	
	public function __construct($nama,$dayahancur){
		$this->nama=$nama;
		$this->dayahancur=$dayahancur;
	}
	public function getDayaHancur(){
		return $this->dayahancur;
	}
	public function kenaMusuh($musuh){ //polymorph
		$this->energi-=$musuh->getDayaHancur();
	}
}
class Pemanah extends karakter{
	public function __construct($nama){
		parent::__construct($nama,20);
	}
}
class Penembak extends karakter{
	public function __construct($nama){
		parent::__construct($nama,30);
	}
}
class Bomber extends karakter{
	public function __construct($nama){
		parent::__construct($nama,50);
	}	
}

$player=new karakter("Player 1",10);
$pemanah=new Pemanah("Arjuna");
$penembak=new Penembak("Sniper");
$bomber=new Bomber("Bomber");

echo $player->getNama()." Energi : ".$player->getEnergi()."<br>";
$player->kenaMusuh($pemanah);
echo "Setelah kena pemanah, Energi : ".$player->getEnergi()."<br>";
$player->kenaMusuh($penembak);
echo "Setelah kena penembak, Energi : ".$player->getEnergi()."<br>";
echo $pemanah->getNama()." Energi : ".$pemanah->getEnergi()."<br>";
$pemanah->kenaMusuh($bomber);
echo "Setelah kena penembak, Energi : ".$pemanah->getEnergi()."<br>";



?>