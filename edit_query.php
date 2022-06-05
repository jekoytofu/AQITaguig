<?php
require_once("include/config.php");

	if(ISSET($_POST['edit_account'])){
		$id = $_POST['userId'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$firstName = $_POST['firstName'];
		$middleInitial = $_POST['middleInitial'];
		$lastName = $_POST['lName'];
		$age = $_POST["age"];
		$gender = $_POST["gender"];
		$civilStatus = $_POST["civilStatus"];
		$email = $_POST["email"];
		$contactNo = $_POST["contactNo"];
		$address = $_POST["address"];
		$sectionID = $_POST["sectionID"];

		$conn = new mysqli("localhost", "root", "", "aqi_db") or die(mysqli_error());
		$conn->query("UPDATE `users` SET `username` = '$username', `password` = '$password', `firstName` = '$firstName', `middleInitial` = '$middleInitial', `lastName` = '$lastName',
			`age` = '$age', `gender` = '$gender', `civilStatus` = '$civilStatus', `email` = '$email', `contactNo` = '$contactNo', `address` = 'address', `sectionID` = '$sectionID'
			WHERE `id` = $id") or die(mysqli_error($conn));
			$_SESSION['message'] = "Account Updated";
		header("location: accounts.php");
	}
?>
