<?php

if (isset($_POST["submit"])) {

  $name = $_POST["name"];
  $username = $_POST["username"];
  $password = $_POST["password"];
  $rpt_password = $_POST["rpt_password"];
  $email = $_POST["email"];

  require_once 'dbh.inc.php';
  require_once 'functions.inc.php';

  if (emptyInputSignup($name, $username, $password, $rpt_password, $email) !== false) {
    header("location: ../login_signup_customer.php?error=emptyinput");
    exit();
  }

  if (invalidUid($username) !== false) {
    header("location: ../login_signup_customer.php?error=invaliduid");
    exit();
  }

  if (invalidPassword($password) !== false) {
    header("location: ../login_signup_customer.php?error=invalidpassword");
    exit();
  }

  if (pwdMatch($password, $rpt_password) !== false) {
    header("location: ../login_signup_customer.php?error=passwordsdontmatch");
  }

  if (invalidEmail($email) !== false) {
    header("location: ../login_signup_customer.php?error=invalidemail");
    exit();
  }

  if (uidExists($conn, $username, $email) !== false) {
    header("location: ../login_signup_customer.php?error=usernametaken");
    exit();
  }

  createUser($conn, $name, $username, $password, $email);
}
else {
  header("location: ../login_signup_customer.php");
}
