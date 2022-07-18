<?php
  session_start();
  if(!isset($_SESSION["email"])){
    header("Location: index.php?error=4");
  }
  include_once('../functions.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Hapus Penjualan</title>
</head>
<body>
  <?php navbar(); ?>
  <h1>Hapus Data Penjualan</h1>
  <?php
  $id=$_GET["id"];
  if(hapusPenjualan($id) > 0){
    echo "
    <script>
      alert('Data berhasil dihapus');
      document.location.href = 'index.php';
    </script>
    ";
  } else {
    echo "
    <script>
      alert('Data gagal dihapus');
      document.location.href = 'index.php';
    </script>
    ";
  }
  ?>
</body>
</html>