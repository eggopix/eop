<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  Voici les derniers messages: 
  <?php 
  $servername = "localhost:8889";
  $dBUsername ="root";
  $dBPassword = "root";
  $dBName = "test";

  $dbcon = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

  /* check connection */
  if (!$dbcon) {
      printf("Connect failed: %s\n", mysqli_connect_error());
      exit();
  }

  $sql = "SELECT firstName, lastName, message FROM form";
  $result = mysqli_query($dbcon, $sql);

  if (mysqli_num_rows($result) > 0) {
  // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      echo "<br>Name: " . $row["firstName"]. " " . $row["lastName"]. "Message: " . $row["message"] . "<br>";
    }
  } else {
    echo "0 results";
  }

  mysqli_stmt_close($stmt);
  mysqli_close($dbcon);
  ?>

</body>
</html>