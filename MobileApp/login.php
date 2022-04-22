<?php
$connection = mysqli_connect("localhost","root","","mediclock_db");
$username=$_POST['username'];
$password=$_POST['password'];
$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$result=mysqli_query($connection,$sql);
if($result->num_rows >0){
    echo "Login Success";
}
else{
    echo "User not found";
}

?>
