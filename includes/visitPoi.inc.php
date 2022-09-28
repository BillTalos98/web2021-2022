<?php
include 'dbh.inc.php';
include '../cus_header.php';

if($_GET['id'])
{
 $id = $_GET['id'];
 $username = $_SESSION["useruid"];
 $date = date("Y/m/d");
 $time = date("h:i:sa");

 $query = $conn->query("SELECT p_name FROM poi WHERE id = '$id';");
 while ($result = $query ->fetch_object()) {
  $poi=stripslashes($result->p_name);
}

 $sql = "INSERT INTO visit_by VALUES ('$username', '$id', '$poi', '$date', '$time', '$visit_id');";

  if ($conn->query($sql) === TRUE) {
    echo "Record inserted successfully";
  } else {
    echo "Error inserting record: " . $conn->error;
 }


/* $stmt = mysqli_stmt_init($conn);
 if (!mysqli_stmt_prepare($stmt, $sql)){
   header("location: ../search_pois.php?error=stmtfailed");
   exit();
 }

 mysqli_stmt_bind_param($stmt, "ssss", $username, $id, $date, $time);
 mysqli_stmt_execute($stmt);
 mysqli_stmt_close($stmt);
 header("location: ../search_pois.php?error=none");
 exit();
 */
}
?>
