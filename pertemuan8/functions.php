<?php
define("DEVELOPMENT",TRUE);
function dbConnect(){
	$db=new mysqli("localhost","root","pknstan2020","db10120212");// Sesuaikan dengan konfigurasi server anda.
	return $db;
}
// getListKategori digunakan untuk mengambil seluruh data dari tabel produk
function getListKategori(){
	$db=dbConnect();
	if($db->connect_errno==0){
		$res=$db->query("SELECT * 
						 FROM kategori
						 ORDER BY IdKategori");
		if($res){
			$data=$res->fetch_all(MYSQLI_ASSOC);
			$res->free();
			return $data;
		}
		else
			return FALSE; 
	}
	else
		return FALSE;
}
// digunakan untuk mengambil data sebuah produk
function getDataProduk($IdProduk){
	$db=dbConnect();
	if($db->connect_errno==0){
		$res=$db->query("SELECT p.IdProduk,p.Nama,p.IdKategori,p.Skala,p.Pemasok,
								p.Deskripsi,p.Stok,p.HargaBeli,p.HargaJual,
								k.Nama NamaKategori,k.Keterangan KeteranganKategori
						 FROM produk p JOIN kategori k ON p.IdKategori=k.IdKategori
						 WHERE p.IdProduk='$IdProduk'");
		if($res){
			if($res->num_rows>0){
				$data=$res->fetch_assoc();
				$res->free();
				return $data;
			}
			else
				return FALSE;
		}
		else
			return FALSE; 
	}
	else
		return FALSE;
}
