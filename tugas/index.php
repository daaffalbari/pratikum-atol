<?php
  // session_start();
  // if(isset($_SESSION['login'])){
  //   header("Location: index.php");
  //   exit;
  // }
  include_once("functions.php");
  $db=dbConnect();

  if(isset($_POST['login'])){
    $email=$_POST['email'];
    $password=$_POST['password'];

    $res=mysqli_query($db, "SELECT * FROM admin WHERE email='$email'");

    // cek email
    if(mysqli_num_rows($res) == 1){

      // cek password
      $row = mysqli_fetch_assoc($res);
      if(password_verify($password, $row['password'])){
        // Set Session 
        $_SESSION["login"] = true;
        header("Location: dashboard.php");
        exit;
      }
    }

    $error="<div class='alert alert-danger'>
              <strong>Maaf!</strong> Email atau Password salah.
            </div>";
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <style type="text/css">
    @import url(https://fonts.googleapis.com/css?family=Roboto:300);

    .login-page {
      width: 360px;
      padding: 8% 0 0;
      margin: auto;
    }
    .form {
      position: relative;
      z-index: 1;
      background: #ffffff;
      max-width: 360px;
      margin: 0 auto 100px;
      padding: 45px;
      text-align: center;
      box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
    }
    .form input {
      font-family: 'Roboto', sans-serif;
      outline: 0;
      background: #f2f2f2;
      width: 100%;
      border: 0;
      margin: 0 0 15px;
      padding: 15px;
      box-sizing: border-box;
      font-size: 14px;
    }
    .form button {
      font-family: 'Roboto', sans-serif;
      text-transform: uppercase;
      outline: 0;
      background: #4caf50;
      width: 100%;
      border: 0;
      padding: 15px;
      color: #ffffff;
      font-size: 14px;
      -webkit-transition: all 0.3 ease;
      transition: all 0.3 ease;
      cursor: pointer;
    }
    .form button:hover,
    .form button:active,
    .form button:focus {
      background: #43a047;
    }
    .form .message {
      margin: 15px 0 0;
      color: #b3b3b3;
      font-size: 12px;
    }
    .form .message a {
      color: #4caf50;
      text-decoration: none;
    }

    body {
      background: rgb(141, 194, 111);
      background: linear-gradient(90deg, rgba(141, 194, 111, 1) 0%, rgba(118, 184, 82, 1) 50%);
      font-family: 'Roboto', sans-serif;
    }

  </style>
  <title>Login</title>
</head>
<body>
<div class="login-page">
  <div class="form">
    <form class="login-form" action="dashboard.php">
      <input type="text" name="email" placeholder="Email/Username" />
      <input type="password" name="password" placeholder="Password"/>
      <button type="submit" name="login">login</button>
      <p class="message">Not registered? <a href="signup.php">Create an account</a></p>
    </form>
  </div>
</div>
</body>
</html>