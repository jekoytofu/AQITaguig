<?php
  session_start();
  require_once("include/config.php");

  $fname = $_POST["fName"];
  $middleInitial = $_POST["middleInitial"];
  $lname = $_POST["lName"];
  $age = $_POST["age"];
  $gender = $_POST["gender"];
  $civilStatus = $_POST["civilStatus"];
  $email = $_POST["email"];
  $contactNo = $_POST["contactNo"];
  $address = $_POST["address"];
  $sectionID = $_POST["sectionID"];
  $username = $_POST["username"];
  $password = hash('md5', $_POST['password']);

  $checkUsername = "SELECT COUNT(id) as cnt FROM users WHERE username = '".$username."'";
  $result = mysqli_query($conn, $checkUsername);
  $usernameCount = mysqli_fetch_object($result);
  if($usernameCount->cnt == 0){
    $insertUser = "INSERT INTO users (username, email, password, firstName, middleInitial, lastName, role, sectionID, contactNo, address, age, gender, civilStatus) VALUES ('$username', '$email', '$password', '$fname', '$middleInitial', '$lname', 'user', '$sectionID', '$contactNo', '$address', '$age', '$gender', '$civilStatus')";
    $result = mysqli_query($conn, $insertUser);
    $_SESSION['sign-up-error'] = "Successfully created an account";
    $_SESSION['username'] = $user->username;
    $_SESSION['role'] = 'user';
  } else {
    $_SESSION['sign-up-error'] = "Username already Exists";
  }
  header("Location: index.php");

?>
