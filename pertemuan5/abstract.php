<?php
abstract class mahlukhidup{
	abstract public function bergerak();
	
}

class mamalia extends mahlukhidup{
	public function bergerak(){
		echo "Mamalia di darat Berjalan<br>";
	}
}
class burung extends mahlukhidup{
	public function bergerak(){
		echo "Burung Terbang<br>";
	}
}


$sapi=new mamalia();
$sapi->bergerak();

$pipit=new burung();
$pipit->bergerak();
?>