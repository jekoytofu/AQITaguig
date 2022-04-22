<?php
  session_start();
  require_once("include/config.php");

  $username = $_POST["username"];
  $password = $_POST["password"];

  $checkUsername = "SELECT COUNT(id) as cnt FROM users WHERE username = '".$username."'";
  $result = mysqli_query($conn, $checkUsername);
  $usernameCount = mysqli_fetch_object($result);
  if($usernameCount->cnt == 1){
      $getUser = "SELECT * FROM users WHERE username = '".$username."'";
      $fetchUser = mysqli_query($conn, $getUser);
      $user = mysqli_fetch_object($fetchUser);
      $pword = hash('md5', $password);
      if($user->password == $pword){
        $_SESSION['username'] = $user->username;
        $_SESSION['role'] = $user->role;
        if($_SESSION['role'] == 'admin') {
          header("Location: admin/welcome.php");
        } else {
          header("Location: index.php");
        }
      } else {
        $_SESSION['login-error'] = "Incorrect Password.";
        header("Location: login.php");
      }
  }else {
      $_SESSION['login-error'] = "Username doesn't exist.";
      header("Location: login.php");
  }



?>
