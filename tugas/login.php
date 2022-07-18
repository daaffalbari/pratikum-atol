<?php
session_start();
include_once('functions.php');
?>
<?php
$db=dbConnect();
if($db->connect_errno == 0){
  if(isset($_POST['login'])){
    $email = $db->escape_string($_POST['email']);
    $password = $db->escape_string($_POST['password']);
    $sql = "SELECT * FROM admin WHERE email='$email' AND password='$password'";
    $res = $db->query($sql);
    if($res){
      if($res->num_rows == 1){
        $data = $res->fetch_assoc();
        $_SESSION['email'] = $data['email'];
        $_SESSION["nama"] = $data["nama"];
        header("Location: dashboard.php");
      } else 
        header("Location: index.php?error=1");
    }
  } else 
    header("Location: index.php?error=2");
} else 
  header("Location: index.php?error=3");
?>