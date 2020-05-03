<?php 
  // database connection info
  $servername = "localhost:8889";
  $dBUsername ="root";
  $dBPassword = "root";
  $dBName = "loginsystemtut";

  // database connection
  $conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

  // database connection failed check
  if (!$conn) {
    die("Connection failed :" .mysqli_connect_error());
  }