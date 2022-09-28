<?php

include 'dbh.inc.php';
if($_GET['id'])
{
 $id=$_GET['id'];
 $sql = "DELETE FROM poi where id='$id'";
 $sql_1 = "DELETE FROM populartimes where poi_id='$id'";
 if ($conn->query($sql) === TRUE && $conn->query($sql_1) === TRUE ) {
  echo "Record deleted successfully";
 } else {
  echo "Error deleting record: " . $conn->error;
 }
}
?>
