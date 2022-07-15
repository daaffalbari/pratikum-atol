<?php
class ortu{
	public function belanja(){
		echo "Belanja ke pasar...<br>";
	}
}

class anak extends ortu{
	public function belanja(){
		parent::belanja();// belanja milik parent
		echo "Belanja Online...<br>";
	}
}

$ortu=new ortu();
$anak=new anak();
echo "Ortu : ";
$ortu->belanja();
echo "Anak : ";
$anak->belanja();

?>