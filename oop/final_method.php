<?php
class Math{
	const PI = 3.1429;
	final function luasLingkaran($radius){
		return self::PI * $radius * $radius;    
	}
}

class Math_v2 extends Math{    
	function luasLingkaran($radius) // PASTI ERROR    
	{        
		return self::PI * pow($radius, 2);    
	}
}