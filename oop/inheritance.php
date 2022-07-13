<?php
class Sesuatu{
	public $public="isi public";
	protected $protected="isi protected";
	private $private="isi private";
	public function func_public(){
		echo "Function public<br>";
	}
	protected function func_protected(){
		echo "Function protected<br>";
	}
	private function func_private(){
		echo "Function private<br>";
	}
}

class SubSesuatu extends Sesuatu{
	function show_properti(){
		echo "Public : ".$this->public."<br>";
		echo "Protected : ".$this->protected."<br>";
		//echo "Private : ".$this->private."<br>";
	}
	function show_method(){
		$this->func_public();
		$this->func_protected();
		$this->func_private();
	}
}

// app
$obj=new SubSesuatu();
$obj->show_properti();
$obj->show_method();


?>