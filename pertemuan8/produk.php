<?php include_once("functions.php");?>
  <!DOCTYPE html>
  <html><head><title>View Data Produk</title></head>
  <body>
  <h1>Data Produk</h1>
  <?php
  $db=dbConnect();
  if($db->connect_errno==0){
    $sql="SELECT p.IdProduk,p.Nama,k.Nama NamaKategori,p.Skala,p.Stok,
        p.HargaBeli,p.HargaJual,p.Pemasok
  FROM produk p JOIN kategori k ON p.IdKategori=k.IdKategori";
    $res=$db->query($sql);
    if($res){
      ?>
      <a href="produk-tambah.php"><button>Tambah</button></a>
      <table border="1">
      <tr><th>Id Produk</th><th>Nama</th><th>Kategori</th>
          <th>Skala</th><th>Stok</th><th>Harga Beli</th>
        <th>Harga Jual</th><th>Pemasok</th><th>Aksi</th>
        </tr>
      <?php
      $data=$res->fetch_all(MYSQLI_ASSOC); // ambil seluruh baris data
      foreach($data as $barisdata){ // telusuri satu per satu
        ?>
        <tr>
        <td><?php echo $barisdata["IdProduk"];?></td>
        <td><?php echo $barisdata["Nama"];?></td>
        <td><?php echo $barisdata["NamaKategori"];?></td>
        <td><?php echo $barisdata["Skala"];?></td>
        <td><?php echo $barisdata["Stok"];?></td>
        <td><?php echo $barisdata["HargaBeli"];?></td>
        <td><?php echo $barisdata["HargaJual"];?></td>
        <td><?php echo $barisdata["Pemasok"];?></td>
        <td>
        <a href="produk-ubah.php?IdProduk=<?php echo $barisdata["IdProduk"];?>">Ubah</a> |
        <a href="produk-hapus.php?IdProduk=<?php echo $barisdata["IdProduk"];?>">Hapus</a>
        </tr>
        <?php
      }
      ?>
      </table>
      <?php
      $res->free();
    }else
      echo "Gagal Eksekusi SQL".(DEVELOPMENT?" : ".$db->error:"")."<br>";
  }
  else
    echo "Gagal koneksi".(DEVELOPMENT?" : ".$db->connect_error:"")."<br>";
?>
</body>
</html>