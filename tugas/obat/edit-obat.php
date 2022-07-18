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
  <title>Edit Data Obat</title>
</head>
<body>
  <h1>Pembaruan Data</h1>
  <?php
  if(isset($_POST["edit"])){
    $db=dbConnect();
    if($db->connect_errno == 0){
      $id=$db->escape_string($_POST["id"]);
      $nama=$db->escape_string(htmlspecialchars($_POST["nama"]));
      $stok=$db->escape_string(htmlspecialchars($_POST["stok"]));
      $harga=$db->escape_string(htmlspecialchars($_POST["harga"]));
      $sql="UPDATE obat SET nama='$nama', stok='$stok', harga='$harga' WHERE id='$id'";
      $res=$db->query($sql);
      if($res){
        if($db->affected_rows > 0){
          ?>
          <script type="text/javascript">
            alert("Data berhasil diubah");
            document.location.href="index.php";
          </script>
          <?php
      }else{
        ?>
        <script type="text/javascript">
          alert("Data tidak berhasil diubah");
          alert("<?php echo $db->error; ?>");
        </script>
        <?php
      }
    } else{
      echo "Error: ".$db->error;
    }
  } else {
    echo "Error: ".$db->connect_error;
  }
}
?>
</body>
</html>