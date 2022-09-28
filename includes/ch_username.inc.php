<?php

if (isset($_POST["S_N_U"])) {

  $old_username = $_POST["old_username"];
  $new_username = $_POST["new_username"];

  require_once 'dbh.inc.php';
  require_once 'functions.inc.php';

  if (emptyInputChanges($new_username, $old_username) !== false) {
    header("location: ../cus_process.php?error=emptyinput");
    exit();
  }

  if (invalidUid($old_username, $new_username) !== false) {
    header("location: ../cus_process.php?error=invaliduid");
    exit();
  }

/*  if (uidExists($conn, $new_username, $email) !== false) {
    header("location: ../login_signup_customer.php?error=usernametaken");
    exit();
  }*/

  //changeUsername($conn, $new_username, $old_username);

  $sql = "UPDATE customer SET cus_username = '$new_username' WHERE cus_username = '$old_username'";
  $sql1 = "UPDATE visit_by SET v_username = '$new_username' WHERE v_username = '$old_username'";

  if ($conn->query($sql1) === TRUE && $conn->query($sql) === TRUE ) {
   header("location: ../cus_process.php?error=none");

   session_start();
   session_unset();
   session_destroy();
   exit();
  } else {
   echo "stmtfailed" . $conn->error;
  }

}
else{
  header("location: ../cus_process.php");
}
