<?php include_once("functions.php");?>
<!DOCTYPE html>
<html><head><title>Pembaruan Data Produk</title></head>
<body>
<h1>Pembaruan Data Produk</h1>
<?php
if(isset($_POST["TblUpdate"])){
	$db=dbConnect();
	if($db->connect_errno==0){
		// Susun query update
		$sql="UPDATE produk SET 
			  Nama=?,IdKategori=?,Skala=?,Pemasok=?,Deskripsi=?,Stok=?,
			  HargaBeli=?,HargaJual=? WHERE IdProduk=?";
		// Eksekusi query update
		if($stmt=$db->prepare($sql)){
			$stmt->bind_param("sisssidds",$_POST["Nama"],
			$_POST["IdKategori"],$_POST["Skala"],$_POST["Pemasok"],
			$_POST["Deskripsi"],$_POST["Stok"],$_POST["HargaBeli"],
			$_POST["HargaJual"],$_POST["IdProduk"]);
			if($stmt->execute()){
				if($db->affected_rows>0){ // jika ada update data
					?>
					Data berhasil diupdate.<br>
					<a href="produk.php"><button>View Produk</button></a>
					<?php
				}
				else{ // Jika sql sukses tapi tidak ada data yang berubah
					?>
					Data berhasil diupdate tetapi tanpa ada perubahan data.<br>
					<a href="javascript:history.back()"><button>Edit Kembali</button></a>
					<a href="produk.php"><button>View Produk</button></a>
					<?php
				}
			}
			else{ // gagal query
				?>
				Data gagal diupdate.
				<a href="javascript:history.back()"><button>Edit Kembali</button></a>
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