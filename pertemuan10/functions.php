<?php
define("DEVELOPMENT",TRUE);
function dbConnect(){
	$db=new mysqli("localhost","root","","db10197025");// Sesuaikan dengan konfigurasi server anda.
	return $db;
}
