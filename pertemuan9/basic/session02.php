<?php
	session_start();
	echo "Nama Pengunjung ".$_SESSION["nama"]."<br>";
	$_SESSION["count"]++;
	echo "Ini kunjungan halaman ke-".$_SESSION["count"]."<br>";
	