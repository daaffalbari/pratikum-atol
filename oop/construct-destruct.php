<?php
class ortu{
	protected $nama;
	public function __construct($nama){
		$this->nama=$nama;
		echo $this->nama." dilahirkan <br>";
	}
	public function kehidupan(){
		echo $this->nama." sedang menjalani kehidupan <br>";
	}
	public function __destruct(){
		echo $this->nama." meninggal....<br>";
	}
}

$obj=new ortu("Udin");
$obj->kehidupan();
echo "Ini adalah proses lain <br>";

?>