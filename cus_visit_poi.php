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
          echo "<h2>" . $_SESSION["useruid"] . "you are about to visit" . $_POST["p_name"] . "</h2>";
        }
       ?>
    </section>
        <div class="inner-box" id="card">
              <section class="editUsername-form">
                <h2> Finish Visit Registration </h2>
                <form action="includes/ch_username.inc.php" method="post">
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
                    echo "<p>Usenmame changed</p>";
                  }
                }
                ?>
              </section>

               </section>
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
