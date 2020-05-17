

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
      <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@600&display=swap" rel="stylesheet"> 
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
    <br>
    <!-- tool component -->
    <section class="tool-container">
      <?php
      try
      {
        // PDO database connection
        $dbcon = new PDO('mysql:host=localhost;dbname=databaseop;charset=utf8', 'root', 'root');
      }
      catch(Exception $e)
      {
        // Database connection error management
              die('Erreur : '.$e->getMessage());
      }
      // PDO statement
      $result = $dbcon->query('SELECT * FROM tableop');
      while ($data = $result->fetch()) 
      {
      ?>
      <div class="tool">
        <div class="tool-title">
          <h2><?php echo $data['title']; ?></h2>
        </div>
        <div class="tool-info">
          <div class="tool-info-img">
            <img src="<?php echo $data['imgUrl']; ?>" alt="tool-img"/>
          </div>
          <div class="tool-info-src">
            <p><?php echo $data['url']; ?></p>
          </div>
          <div class="tool-info-date">
            <i class="fas fa-calendar-alt"></i><?php echo $data['postDate']; ?>
          </div>
        </div>
          <div class="tool-description">
            <p><?php echo $data['content']; ?></p>
          </div>
        <div class="tool-info2">
          <div class="tool-info2-numberdown">
            <?php echo $data['downvote']; ?>
          </div>
          <div class="tool-info2-downvote">
            <i class="far fa-thumbs-down"></i>
          </div>
          <div class="tool-info2-upvote">
            <i class="far fa-thumbs-up"></i>
          </div>
          <div class="tool-info2-numberup">
            <?php echo $data['upvote']; ?>
          </div>
          <div class="tool-info2-tag">
            <?php echo $data['tags']; ?>
          </div>
          <div class="tool-info2-visit">
            <button class="visit-button">read</button>
          </div>
        </div>
      </div>

      <?php
      }
      // end of PDO statement
      $result->closeCursor();
      ?>
    </section>
    <!-- articles component -->
    <section>
      <form action="article-todb.php">
        <input type="text" name="title">
        <input type="text" name="link">
        <input type="text" name="content">
        <input type="submit" value="send">
      </form>
    </section>

    <footer>
      <div class="footer-left">
      </div>
      <div class="footer-middle">
      </div>
      <div class="footer-right">
        <div class="social-linkedin">
          <a href="https://www.linkedin.com/in/nicolas-deno%C3%ABl-0609281a"><i class="fab fa-linkedin"></i></a>
        </div>
        <div class="social-github">
          <a href="https://github.com/eggopix"><i class="fab fa-github"></i></a>
        </div>
      </div>
    </footer>
  </body>
</html>
