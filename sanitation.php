<?php
  $con = mysqli_connect("localhost", "my_user", "my_password", "my_db");
  if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  $yourName = mysqli_real_escape_string($con, $_POST['yourName']);
  $eMail = mysqli_real_escape_string($con, $_POST['eMail']);
  $nameOfItem = mysqli_real_escape_string($con, $_POST['nameOfItem']);
  $location = mysqli_real_escape_string($con, $_POST['location']);
  $dateFound = mysqli_real_escape_string($con, $_POST['dateFound']);
  $description = mysqli_real_escape_string($con, $_POST['description']);
?>
