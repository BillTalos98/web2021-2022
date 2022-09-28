<?php
  include_once 'admin_header.php';

  if ($_SESSION["useruid"] === NULL) {
    header("location: ../index.php?error=nologin");
    exit();
  }
?>

<html>
<head>
  <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Administrator Menu</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="./style3.css" />
</head>
<body>

    <section class="showcase">
          <div class="container grid">
              <div class="showcase-text">

              </div>
          </div>
    </section>

      <div class="dashboard">
        <div class="user">
          <?php
            if (isset($_SESSION["useruid"])) {
              echo "<h1>WELCOME " . $_SESSION["useruid"] . "</h1>";
            }
           ?>
        <div class="inner-box" id="card">
            <div class="link">
             <div class="button"> <a href="uploadpoi.php">
               <button type="button" name="upload_button">Upload New Pois
                 <span class="button__icon">
                   <img src="images/upload.png" alt="" />
                 </span>
               </button>
             </div>
           </div>
           <div class="link">
             <div class="button"> <a href="update_pois.php">
             <button type="button" name="updatePois_button">Update POI's
                <span class="button__icon">
                  <img src="images/data-processing.png" alt="" />
                </span>
              </button>
            </div>
          </div>
          <div class="link">
            <div class="button"> <a href="delete_pois.php">
            <button type="button" name="deletePois_button">Delete POI's
               <span class="button__icon">
                 <img src="images/delete-database.png" alt="" />
               </span>
             </button>
           </div>
         </div>
         <div class="link">
           <div class="button"> <a href="statistics.php">
           <button type="button" name="statistics_button">Statistics
              <span class="button__icon">
                <img src="images/analytics.png" alt="" />
              </span>
            </button>
          </div>
        </div>
    </form>
  </div>
</div>
</div>
</body>
</html>
