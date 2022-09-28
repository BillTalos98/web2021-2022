<?php
  session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <title> Login & Signup Form Customer </title>
  <link rel="stylesheet" href="style6.css"/> 
</head>
  <div class="navbar">
    <div class="navbar_container flex">
      <h1 id="navbar__logo">My Life & Covid-19 @ Patra...</h1>
      <nav>
          <ul>
            <?php
            if (isset($_SESSION["useruid"])) {
              echo "<li><a href='cus_menu.php'>Menu</a></li>";
              echo "<li><a href='includes/logout.inc.php'>Log out</a></li>";
            }
            else {
              echo "<li><a href='login_signup_customer.php'>Customer</a></li>";
              echo "<li><a href='login_administrator.php'>Administrator</a></li>";
            }
            ?>
          </ul>
      </nav>
    </div>
  </div>
</html>
