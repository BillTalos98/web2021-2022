<?php
 include 'includes/dbh.inc.php';
 if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $query = "DELETE FROM `poi` WHERE id = '$id'";
      $run = mysqli_query($conn,$query);
      if ($run) {
           header('location:delete_pois.php');
      }else{
           echo "Error: ".mysqli_error($conn);
      }
 }

 if (isset($_GET['id'])) {
      $poi_id = $_GET['id'];
      $query_1 = "DELETE FROM `populartimes` WHERE poi_id = '$poi_id'";
      $run = mysqli_query($conn,$query_1);
      if ($run) {
           header('location:delete_pois.php');
      }else{
           echo "Error: ".mysqli_error($conn);
      }
 }

 ?>
