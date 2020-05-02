
<?php

if (isset($_POST['login-submit'])) {
  require 'dbh.inc.php';

  $mailuid = $_POST['mailuid'];
  $password = $_POST['pwd'];

  if (empty($mailuid) || empty($password)) {
    header("Location: ../log-index.php?error=emptyfiles");
    exit();
  }
  else {
    $sql = "SELECT * FROM users WHERE uidUsers=? OR emailUsers=?;"; // allows to connect with username or email 
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) { // check if connection and query works fine
      header("Location: ../log-index.php?error=sqlerror");
      exit();
    }
    else {
      mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      if ($row = mysqli_fetch_assoc($result)) { // check if result have a return values from database and put them in an array
        $pwdCheck = password_verify($password, $row['pwdUsers']); // check if password enter by user match with hashed password in database
        if ($pwdCheck == false) {
          header("Location: ../log-index.php?error=wrongpwd");
          exit();
        }
        elseif ($pwdCheck == true) {
          // login information correct, can log into the site
          // start a session
          session_start();
          // set user variable for the session
          $_SESSION[userId] = $row [idUsers]; 
          $_SESSION[userUid] = $row [uidUsers]; 
          $_SESSION[userEmail] = $row [emailUsers]; 

          header("Location: ../log-index.php?login=success");
          exit();
        }
        else {
          header("Location: ../log-index.php?error=wrongpwd");
          exit();
        }
      }
      else {
        header("Location: ../log-index.php?error=nouser");
        exit();
      }
    }
  }
}
else {
  header("Location: ../log-index.php");
  exit();
}