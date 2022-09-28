<?php

function emptyInputSignup($name, $username, $password, $rpt_password, $email) {
  $result;
  if (empty($name) || empty($username) || empty($password) || empty($rpt_password) || empty($email)) {
    $result = true;
  }
  else {
  $result = false;
  }
  return $result;
}

function invalidUid($username) {
  $result;
  if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
    $result = true;
  }
  else {
  $result = false;
  }
  return $result;
}

function invalidPassword($password) {
  $result;
  $uppercase = preg_match('@[A-Z]@', $password);
  $lowercase = preg_match('@[a-z]@', $password);
  $number    = preg_match('@[0-9]@', $password);
  $specialChars = preg_match('@[^\w]@', $password);

  if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
      $result = true;
  }else{
      $result = false;
  }
  return $result;
}

function invalidEmail($email) {
  $result;
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $result = true;
  }
  else {
  $result = false;
  }
  return $result;
}

function pwdMatch($password, $rpt_password) {
  $result;
  if ($password !== $rpt_password) {
    $result = true;
  }
  else {
  $result = false;
  }
  return $result;
}

function uidExists($conn, $username, $email) {
  $sql = "SELECT * FROM customer WHERE cus_username = ? OR cus_email = ?;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../login_signup_customer.php?error=stmtfailed");
    exit();
  }

  mysqli_stmt_bind_param($stmt, "ss", $username, $email);
  mysqli_stmt_execute($stmt);

  $resultData = mysqli_stmt_get_result($stmt);

  if ($row = mysqli_fetch_assoc($resultData)) {
    return $row;
  }
  else {
    $result = false;
    return $result;
  }

  mysqli_stmt_close($stmt);
}

function createUser($conn, $name, $username, $password, $email) {
  $sql = "INSERT INTO customer(cus_name, cus_username,	cus_password,	cus_email) VALUES(?, ?, ?, ?);";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)){
    header("location: ../login_signup_customer.php?error=stmtfailed");
    exit();
  }

  #$hashed_password = password_hash($password, PASSWORD_DEFAULT);

  mysqli_stmt_bind_param($stmt, "ssss", $name, $username, $password, $email);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  header("location: ../login_signup_customer.php?error=none");
  exit();
}

function emptyInputLogin($username, $pwd) {
  $result;
  if (empty($username) || empty($pwd)) {
    $result = true;
  }
  else {
  $result = false;
  }
  return $result;
}

function emptyInputLoginAd($ad_username, $ad_pwd) {
  $result;
  if (empty($ad_username) || empty($ad_pwd)) {
    $result = true;
  }
  else {
  $result = false;
  }
  return $result;
}

function loginUser($conn, $username, $pwd) {
  $uidExists = uidExists($conn, $username, $username);

  if ($uidExists === false){
    header("location: ../login_signup_customer.php?error=wronglogin");
    exit();
  }

  $pwdHashed = $uidExists["cus_password"];
  #$checkPwd = password_verify($pwd, $pwdHashed);

  if ($pwd === $pwdHashed) {
    $checkPwd = true;
  }
  else {
    $checkPwd = false;
  }

  if ($checkPwd === false) {
    header("location: ../login_signup_customer.php?error=wronglogin");
    exit();
  }
  else if ($checkPwd === true) {
    session_start();
    $_SESSION["userid"] = $uidExists["customer_id"];
    $_SESSION["useruid"] = $uidExists["cus_username"];
    header("location: ../cus_menu.php");
    exit();
  }

}

function AdminExists($conn, $ad_username, $ad_email) {
  $sql = "SELECT * FROM administrator WHERE admin_username = ? OR admin_email = ?;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../login_administrator.php?error=stmtfailed");
    exit();
  }

  mysqli_stmt_bind_param($stmt, "ss", $ad_username, $ad_email);
  mysqli_stmt_execute($stmt);

  $resultData = mysqli_stmt_get_result($stmt);

  if ($row = mysqli_fetch_assoc($resultData)) {
    return $row;
  }
  else {
    $result = false;
    return $result;
  }
  mysqli_stmt_close($stmt);
}


