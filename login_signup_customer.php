<?php
  include_once 'cus_header.php';
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
                  <section class="signup-form">
                  <h2> Log-In </h2>
                  <form action="includes/login.inc.php" method="post">
                      <input type="username" name="uid" placeholder="Enter Username"/>
                      <input type="password" name="pwd" placeholder="Enter Password"/>
                      <button type="submit" name="log_submit">Log in</button>
                  </form>
                  <button type="button" class="btn" onclick="openSignup()"> I'm New Here!</button>
                </div>
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
              </section>
                <div class="card-back">
                  <section class="signup-form">
                    <h2> Sign-Up </h2>
                      <form action="includes/signup.inc.php" method="post">
                        <input type="text" name="name" placeholder="Enter Your Name"/>
                        <input type="username" name="username" placeholder="Enter Username"/>
                        <input type="password" name="password" placeholder="Enter Password"/>
                        <input type="password" name="rpt_password" placeholder="Repeat Password"/>
                        <input type="email" name="email" placeholder="Enter Your Email"/>
                        <button type="submit" name="submit">Sign Up</button>
                      </form>
                      <?php
                        if (isset($_GET["error"])){
                          if ($_GET["error"] == "emptyinput") {
                            echo "<p>Fill in all fields</p>";
                          }
                          else if ($_GET["error"] == "invaliduid") {
                            echo "<p>Choose a proper username</p>";
                          }
                          else if ($_GET["error"] == "invalidpassword"){
                            echo "<p>Password should be at least 8 characters, should include at least one upper case letter, one number, and one special character.</p>";
                          }
                          else if ($_GET["error"] == "invalidemail") {
                            echo "<p>Choose a proper email</p>";
                          }
                          else if ($_GET["error"] == "passwordsdontmatch") {
                            echo "<p>Passwords doesn't match</p>";
                          }
                          else if ($_GET["error"] == "stmtfailed") {
                            echo "<p>Something went wrong, try again</p>";
                          }
                          else if ($_GET["error"] == "usernametaken") {
                            echo "<p>Username already taken</p>";
                          }
                          else if ($_GET["error"] == "none") {
                            echo "<p>You have signed up</p>";
                          }
                        }
                       ?>
                    </section>

                  <button typr="button" class="btn" onclick="openLogin()"> I've got Account!</button>
                </div>
            </div>
        </div>
    </div>

    <script>

      var card = document.getElementById("card");

      function openSignup(){
        card.style.transform = "rotateY(-180deg)";
      }

      function openLogin(){
        card.style.transform = "rotateY(0deg)";
      }

    </script>

</body>
</html>

<?php
  include_once 'footer.php';
?>
