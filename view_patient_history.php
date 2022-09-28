<?php
  include_once 'cus_header.php';

  if ($_SESSION["useruid"] === NULL) {
    header("location: ../index.php?error=nologin");
    exit();
  }

  $username = $_SESSION["useruid"];
  include 'includes/dbh.inc.php';
  $query = "SELECT * FROM patient WHERE patient_username = '$username' ORDER BY date_of_diagnosis;";
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
          <th>Username</th>
          <th>Date of diagnosis</th>
     </tr>
     <?php
     $i=1;
          if ($num = mysqli_num_rows($run)>0) {
               while ($result = mysqli_fetch_assoc($run)) {
                    echo "
                         <tr class='data'>
                         <td>".$i++."</td>
                              <td>".$result['patient_username']."</td>
                              <td>".$result['date_of_diagnosis']."</td>
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
