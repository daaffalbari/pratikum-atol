<?php
session_start();
if(!isset($_SESSION["email"])){
  header("Location: index.php?error=4");
}
include_once('functions.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Dashboard</title>
</head>
<body>
<div class="container my-5">
	<h4>Selamat Datang!</h4>
  <div>
    <a href="./logout.php"><button class="btn btn-danger">Logout</button></a>
  </div>
  <div class="row row-cols-1 row-cols-md-3 g-4 mt-3">
  <div class="col">
    <div class="card h-100">
      <div class="card-body">
        <h5 class="card-title">Data Obat</h5>
        <a href="./obat/index.php" class="btn btn-primary">Lihat</a>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
      <div class="card-body">
        <h5 class="card-title">Data Penjualan</h5>
        <a href="./penjualan/index.php" class="btn btn-primary">Lihat</a>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
      <div class="card-body">
        <h5 class="card-title">Data Pasien</h5>
        <a href="./pasien/index.php" class="btn btn-primary">Lihat</a>
      </div>
    </div>
  </div>
  </div>
</div>
</div>
</body>
</html>