<?php
	session_id("abcdefg");
	session_start();
	echo "Session ID :".session_id()."<br>";
	$_SESSION["nama"]="Cecep Gorbachev";
	if(!isset($_SESSION["count"]))
		$_SESSION["count"]=1;
	else
		$_SESSION["count"]++;
	echo "Selamat Datang ".$_SESSION["nama"]."<br>";
	echo "Ini halaman ke-".$_SESSION["count"]." yang anda buka";

	