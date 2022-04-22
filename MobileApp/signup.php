<?php
require "DataBase.php";
$db = new DataBase();
if (isset($_POST['firstName']) && isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password'])) {
    if ($db->dbConnect()) {
        if ($db->signUp("users", $_POST['firstName'], $_POST['email'], $_POST['username'], $_POST['password'],
                        $_POST['middleInitial'],
                       $_POST['lastName'],
                       $_POST['sectionID'],
                       $_POST['contactNo'],
                       $_POST['address'], $_POST['age'], $_POST['gender'], $_POST['civilStatus'])) {
            echo "Sign Up Success";
        } else echo "Sign up Failed";
    } else echo "Error: Database connection";
} else echo "All fields are required";
?>
