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
  <title>Edit Data obat</title>
</head>
<body>
  <h1>Edit Data Obat</h1>
  <?php
  if(isset($_GET["id"])){
    $db=dbConnect();
    $id=$db->escape_string($_GET["id"]);
    if($dataObat = getDataObat($id)){
      ?>
      <a href="index.php"><button class="btn btn-primary">View Obat</button></a>
      <div class="container">
        <div class="mt-3 px-3" >
          <form action="edit-obat.php" method="post">
            <input type="hidden" name="id" value="<?php echo $dataObat["id"];?>">
            <div class="col-md-4 mt-2">
              <label for="nama" class="form-label">Nama Obat</label>
              <input type="text" name="nama" class="form-control border-success" value="<?php echo $dataObat["nama"];?>">
            </div>
            <div class="col-md-4 mt-2">
              <label for="stok" class="form-label">Stok</label>
              <input type="text" class="form-control border-success" name="stok" value="<?php echo $dataObat["stok"];?>">
            </div>
            <div class="col-md-4 mt-2">
              <label for="harga" class="form-label">Harga</label>
              <input type="text" name="harga" class="form-control border-success" value="<?php echo $dataObat["harga"];?>">
            </div>
            <div class="pt-2 mt-2">
              <button class="btn btn-warning" name="edit">Edit</button>
            </div>
          </form>
        </div>
      </div>
      <?php
    }
  }
  ?>
</body>
</html>