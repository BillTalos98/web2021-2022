<?php

include_once 'dbh.inc.php';
session_start();
mysqli_set_charset($conn, "utf8");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $query2 = $conn->query("SELECT patient_username, date_of_diagnosis FROM patient ORDER BY date_of_diagnosis DESC");
    $patient = array();
    if (mysqli_num_rows($query2) > 0) {
        while ($row = mysqli_fetch_assoc($query2)) {
            array_push($patient, array('username' =>  $row['patient_username'], 'date' => $row['date_of_diagnosis']));
        }
    }
    $username = array();
    for ($i = 0; $i < count($patient); $i++) {
        $u = $patient[$i]['username'];
        $date = date($patient[$i]['date']);
        $date2 = date('Y-m-d', strtotime('-7 day', strtotime($date)));
        $date3 = date('Y-m-d', strtotime('+14 day', strtotime($date)));
        $query3 = $conn->query("SELECT p.id,p.p_name,p.types,v.visit_id FROM poi p INNER JOIN visit_by v WHERE (p.p_name=v.v_poi_name) AND (v_username = '$u') AND (v_date BETWEEN DATE('$date2') AND DATE('$date3'))");
        if (mysqli_num_rows($query3) > 0) {
            while ($row = mysqli_fetch_assoc($query3)) {
                array_push($username, array("id" => $row['id'], "name" => $row["p_name"], "types" => $row["types"], "visit_id" => $row['visit_id']));
            }
        }


    }
    echo json_encode($username);
     //   $res=json_encode($username);
  //  echo ($res);
}
