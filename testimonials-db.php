<?php 
$servername = "localhost:8889";
$dBUsername ="root";
$dBPassword = "root";
$dBName = "test";

$dbcon = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

$firstName = $_POST["firstName"];
$lastName = $_POST["lastName"];
$message = $_POST["message"];

/* check connection */
if (!$dbcon) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$stmt = mysqli_prepare($dbcon, "INSERT INTO form (firstName, lastName, message) VALUES (?, ?, ?)" );
mysqli_stmt_bind_param($stmt, 'sss', $firstName, $lastName, $message ); 

mysqli_stmt_execute($stmt);

header("Location: ../form.html");
mysqli_stmt_close($stmt);
mysqli_close($dbcon);
?>
