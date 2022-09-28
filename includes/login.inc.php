<?php
if (isset($_POST["log_submit"])) {

  $username = $_POST["uid"];
  $pwd = $_POST["pwd"];

  require_once 'dbh.inc.php';
  require_once 'functions.inc.php';

  if (emptyInputLogin($username, $pwd) !== false) {
    header("location: ../login_signup_customer.php?error=emptyinput");
    exit();
  }

  loginUser($conn, $username, $pwd);
}
else {
  header("location: ../login_signup_customer.php");
  exit();
}
