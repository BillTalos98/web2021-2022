<?php

if (isset($_POST["S_N_P"])) {

  $new_password = $_POST["new_password"];
  $rpt_password = $_POST["rpt_password"];
  $cur_username = $_POST["cur_username"];

  require_once 'dbh.inc.php';
  require_once 'functions.inc.php';

  if (emptyInputChangePassword($new_password, $rpt_password, $cur_username) !== false) {
    header("location: ../cus_process.php?error=emptyinputpass");
    exit();
  }

  if (invalidPassword($new_password) !== false) {
    header("location: ../cus_process.php?error=invalidpassword");
    exit();
  }

  if (pwdMatch($new_password, $rpt_password) !== false) {
    header("location: ../cus_process.php?error=passwordsdontmatch");
    exit();
  }

  changePassword($conn, $new_password, $cur_username, $rpt_password);
}
else{
  header("location: ../cus_process.php");
}
