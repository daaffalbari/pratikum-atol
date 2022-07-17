<?php
include_once('../functions.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Data Penjualan</title>
</head>
<body>
  <h1>Pembaruan Data Penjualan</h1>
  <?php
  if(isset($_POST["edit"])){
    $db=dbConnect();
    if($db->connect_errno == 0){
      $id=$db->escape_string(htmlspecialchars($_POST["id"]));
      $idObat=$db->escape_string(htmlspecialchars($_POST["idObat"]));
      $idPasien=$db->escape_string(htmlspecialchars($_POST["idPasien"]));
      $tanggal=$db->escape_string(htmlspecialchars($_POST["tanggal"]));
      $idAdmin=$db->escape_string(htmlspecialchars($_POST["idAdmin"]));
      $sql = "UPDATE penjualan SET idObat='$idObat', idPasien='$idPasien', tanggal='$tanggal', idAdmin='$idAdmin' WHERE id='$id'";
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
          document.location.href="index.php";
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