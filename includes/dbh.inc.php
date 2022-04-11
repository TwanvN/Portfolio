<?php
  $dbServerName = "localhost";
  $dbUsername = "root";
  $dbPassword = "";
  $dbName = "portfolio";

  $conn = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName);

  if (!$conn) {
    die('Connect Error: '.mysqli_connect_error());
  }
?>
