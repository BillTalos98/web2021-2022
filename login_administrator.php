<?php
  include_once 'admin_header.php';
?>

<html>
<head>
  <title> Login & Signup Form Customer </title>
  <link rel="stylesheet" href="style.css"/>
</head>
<body>

  <section class="showcase">
        <div class="container grid">
            <div class="showcase-text">

            </div>
        </div>
  </section>

    <div class="container">
        <div class="card">
            <div class="inner-box" id="card">
                <div class="card-front">
                  <h2> Log-In </h2>
                  <form action="includes/admin_login.inc.php" method="post">
                      <input type="username" name="admin_username" placeholder="Enter Username"/>
                      <input type="password" name="admin_password" placeholder="Enter Password"/>
                      <button type="submit" name="admin_submit">Submit</button>
                  </form>
                  <?php
                    if (isset($_GET["error"])){
                      if ($_GET["error"] == "emptyinput") {
                        echo "<p>Fill in all fields</p>";
                      }
                      else if ($_GET["error"] == "wronglogin") {
                        echo "<p>Incorret login</p>";
                      }
                    }
                 ?>
                </div>
              </div>
          </div>
      </div>
</body>
</html>

<?php
  include_once 'footer.php';
?>
