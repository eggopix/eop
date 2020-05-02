<?php
  session_start(); // every page of the webwsite must have a session open to access login system
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/16f591d449.js" crossorigin="anonymous"></script> 
  <title>LOGIN SYSTEM</title>
</head>
<body>
  <header>
    <nav>
      <p><a href="#"><i class="fas fa-user"></i></a></p>
      <ul>
        <li>Home</li>
        <li>About</li>
        <li>Contact</li>
      </ul>
      <div class="header-login">
        <?php 
          if (isset($_SESSION[userId])) {
            ?>
            <form class="" action="../login/includes/logout.inc.php" method="post">
              <button type="submit" name="logout-submit">LOGOUT</button>
            </form>
            <?php
          }
          else {
            ?>
            <form class="" action="../login/includes/login.inc.php" method="post">
              <input type="text" name="mailuid" placeholder="Username or Email">
              <input type="password" name="pwd" placeholder="Password">
              <button type="submit" name="login-submit">LOGIN</button>
            </form>
            <a href="signup.php">Signup</a>
            <?php
          }
        ?> 
      </div>
    </nav>
  </header>
