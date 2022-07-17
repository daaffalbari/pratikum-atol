<?php

  include_once('functions.php');
  $db=dbConnect();
  if(isset($_POST['signup'])){

    if(signup($_POST)>0){
      echo "
        <script>
          alert('User baru berhasil ditambahkan!');
          document.location.href = 'index.php';
        </script>
      ";
    } else {
      echo mysqli_error($db);
    }
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Signup</title>
  <style>
    @import url(https://fonts.googleapis.com/css?family=Roboto:300);

    .signup-page {
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
</head>
<body>
  <div class="signup-page">
    <div class="form">
      <form class="register-form" method="POST" action="">
        <input type="text" name="name" placeholder="name"/>
        <input type="email" name="email" placeholder="email address"/>
        <input type="password" name="password" placeholder="password"/>
        <input type="password" name="password2" placeholder="Konfirmasi Password">
        <button type="submit" name="signup">Create</button>
        <p class="message">Already registered? <a href="index.php">Sign In</a></p>
      </form>
    </div>
  </div>
</body>
</html>