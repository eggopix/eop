
<?php
  require 'log-header.php';
?>

  <main>
    <div class="wrapper-main">
      <section class="section-default">
        <h1>Signup</h1>
        <!-- get and print error/success message -->
        <?php 
          if (isset($_GET['error'])) {
            if ($_GET['error'] == "emptyfields") {
              echo '<p class="signup-error">Please fill in all fileds</p>';
            }
            elseif ($_GET['error'] == "invalidmailuid") {
              echo '<p class="signup-error">Invalid username and email</p>';
            }
            elseif ($_GET['error'] == "invalidmail") {
              echo '<p class="signup-error">Invalid email</p>';
            }
            elseif ($_GET['error'] == "invaliduid") {
              echo '<p class="signup-error">Invalid username (letters and numbers only)</p>';
            }
            elseif ($_GET['error'] == "passwordcheck") {
              echo '<p class="signup-error">Passwords doesn\'t match</p>';
            }
            elseif ($_GET['error'] == "usertaken") {
              echo '<p class="signup-error">Username is already taken</p>';
            }
          } 
          elseif ($_GET['signup'] == "success") {
              echo '<p class="signup-success">Signup successfull !</p>';
          }
          // succes message when password updated
          if (isset($_GET['newpwd'])) {
            if ($_GET['newpwd'] == "passwordupdated") {
              echo '<p class="password-update-success">Your password has been updated successfully !</>';
            }
          }
        ?>
        
        <form class="form-signup" action="includes/signup.inc.php" method="post">
          <input type="text" name="uid" placeholder="Username ">
          <input type="text" name="mail" placeholder="E-mail">
          <input type="password" name="pwd" placeholder="Password">
          <input type="password" name="pwd-repeat" placeholder="Repeat password">
          <button type="submit" name="signup-submit">Submit</button>
        </form>
        

        <a href="reset-password.php">Forgot your password ?</a>

      </section> 
      </div>
  </main>

<?php 
  require 'log-footer.php';
?>