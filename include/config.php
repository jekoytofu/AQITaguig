<?php
$conn = mysqli_connect('localhost','root','','mediclock_db');

if(mysqli_connect_error()) {
    echo 'Failed to connect to database'.mysqli_connect_error();
}
?>
