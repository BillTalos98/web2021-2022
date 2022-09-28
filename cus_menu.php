<?php
  include_once 'cus_header.php';

  if ($_SESSION["useruid"] === NULL) {
    header("location: ../index.php?error=nologin");
    exit();
  }
?>

<html>
<head>
  <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Customer Menu</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="./style11.css" />
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
             <div class="button"> <a href="index-lf.php">
               <button type="button" name="map_button">Map
                 <span class="button__icon">
                   <img src="images/map.png" alt="" />
                 </span>
               </button>
             </div>
           </div>
           <div class="link">
            <div class="button"> <a href="search_pois.php">
              <button type="button" name="SPoi_button">Visit Registration
                <span class="button__icon">
                  <img src="images/positioning.png" alt="" />
                </span>
              </button>
            </div>
          </div>
         <div class="link">
           <div class="button"> <a href="patient_report.php">
           <button type="button" name="Covid_button">Covid-19 Patient Report
              <span class="button__icon">
                <img src="images/patient.png" alt="" />
              </span>
            </button>
          </div>
        </div>
        <div class="link">
          <div class="button"> <a href="possible_con.php">
          <button type="button" name="Possible_Con_Patient">Covid-19 Contact
             <span class="button__icon">
               <img src="images/epidemic-prevention.png" alt="" />
             </span>
           </button>
         </div>
       </div>
       <div class="link">
         <div class="button"> <a href="cus_process.php">
         <button type="button" name="proc_prof">Process Profile
            <span class="button__icon">
              <img src="images/edit-info.png" alt="" />
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

<?php
  include_once 'footer.php';
?>
