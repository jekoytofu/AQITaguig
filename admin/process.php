<?php

$mysqli = new mysqli("localhost", "root", "", "mediclock_db") or die(mysqli_error($mysqli));

if(isset($_GET['delete'])){
  $id = $_GET['delete'];
  $mysqli->query("DELETE FROM users WHERE id=$id") or die($mysqli->error());
}
header("location:accounts.php");
 ?>
