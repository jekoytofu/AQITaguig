<?php
	$conn = new mysqli("localhost", "root", "", "mediclock_db") or die(mysqli_error());
	$id = $_GET['delete'];
	$conn->query("DELETE FROM `users` WHERE `id` = '$_GET[id]' && `lastName` = '$_GET[lastName]'") or die(mysqli_error());
	header("location:accounts.php");
