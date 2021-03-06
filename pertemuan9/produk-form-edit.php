<?php include_once("functions.php");?>
<!DOCTYPE html>
<html><head><title>Edit Data Produk</title></head>
<body>
<?php banner();?>
<?php navigator();?>
<h1>Edit Data Produk</h1>
<?php
if(isset($_GET["IdProduk"])){
	$db=dbConnect();
	$IdProduk=$db->escape_string($_GET["IdProduk"]);
	if($dataproduk=getDataProduk($IdProduk)){// cari data produk, kalau ada simpan di $data
		?>
<a href="produk.php"><button>View Produk</button></a>
<form method="post" name="frm" action="produk-update.php">
<table border="1">
<tr><td>Id Produk</td>
    <td><input type="text" name="IdProduk" size="16" maxlength="15"
	     value="<?php echo $dataproduk["IdProduk"];?>" readonly></td></tr>
<tr><td>Nama</td>
    <td><input type="text" name="Nama" size="71" maxlength="70"
		 value="<?php echo $dataproduk["Nama"];?>"></td></tr>
<tr><td>Kategori</td>
    <td><select name="IdKategori">
		<option>Pilih Kategori</option>
		<?php
			$datakategori=getListKategori();
			foreach($datakategori as $data){
				echo "<option value=\"".$data["IdKategori"]."\"";
				if($data["IdKategori"]==$dataproduk["IdKategori"])
					echo " selected"; // default sesuai kategori sebelumnya
				echo ">".$data["Nama"]."</option>";
			}
		?>
		</select>
	</td></tr>
<tr><td>Skala</td>
	<td><input type="text" name="Skala" size="11" maxlength="10"
		 value="<?php echo $dataproduk["Skala"];?>"></td></tr>
<tr><td>Stok</td>
	<td><input type="text" name="Stok" size="7" maxlength="6"
		 value="<?php echo $dataproduk["Stok"];?>"></td></tr>
<tr><td>Harga Beli</td>
	<td><input type="text" name="HargaBeli" size="9" maxlength="8"
		 value="<?php echo $dataproduk["HargaBeli"];?>"></td></tr>
<tr><td>Harga Jual</td>
	<td><input type="text" name="HargaJual" size="9" maxlength="8"
		 value="<?php echo $dataproduk["HargaJual"];?>"></td></tr>
<tr><td>Pemasok</td>
	<td><input type="text" name="Pemasok" size="51" maxlength="50"
		 value="<?php echo $dataproduk["Pemasok"];?>"></td></tr>
<tr><td>Deskripsi</td>
	<td><textarea name="Deskripsi" cols="80" rows="8"><?php echo $dataproduk["Deskripsi"];?></textarea></td></tr>
<tr><td>&nbsp;</td>
	<td><input type="submit" name="TblUpdate" value="Update">
	    <input type="reset"></td></tr>
</table>
</form>
		<?php
	}
	else
		echo "Produk dengan Id : $IdProduk tidak ada. Pengeditan dibatalkan";
?>
<?php
}
else
	echo "IdProduk tidak ada. Pengeditan dibatalkan.";
?>
</body>
</html>