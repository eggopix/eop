
<?php
  require 'log-header.php';
?>

  <main>
    <div class="wrapper-main">
      <section class="section-default">
        <h1>Reset your password</h1>
        <p>An email will be sent to you for reset</p>
        <form action="includes/reset-request.inc.php" method="post">
          <input type="text" name="email" placeholder="enter your email adress">
          <button type="submit" name="reset-request-submit">Ask reset</button>
        </form>
        <?php
        if (isset($_GET["reset"])) {
          if ($_GET["reset"] == "success") {
            echo '<p class="reset-success">Please check your email</p>';
          }
        }
        ?>
      </section> 
      </div>
  </main>

<?php 
  require 'log-footer.php';
?>