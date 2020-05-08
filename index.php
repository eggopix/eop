<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>EOP - Self-study</title>
      <link rel="icon" href="images/favicon.ico">
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <link rel="stylesheet" type="text/css" href="css/menu.css">
      <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
      <script src="https://kit.fontawesome.com/16f591d449.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <header>
      <div class="ham-menu">
        <div class="menu-wrap">
          <input type="checkbox" class="toggler">
          <div class="hamburger"><div></div></div>
          <div class="menu">
            <div>
              <div>
                  <ul>
                    <li><a href="index.php"><i class="fas fa-igloo"></i>&nbsp;&nbsp;HOME</a></li>
                    <li><a href="html.php"><i class="fab fa-html5"></i>&nbsp;&nbsp;HTML</a></li>
                    <li><a href="css.php"><i class="fab fa-css3-alt"></i>&nbsp;&nbsp;CSS</a></li>
                    <li><a href="php.php"><i class="fab fa-php"></i>&nbsp;&nbsp;PHP</a></li>
                    <li><a href="sql.php"><i class="fas fa-database"></i>&nbsp;&nbsp;SQL</a></li>
                    <li><a href="misc.php"><i class="fas fa-book"></i>&nbsp;&nbsp;OTHERS</a></li>
                    <li><a href="pidxdeo.php"><i class="fas fa-photo-video"></i>&nbsp;&nbsp;PIxDEO</a></li>
                    <li><a href="contact.php"><i class="fas fa-at"></i>&nbsp;&nbsp;CONTACT</a></li>
                  </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="logo">
        <div class="logo-image">
          <a href="index.php"><img src="images/logo.jpg" alt="logo"></a>
        </div>
      </div>
      <div class="login">
        <div>
          <p><i class="fas fa-user"></i></p>
        </div>
      </div>
      <nav>
        <ul>
          <li class="html"><a href="html.php"><i class="fab fa-html5"></i></a></li></div>
          <li class="css"><a href="css.php"><i class="fab fa-css3-alt"></i></a></li>
          <li class="php"><a href="php.php"><i class="fab fa-php"></i></a></li>
          <li class="sql"><a href="sql.php"><i class="fas fa-database"></i></a></li>
          <li class="misc"><a href="misc.php"><i class="fas fa-book"></i></a></li>
          <li class="pixdeo"><a href="pixdeo.php"><i class="fas fa-photo-video"></i></a></li>
          <li class="contact"><a href="contact.php"><i class="fas fa-at"></i></a></li>
        </ul>
      </nav>
    </header>
    <section>
      <div class="testimonial-container">
        <div class="testimonial-form">
          <form action="testimonial-todb.php" method="post">
              <div class= testi-firstname>
                <label for="firstName">First name</label>
              </div>
              <div>
                <input type="text" name="firstName" placeholder="First name" required/>
              </div>
            </div>
            <div class=testi-lastname>
              <div>
                <label for="lastName">Last name</label>
              </div>
              <div>
                <input type="text" name="lastName" placeholder="Last name" required/>
              </div>
            </div>
            <div class="testi-message">
              <div>
                <label for="message">Your message&nbsp;:&nbsp;</label>
              </div>
              <div>
                <textarea type="text" name="message" placeholder="Share with us your experience ;)" required></textarea>
              </div>
            </div>
            <div>
              <button class="testimonial-submit" type="submit" name="formSubmit">submit</button>
            </div>
          </form>
        </div>
      </div>
    </section>
    <section class="testimonial-read">
      <h2>Testimonials</h2> 
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
      /* query and statement */
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
    </section>
  </body>
</html>
