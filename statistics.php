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
          <div class="inner-box" id="card">
              <div class="link">
               <div class="button"> <a href="totalnumstats.php">
                 <button type="button" name="totnum_button">Total Number of Statistics
                 </button>
               </div>
             </div>
             <div class="link">
               <div class="button"> <a href="types_stats.php">
               <button type="button" name="typesStats_button">Types and Statistics
                </button>
              </div>
            </div>
            <div class="link">
              <div class="button"> <a href="daily_diagram.php">
              <button type="button" name="dailyDiagram_button">Daily Diagrams
               </button>
             </div>
           </div>
           <div class="link">
             <div class="button"> <a href="monthly_diagram.php">
             <button type="button" name="monthlyDiagram_button">Monthly Diagrams
              </button>
            </div>
          </div>
      </form>
    </div>
  </div>
  </div>
  </body>
  </html>
