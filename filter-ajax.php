<?php

require "includes/dbh.inc.php";

$date = $_GET['visit_date'];
$result = array();
$result['visits'] = '';
$result['visit_date'] = '';

$sql = "SELECT  COUNT(*),
                v_date as visit_date
        FROM visit_by
        WHERE v_date = '$date'
        GROUP BY DATE(visit_date) LIMIT 0, 1";

$query_result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_array($query_result))
{
        $result['visits'] = $row[0];
        $result['visit_date'] = $row[1];
}
        echo json_encode($result);
        mysqli_close($conn);
?>
