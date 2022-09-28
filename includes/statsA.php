<?php

include_once 'dbh.inc.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){

$results = array();
$query = $conn->query("SELECT COUNT(*) FROM visit_by");
$query1 = $conn->query("SELECT COUNT(*) FROM patient");

foreach($query as $data)
{
  $amount1 = $data['COUNT(*)'];
}

foreach($query1 as $data)
{
  $amount2 = $data['COUNT(*)'];
}

$query2 = $conn->query("SELECT patient_username, date_of_diagnosis FROM patient ORDER BY date_of_diagnosis DESC");
$patient = array();
if (mysqli_num_rows($query2) > 0) {
  while($row = mysqli_fetch_assoc($query2)) {
    array_push($patient, array('username' =>  $row['patient_username'], 'date' => $row['date_of_diagnosis']));
  }
}

$username = array();
for($i=0; $i<count($patient); $i++){
  $u = $patient[$i]['username'];
  $date = date($patient[$i]['date']);
  $date2 = date('Y-m-d', strtotime('-7 day', strtotime($date)));
  $date3 = date('Y-m-d', strtotime('+14 day', strtotime($date)));
  $query3 = $conn->query("SELECT visit_id FROM visit_by WHERE v_username = '$u' AND v_date BETWEEN DATE('$date2') AND DATE('$date3')");
  if (mysqli_num_rows($query3) > 0) {
    while($row = mysqli_fetch_assoc($query3)) {
      array_push($username,$row['visit_id']);
    }
  }
}
// print_r($result2);
$unique = count(array_unique($username));
// print_r($unique);

 foreach($query3 as $data)
 {
   $unique = count(array_unique($username));
   $amount3 = $unique;
 }

 array_push($results, $amount1, $amount2, $amount3);
 echo json_encode($results);
}

?>
