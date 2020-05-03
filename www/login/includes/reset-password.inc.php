<?php

// check if user have click reset button to reach this page
if (isset($_POST["reset-password-submit"])) {
  // get varible from reset form
  $selector = $_POST["selector"];
  $validator = $_POST["validator"];
  $password = $_POST["pwd"];
  $passwordRepeat = $_POST["pwd-repeat"];
  if (empty($password) || empty($passwordRepeat)) {
    header("Location: ../log-index.php?newpwd=empty");
    exit();
  } elseif ($password != $password-repeat) {
    header("Location: ../log-index.php?newpwd=pwdnotsame");
    exit();
  }   
  // check token validity
  $currentDate = date ("U");
  require 'dbh.inc.php';
  $sql = "SELECT * FROM pwdReset WHERE pwdResetSelector=? AND pwdResetExpires >= ?";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "Error stmt-sql";
    exit();
  } 
  else {
    mysqli_stmt_bind_param($stmt, "s", $selector); 
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (!$row = mysqli_fetch_assoc($result)) {
      echo "You need to submit your reset request again - Error 01";
      exit();
    } else {
      // match the tokens 
      $tokenBin = hex2bin($validator);
      $tokenCheck = password_verify($tokenBin, $row["pwdResetToken"]);
      if ($tokenCheck == false) {
        echo "You need to submit your reset request again - Error 02";
        exit();
      } elseif ($tokenCheck == true) {
        // validate new password information
        $tokenEmail = $row["pwdResetEmail"];
        $sql = "SELECT * FROM users WHERE emailUsers=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          echo "Error stmt-sql";
          exit();
        } else {
          mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
          mysqli_stmt_execute($stmt);
          $result =  mysqli_stmt_get_result($stmt);
          if (!$row = mysqli_fetch_assoc($result)) {
            echo "You need to submit your reset request again - Error 03 ";
            exit();
          } else {
            $sql = "UPDATE users SET pwdUsers=? WHERE emailUsers=?";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
              echo "Error stmt-sql";
              exit();
            } else {
              // hash and upadate password in db
              $newPwdHash = password_hash($password, PASSWORD_DEFAULT);
              mysqli_stmt_bind_param($stmt, "ss", $newPwdHash, $tokenEmail); 
              mysqli_stmt_execute($stmt);
              // delete token in db 
              $sql = "DELETE FROM pwdReset WHERE PwdResetEmail=?";
              $stmt = mysqli_stmt_init($conn);
              if (!mysqli_stmt_prepare($stmt, $sql)) {
                echo "Error stmt-sql";
                exit();
              } else {
                mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                mysqli_stmt_execute($stmt);
                header ("Location: ../signup.php?newpwd=passwordupdated");
              }
            } 
          }
        }
      }
    }
  }
}
else {
  header("Location: ../log-index.php");
  exit();
}
