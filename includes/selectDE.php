<?php

$conn = new mysqli('localhost','root','');
mysqli_select_db($conn,'web_base');
session_start();
mysqli_set_charset($conn, "utf8");
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $results = array();
    $statement1="SELECT p.id,p.p_name,p.types,v.v_username,v.visit_id FROM poi p INNER JOIN visit_by v WHERE (p.p_name=v.v_poi_name) ORDER BY `v`.`visit_id` ASC;";//AND p.types LIKE %$value%;";




    $statement_run = mysqli_query($conn, $statement1);
    if(mysqli_num_rows($statement_run) > 0 ){
        $row=mysqli_num_rows($statement_run);


            //"SELECT p.patient_username,p.date_of_diagnosis,v.v_poi,v_date,v.v_time FROM patient p INNER JOIN visit_by v where p.patient_username=v.v_username"

        while($row = $statement_run->fetch_assoc()){
            array_push($results,array("id"=>$row["id"],"name"=>$row["p_name"],"types"=>$row["types"],"username"=>$row["v_username"],"visit_id"=>$row["visit_id"]));


    //echo json_encode($results);
    $res=json_encode($results);
    //$ids=array_column($stores,'{');
    //$count=array_count_values($ids);

    //echo $res;
            }
    }
    echo $res;
    //$count=count(json_encode($results));

    //echo $count;

    //echo $count=count($res);
}
