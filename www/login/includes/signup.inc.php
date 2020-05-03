<?php

if (isset($_POST['signup-submit'])) { // first check we access script via signup form button
  // get access to $conn variable 
  require 'dbh.inc.php';

  // get and set variables from form-signup
  $username = $_POST['uid'];
  $email = $_POST['mail'];
  $password = $_POST['pwd'];
  $passwordRepeat = $_POST['pwd-repeat'];

  // manage form errors and customize error return for each case
  // no completed fields error
  if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
    header("Location: ../signup.php?error=emptyfields&uid=".$username."&mail".$email); // send user back to signup page with values of uid/mail filled if enters before
    exit(); // stop running of following code in script
  }
  // cheack email and username syntax error
  elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) { 
    header("Location: ../signup.php?error=invalidmailuid");
    exit();
  }
  // check email syntax error 
  elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../signup.php?error=invalidmail&uid=".$username);
    exit();
  }
  // check username characters error
  elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
    header("Location: ../signup.php?error=invaliduid&mail=".$email);
    exit();
  }
  // check passwords match error
  elseif ($password !== $passwordRepeat) {
    header("Location: ../signup.php?error=passwordcheck&uid".$username."&mail=".$email);
    exit();
  } 
  // check username already exist in database
  else {
    $sql = "SELECT uidUsers FROM users WHERE uidUsers=?"; // sql query where =? avoid sql injections, ALWAYS use sql injection avoiding
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../signup.php?error=sqlerror");
      exit();
    } 
    else {
      mysqli_stmt_bind_param($stmt, "s", $username); // compare a string "s" (i= integers b=boolean) within the database's data, you need one "s" for each parameters to check (see below)
      mysqli_stmt_execute($stmt); // run the information of user in database
      mysqli_stmt_store_result($stmt); //  check if we have a match or not within user info and database info
      $resultCheck = mysqli_stmt_num_rows($stmt); // display numbers of rows that match with user info
      if ($resultCheck > 0) { 
        header("Location: ../signup.php?error=usertaken&mail".$email);
        exit();
      }
      else {
        $sql = "INSERT INTO users (uidusers, emailUsers, pwdUsers) VALUES (?, ?, ?)"; // "?" are placeholders, again to avoid sql injections
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          header("Location: ../signup.php?error=sqlerror");
          exit();
        }
        else {
          //hash password
          $hashedPwd = password_hash($password, PASSWORD_DEFAULT); // hash with BCRYPT, ensure that database slot can have more than 255 character in it to store hashed password
          //send user information to database
          mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd); // one "s" for each parameters following
          mysqli_stmt_execute($stmt); 
          header("Location: ../signup.php?signup=success");
          exit();
        }
      }
    } 
  }
  // close queries and connection to database, good syntax is to close at the same hierarchy level than the opnening
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}
// redirecting user that try to go on this page by another way than submit form button
else {
  header("Location: ../signup.php");
  exit();
}
