<?php
class ortu{
	protected $nama;
	public function __construct($nama){
		$this->nama=$nama;
		echo $this->nama." dilahirkan (parent)<br>";
	}
	public function kehidupan(){
		echo $this->nama." sedang menjalani kehidupan <br>";
	}
	public function __destruct(){
		echo $this->nama." meninggal.... (parent)<br>";
	}
}

class anak extends ortu{
	public function __construct($nama){
		parent::__construct($nama);
		echo $this->nama." dilahirkan (constructor anak)<br>";
	}
	public function __destruct(){
		echo $this->nama." sakit..... <br> (destructor anak) <br>";		
		parent::__destruct();
	}
}
$obj=new ortu("Udin");
$obj->kehidupan();
echo "Proses lain<br>";
$obj2=new anak("Putra");
$obj2->kehidupan();
?>