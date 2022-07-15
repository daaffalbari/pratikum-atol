<?php
class MyMath{
	static function PI(){
		return 22 / 7;    
	}
	static function luasLingkaran($radius){
		return self::PI() * $radius * $radius;
	}
	static function pangkat($bilangan, $pangkat){	
		return pow($bilangan, $pangkat);
	}
}

echo "PI : " . MyMath::PI() . "<br>";
echo "Luas Lingkaran dengan radius 15 : ".MyMath::luasLingkaran(15) . "<br>";
echo "5<sup>3</sup> : " . MyMath::pangkat(5, 3) . "<br>"; 
