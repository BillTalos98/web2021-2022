<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style1.css" />
    <script src="main.js" defer></script>
    <title> Start Page </title>
    <link rel="stylesheet" type="text/css" href="style1.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/eff8971301.js" crossorigin="anonymous"></script>
</head>
<body>
  <!-- Navbar Section -->
    <nav class="navbar">
      <div class="navbar__container">
        <a id="navbar__logo">My Life & Covid-19 @ Patra...</a>
        <div class="navbar__toggle" id="mobile-menu">
          <span class="bar"></span> <span class="bar"></span>
          <span class="bar"></span>
        </div>
        <ul class="navbar__menu">
          <li class="navbar__item">
            <a href="login_signup_customer.php" class="navbar__links">Customer</a>
          </li>
          <li class="navbar__item">
            <a href="login_administrator.php" class="navbar__links">Administrator</a>
          </li>
        </ul>
      </div>
    </nav>

    <section class="showcase">
      <div class="container grid">
        <div class="showcase-text">
          <h2>Γιατί να επισκευτώ αυτήν την ιστοσελίδα;</h2>
          <p>Διότι αποτέλλει μια εφαρμογή με σκοπό την ασφαλή μετακίνηση του εκάστωτε χρήστη στην Αχαϊκή πρωτεύουσα - ΠΑΤΡΑ -  στην εποχή του κορονοϊού!!</p>
        </div>
      </div>
    </section>

    <section aria-label="Newest Photos">
    <div class="carousel" data-carousel>
      <button class="carousel-button prev" data-carousel-button="prev">&#8656;</button>
      <button class="carousel-button next" data-carousel-button="next">&#8658;</button>
      <ul data-slides>
        <li class="slide" data-active>
          <img src="images/patras.png" alt="Nature Image #1">
        </li>
        <li class="slide">
          <img src="images/patras_1.png" alt="Nature Image #2">
        </li>
        <li class="slide">
          <img src="images/patras_2.png" alt="Nature Image #3">
        </li>
        <li class="slide">
          <img src="images/patras_3.png" alt="Nature Image #3">
        </li>
        <li class="slide">
          <img src="images/patras_4.png" alt="Nature Image #3">
        </li>
      </ul>
    </div>
  </section>

  </body>
</html>
