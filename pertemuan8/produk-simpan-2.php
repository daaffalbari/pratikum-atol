<?php include_once("functions.php");?>
<!DOCTYPE html>
<html><head><title>Penyimpanan Data Produk</title></head>
<body>
<h1>Penyimpanan Data Produk</h1>
<?php
if(isset($_POST["TblSimpan"])){
	$db=dbConnect();
	if($db->connect_errno==0){
		// Susun query insert
		$sql="INSERT INTO produk(IdProduk,Nama,IdKategori,Skala,Pemasok,
							     Deskripsi,Stok,HargaBeli,HargaJual)
			  VALUES(?,?,?,?,?,?,?,?,?)";
		// Eksekusi query insert
		if($stmt=$db->prepare($sql)){ // Jika prepared sukses
			$stmt->bind_param("ssisssidd",$_POST["IdProduk"],$_POST["Nama"],
			                   $_POST["IdKategori"],$_POST["Skala"],
							   $_POST["Pemasok"],$_POST["Deskripsi"],
							   $_POST["Stok"],$_POST["HargaBeli"],
							   $_POST["HargaJual"]);
			if($stmt->execute()){
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
			echo "Query Error : ".(DEVELOPMENT?" : ".$db->error:"")."<br>";
	}
	else
		echo "Gagal koneksi".(DEVELOPMENT?" : ".$db->connect_error:"")."<br>";
}
?>
</body>
</html>