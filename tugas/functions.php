<?php

function dbConnect(){
  $db=new mysqli("localhost", "root", "pknstan2020", "apotek");
  return $db;
}

// Function Hapus Obat
function hapusObat($id){
  $db=dbConnect();
  $sql="DELETE FROM obat WHERE id='$id'";
  mysqli_query($db, $sql);
  return mysqli_affected_rows($db);
}

// Function hapus pasien
function hapusPasien($id){
  $db=dbConnect();
  $sql="DELETE FROM pasien WHERE id='$id'";
  mysqli_query($db, $sql);
  return mysqli_affected_rows($db);
}

// function hapus penjualan
function hapusPenjualan($id){
  $db=dbConnect();
  $sql="DELETE FROM penjualan WHERE id='$id'";
  mysqli_query($db, $sql);
  return mysqli_affected_rows($db);
}

function getDataObat($id){
  $db=dbConnect();
  if($db -> connect_errno == 0){
    $res=$db->query("SELECT * FROM obat WHERE id='$id'");
    if($res){
      if($res->num_rows > 0){
        $data=$res->fetch_assoc();
        $res->free_result();
        return $data;
      } else {
        return false;
      }
    } else {
      return false;
    }
  } else {
    return false;
  }
}

function getDataPasien($id){
  $db=dbConnect();
  if($db -> connect_errno == 0){
    $res=$db->query("SELECT * FROM pasien WHERE id='$id'");
    if($res){
      if($res->num_rows > 0){
        $data=$res->fetch_assoc();
        $res->free_result();
        return $data;
      } else {
        return false;
      }
    } else {
      return false;
    }
  } else {
    return false;
  }
}

function getListAdmin(){
  $db=dbConnect();
  if($db -> connect_errno == 0){
    $res=$db->query("SELECT * FROM admin");
    if($res){
      if($res->num_rows > 0){
        $data=$res->fetch_all(MYSQLI_ASSOC);
        $res->free_result();
        return $data;
      } else {
        return false;
      }
    } else {
      return false;
    }
  } else {
    return false;
  }
}

function getListPasien(){
  $db=dbConnect();
  if($db->connect_errno == 0){
    $res=$db->query("SELECT * FROM pasien ORDER BY nama ASC");
    if($res){
      $data=$res->fetch_all(MYSQLI_ASSOC);
      $res->free_result();
      return $data;
    } else {
      return false;
    }
  } else {
    return false;
  }
}

function getListObat(){
  $db=dbConnect();
  if($db->connect_errno == 0){
    $res=$db->query("SELECT * FROM obat ORDER BY nama ASC");
    if($res){
      $data=$res->fetch_all(MYSQLI_ASSOC);
      $res->free_result();
      return $data;
    } else {
      return false;
    }
  } else {
    return false;
  }
}

function getDataPenjualan($id){
  $db=dbConnect();
  if($db -> connect_errno == 0){
    $res=$db->query("SELECT j.id, p.nama as namaPasien, o.id as idObat, j.tanggal, j.qty, a.nama from penjualan j join pasien p on j.idPasien=p.id join obat o on j.idObat=o.id join admin a on j.idAdmin=a.id");
    if($res){
      if($res->num_rows > 0){
        $data=$res->fetch_assoc();
        $res->free_result();
        return $data;
      } else {
        return false;
      }
    } else {
      return false;
    }
  } else {
    return false;
  }
}

function signup($data){
  $db=dbConnect();

  $name=$data["name"];
  $email = strtolower(stripslashes($data["email"]));
  $password = mysqli_real_escape_string($db, $data["password"]);
  $password2 = mysqli_real_escape_string($db, $data["password2"]);

  // cek konfirmasi password
  if($password !== $password2 ){
    echo "
      <script>
        alert('Password tidak sesuai!');
        document.location.href = 'signup.php';
      </script>";
      return false;
  }

  //encrypt password
  // $password = password_hash($password, PASSWORD_DEFAULT);

  // cek Email sudah ada atau belum
  $result = $db->query("SELECT email FROM admin WHERE email='$email'");
  if(mysqli_fetch_assoc($result)){
    echo "
      <script>
        alert('Email sudah terdaftar!');
        document.location.href = 'signup.php';
      </script>";
      return false;
  }

  // insert ke database
  $db->query("INSERT INTO admin VALUES ('', '$name', '$email', '$password')");
  return mysqli_affected_rows($db);

}

// function navbar 
function navbar(){
  ?>
  <div>
    <ul class="nav justify-content-center py-2 bg-light">

      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="../dashboard.php">Dashboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="../obat/index.php">Data Obat</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../penjualan/index.php">Data Penjualan</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../pasien/index.php">Data Pasien</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../logout.php">Logout</a>
    </ul>
  </div>
  <?php
}


function cari($keyword){
  $db=dbConnect();
  $sql="SELECT * FROM penjualan WHERE id LIKE '%$keyword%'";
  $res=$db->query($sql);
  $data=$res->fetch_all(MYSQLI_ASSOC);
  $res->free_result();
  return $data;
}


function showError($error){
  echo "<div class='alert alert-danger'>$error</div>";
}


?>
