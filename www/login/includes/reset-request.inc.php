<?php

if (isset($_POST["reset-request-submit"])) {
  // create two tokens
  $selecter = bin2hex(random_bytes(8));
  $token = random_bytes(32);
  
  // url for the link in email password reset
  $url = "../create-new-password.php?selector=". $selector . "&validator=" .bin2hex($token);

  // set expiration time for tokens 
  $expires = date("U") + 1800; // U means today's date in seconds since 1970, so here last one hour

  require 'dbh.inc.php';

  $userEmail = $_POST["email"];

  // check if a token still exist
  $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "Error stmt-sql";
    exit();
  } 
  else {
    mysqli_stmt_bind_param($stmt, "s", $userEmail); // this will attribute value to ? that we have on our sql query 
    mysqli_stmt_execute($stmt);
  }

  $sql = "INSERT INTO pwdReset(pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExprires) VALUES (?, ?, ?, ?);";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "Error stmt-sql";
    exit();
  } 
  else {
    $hashedToken = password_hash($token, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires); // this will attribute values to ? that we have on our sql query 
    mysqli_stmt_execute($stmt);
  }

  mysqli_stmt_close($stmt);
  mysqli_close($conn);

  // sending the email
  // 1. set variables and content 
  $to = $userEmail;
  $subject = 'Reset your password on eggehead';
  $message = '<p>We received a password reset request for your account. If this action came from you please click on the following link, else no action is needed</p>';
  $message .= '<p>Here\'s your password link :<br/>'; // .= means that we continue the previous varibale
  $message .= '<a href="' . $url . '">' . $url . '</a></p>'; 
  $headers = "From: name <email@website.com>\r\n";
  $headers .= "Reply-To: email@website.com\r\n";
  $headers .= "Content-type: text/html\r\n";

  // 2. use mail function
  mail($to, $subject, $message, $headers);

  // 3. send user to success page (a password has been sent by mail)
  header("Location: ../reset-password.php?reset=success");

}
else {
  header("Location: ../log-index.php");
  exit();
}