function loginAdmin($conn, $ad_username, $ad_pwd) {
  $AdminExists = AdminExists($conn, $ad_username, $ad_username);

  if ($AdminExists === false){
    header("location: ../login_administrator.php?error=wronglogin");
    exit();
  }

  $pwdHashed = $AdminExists["admin_password"];
  #$checkPwd = password_verify($pwd, $pwdHashed);

  if ($ad_pwd === $pwdHashed) {
    $checkPwd = true;
  }
  else {
    $checkPwd = false;
  }

  if ($checkPwd === false) {
    header("location: ../login_administrator.php?error=wronglogin");
    exit();
  }
  else if ($checkPwd === true) {
    session_start();
    $_SESSION["userid"] = $AdminExists["administrator_id"];
    $_SESSION["useruid"] = $AdminExists["admin_username"];
    header("location: ../admin_menu.php");
    exit();
  }
}

  function emptyInputChanges($old_username, $new_username) {
    $result;
    if (empty($new_username) || empty($old_username)) {
      $result = true;
    }
    else {
    $result = false;
    }
    return $result;
  }

  /*function changeUsername($conn, $new_username, $old_username) {

    $sql = "UPDATE customer SET cus_username = ? WHERE cus_username = ?;";
    $sql1 = "UPDATE visit_by SET v_username = ? WHERE v_username = ?;";


    if ($conn->query($sql) === TRUE && $conn->query($sql1) === TRUE ) {
     echo "Record changed successfully";
    } else {
     echo "Error changing record: " . $conn->error;
    }
   }
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)){
      header("location: ../cus_process.php?error=stmtfailed");
      exit();
    }

    if (!mysqli_stmt_prepare($stmt, $sql1)){
      header("location: ../cus_process.php?error=stmtfailed");
      exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $new_username, $old_username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../cus_process.php?error=none");
    exit();
  }*/

  function emptyInputChangePassword($new_password, $rpt_password, $cur_username) {
    $result;
    if (empty($new_password) || empty($rpt_password) || empty($cur_username)) {
      $result = true;
    }
    else {
    $result = false;
    }
    return $result;
  }

  function changePassword($conn, $new_password, $cur_username, $rpt_password) {

      $sql = "UPDATE customer SET cus_password = ? WHERE cus_username = ?;";
      $stmt = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../cus_process.php?error=stmtfailedpass");
        exit();
      }

      mysqli_stmt_bind_param($stmt, "ss", $new_password, $cur_username);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_close($stmt);

      header("location: ../cus_process.php?error=nonepass");

      session_start();
      session_unset();
      session_destroy();
      exit();

  }

  function saveDate($conn, $patient_username, $date_of_diagnosis) {
    $sql = "INSERT INTO patient VALUES(?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
      header("location: ../patient_report.php?error=stmtfailed");
      exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $patient_username, $date_of_diagnosis);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../patient_report.php?error=none");
    exit();

  }

  function checkActivePatient($conn, $date_of_diagnosis ,$patient_username){
  $PatientExists = PatientExists($conn, $patient_username);
  $Date = $PatientExists["date_of_diagnosis"];
  $CurrDate = $date_of_diagnosis;

  $datetime1 = strtotime($Date);
  $datetime2 = strtotime($CurrDate);

  $secs = $datetime2 - $datetime1;// == <seconds between the two times>
  $days = $secs / 86400;

  if (abs($days) < 14) {
    header("location: ../patient_report.php?error=patientalreadyactive");
    exit();
  }
}

function dateCheck($date_of_diagnosis){
  $CurrDate = date("Y/m/d");

  $dateTimestamp1 = strtotime($date_of_diagnosis);
  $dateTimestamp2 = strtotime($CurrDate);

  if ($dateTimestamp1 > $dateTimestamp2) {
    header("location: ../patient_report.php?error=futuredatereport");
    exit();
  }
}

function PatientExists($conn, $patient_username) {
    $sql = "SELECT * FROM patient WHERE patient_username = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("location: ../patient_report=stmtfailed");
      exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $patient_username);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
      return $row;
    }
    else {
      $result = false;
      return $result;
    }
    mysqli_stmt_close($stmt);
  }



  function emptyInputDate($date_of_diagnosis) {
    $result;
    if (empty($date_of_diagnosis)){
      $result = true;
    }
    else {
    $result = false;
    }
    return $result;
  }

  function deletePatient($conn, $patient_username, $date_of_diagnosis) {

    $sql = "DELETE FROM patient WHERE patient_username = '".$patient_username."' AND '".$date_of_diagnosis."' <= INTERVAL 14 DAY;";

    if ($conn->query($sql) === TRUE) {
      header("location: ../patient_report.php?error=none");
      exit();
    } else {
      header("location: ../patient_report.php?error=stmtfailed");
      exit();
}

$conn->close();

  }

  function checkPassword($conn, $patient_username, $patient_password) {

      $uidExists = uidExists($conn, $patient_username, $patient_username);

      $pwd = $uidExists["cus_password"];

      if ($patient_password != $pwd) {
        header("location: ../patient_report.php?error=notvalidpassword");
        exit();
      }
    }
