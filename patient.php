<?php
include "includes/dbh.inc.php";
session_start();





if($_SERVER["REQUEST_METHOD"] == "POST") {

    $id=$_SESSION['useruid'];
    $users=array();
    $sql="SELECT c.cus_username,p.patient_username,p.date_of_diagnosis from customer as c INNER JOIN patient as p ON c.cus_username=p.patient_username WHERE c.cus_username='$id'";
    $result=mysqli_query($conn,$sql);
    if($result->num_rows>0){
        while($row=$result->fetch_assoc()){

            array_push($users,array('cus_username'=>$row['cus_username'],'patient_username'=>$row['patient_username'],'date_of_diagnosis'=>$row['date_of_diagnosis']));
        }

    }

    $trigger=array();


    $statement="CREATE TRIGGER checkbeforeinsert
                BEFORE INSERT ON patient
                FOR EACH ROW
                BEGIN
                  DECLARE check_date_of_diagnosis DATE;
                  SELECT date_of_diagnosis FROM patient WHERE patient_username='$id';
                  SET check_date_of_diagnosis = CURRENT_DATE - date_of_diagnosis;
                  IF(check_date_of_diagnosis >14) THEN
                    SET NEW.date_of_diagnosis = CURRENT_DATE;
                    INSERT NEW.date_of_diagnosis INTO patient WHERE patient_username='$id';
                  END IF;
                END";
    $statement_run=mysqli_query($conn,$statement);
    if($statement_run->num_rows > 0) {
        while($row = $statement_run->fetch_assoc()) {
            array_push($trigger,array('patient_username'=>$row['patient_username'],'date_of_diagnosis'=>$row['date_of_diagnosis']));
        }
    }




}





?>
