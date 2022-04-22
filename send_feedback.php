<?php
  include("include/config.php");

  $fName = $_POST["fName"];
  $lName = $_POST["lName"];
  $contactNo = $_POST["contactNo"];
  $email = $_POST["email"];
  $feedback = $_POST["feedback"];

  $query = "INSERT INTO feedbacks(firstName, lastName, contactNo, email, feedback) VALUES ('$fName','$lName','$contactNo','$email','$feedback')";

  $result = mysqli_query($conn, $query);

  if ($result) {
    $_SESSION['feedbackSuccess'] = "Your Feedback has been submitted";
    header("Location: contact_us.php");
  } else {
    $_SESSION['feedbackSuccess'] = "Your Feedback has failed to be submitted";
    header("Location: contact_us.php");
  }

?>


?>
