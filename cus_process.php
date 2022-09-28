<?php
  include_once 'cus_header.php';

  if ($_SESSION["useruid"] === NULL) {
    header("location: ../index.php?error=nologin");
    exit();
  }
?>

<html>
<head>
        <title> Customer Proccess Profile </title>
        <link rel="stylesheet" type="text/css" href="style4.css">
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <script src="https://kit.fontawesome.com/eff8971301.js" crossorigin="anonymous"></script>
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
      <section class="Proccess Profile">
      <?php
        if (isset($_SESSION["useruid"])) {
          echo "<h2>Username: " . $_SESSION["useruid"] . "</h2>";
        }
       ?>
    </section>
        <div class="inner-box" id="card">
              <section class="editUsername-form">
                <h2> Change Username </h2>
                <form action="includes/ch_username.inc.php" method="post">
                  <input type="username" name="old_username" placeholder="Enter Old Username"/>
                  <input type="username" name="new_username" placeholder="Enter New Username"/>
                  <button type="submit" name="S_N_U">Save Changes</button>
                </form>
              </div>
                <?php
                if (isset($_GET["error"])){
                  if ($_GET["error"] == "emptyinput") {
                    echo "<p>Fill in all fields</p>";
                  }
                  else if ($_GET["error"] == "invaliduid") {
                    echo "<p>Choose a proper username</p>";
                  }
                  else if ($_GET["error"] == "stmtfailed") {
                    echo "<p>Something went wrong, try again</p>";
                  }
                  else if ($_GET["error"] == "usernametaken") {
                    echo "<p>Username already taken</p>";
                  }
                  else if ($_GET["error"] == "none") {
                    echo "<p>Usermame changed</p>";
                  }
                }
                ?>
              </section>

              <div class="inner-box" id="card">
                <section class="editPassword-form">
                  <h2> Change Password </h2>
                  <form action="includes/ch_password.inc.php" method="post">
                    <input type="username" name="cur_username" placeholder="Enter Current Username"/>
                    <input type="password" name="new_password" placeholder="Enter New Password"/>
                    <input type="password" name="rpt_password" placeholder="Repeat New Password"/>
                    <button type="submit" name="S_N_P">Save Changes</button>
                  </form>
                </div>
                  <?php
                  if (isset($_GET["error"])){
                    if ($_GET["error"] == "emptyinputpass") {
                      echo "<p>Fill in all fields</p>";
                   }
                   else if ($_GET["error"] == "invalidpassword"){
                     echo "<p>Password should be at least 8 characters, should include at least one upper case letter, one number, and one special character.</p>";
                   }
                   else if ($_GET["error"] == "passwordsdontmatch") {
                     echo "<p>Passwords doesn't match</p>";
                   }
                   else if ($_GET["error"] == "stmtfailedpass") {
                     echo "<p>Something went wrong, try again</p>";
                   }
                   else if ($_GET["error"] == "nonepass") {
                     echo "<p>Password Changed</p>";
                   }
                 }
                 ?>
               </section>
                 <div class="link">
                   <div class="button"> <a href="view_patient_history.php">
                   <button type="button" name="view_patient_history">View Patient History
                      <span class="button__icon">
                      </span>
                    </button>
                  </div>
                </div>
                <div class="link">
                  <div class="button"> <a href="view_poi_history.php">
                  <button type="button" name="view_poi_history">View Poi History
                     <span class="button__icon">
                     </span>
                   </button>
                 </div>
               </div>
             </div>
  </div>
  <section class="showcase_1">
        <div class="container grid">
            <div class="showcase-text">

            </div>
        </div>
  </section>
</body>
</html>


<?php
  include_once 'footer.php';
?>
