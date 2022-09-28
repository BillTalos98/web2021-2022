<?php
if (isset($_POST["admin_submit"])) {

  $ad_username = $_POST["admin_username"];
  $ad_pwd = $_POST["admin_password"];

  require_once 'dbh.inc.php';
  require_once 'functions.inc.php';

  if (emptyInputLoginAd($ad_username, $ad_pwd) !== false) {
    header("location: ../login_administrator.php?error=emptyinput");
    exit();
  }

  loginAdmin($conn, $ad_username, $ad_pwd);
}
else {
  header("location: ../login_administrator.php");
  exit();
}
