<?php 
// database connection info
$servername = "localhost";
$dBUsername ="root";
$dBPassword = "root";
$dBName = "databaseop";

// database connection
$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

// database connection failed check
if (!$conn) {
  die("Connection failed :" .mysqli_connect_error());
}

?>