<?php include_once("functions.php");?>
<!DOCTYPE html>
<html><head><title>Penyimpanan Data Produk</title></head>
<body>
<h1>Penyimpanan Data Produk</h1>
<?php
if(isset($_POST["TblSimpan"])){
	$db=dbConnect();
	if($db->connect_errno==0){
		// Bersihkan data
		$IdProduk  =$db->escape_string($_POST["IdProduk"]);
		$Nama	   =$db->escape_string($_POST["Nama"]);
		$IdKategori=$db->escape_string($_POST["IdKategori"]);
		$Skala	   =$db->escape_string($_POST["Skala"]);
		$Stok	   =$db->escape_string($_POST["Stok"]);
		$HargaBeli =$db->escape_string($_POST["HargaBeli"]);
		$HargaJual =$db->escape_string($_POST["HargaJual"]);
		$Pemasok   =$db->escape_string($_POST["Pemasok"]);
		$Deskripsi =$db->escape_string($_POST["Deskripsi"]);
		// Susun query insert
		$sql="INSERT INTO produk(IdProduk,Nama,IdKategori,Skala,Pemasok,
							     Deskripsi,Stok,HargaBeli,HargaJual)
			  VALUES('$IdProduk','$Nama','$IdKategori','$Skala','$Pemasok',
								 '$Deskripsi','$Stok','$HargaBeli','$HargaJual')";
		// Eksekusi query insert
		$res=$db->query($sql);
		if($res){
			if($db->affected_rows>0){ // jika ada penambahan data
				?>
				Data berhasil disimpan.<br>
				<a href="produk.php"><button>View Produk</button></a>
				<?php
			}
		}
		else{
			?>
			Data gagal disimpan karena IdProduk mungkin sudah ada.<br>
			<a href="javascript:history.back()"><button>Kembali</button></a>
			<?php
		}
	}
	else
		echo "Gagal koneksi".(DEVELOPMENT?" : ".$db->connect_error:"")."<br>";
}
?>
</body>
</html>