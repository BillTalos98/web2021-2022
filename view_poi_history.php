<?php
  include_once 'cus_header.php';

  if ($_SESSION["useruid"] === NULL) {
    header("location: ../index.php?error=nologin");
    exit();
  }

  $username = $_SESSION["useruid"];
  include 'includes/dbh.inc.php';

  //$query = "SELECT visit_by.v_date, visit_by.v_time, poi.pname FROM visit_by INNER JOIN poi ON visit_by.v_poi = poi.id WHERE v_username = '$username';";
  $query = "SELECT v_poi_name, v_date, v_time FROM visit_by WHERE v_username = '$username';";
  $run = mysqli_query($conn,$query);
?>

<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8">
     <title>Delete Data From Database in PHP</title>
     <link rel="stylesheet" type="text/css" href="style8.css">
</head>
<body>
<header></header>
<table border="1" cellspacing="0" cellpadding="0">
     <tr class="heading">
       <th>No.</th>
          <th>Poi</th>
          <th>Date</th>
          <th>Time</th>
     </tr>
     <?php
     $i=1;
          if ($num = mysqli_num_rows($run)>0) {
               while ($result = mysqli_fetch_assoc($run)) {
                    echo "
                         <tr class='data'>
                         <td>".$i++."</td>
                              <td>".$result['v_poi_name']."</td>
                              <td>".$result['v_date']."</td>
                              <td>".$result['v_time']."</td>
                         </tr>
                    ";
               }
          }
     ?>
</table>
</body>
</html>

<?php
  include_once 'footer.php';
?>
