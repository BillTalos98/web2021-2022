<?php

include_once 'includes/dbh.inc.php';

 $q_1= mysqli_prepare($conn,'SELECT SUBSTRING_INDEX(types, ",", 1) AS type_one FROM poi');
 $q_2= mysqli_prepare($conn,'SELECT SUBSTRING_INDEX(SUBSTRING_INDEX(types, ",", 2), ",", -1) AS type_two FROM poi');
 $q_3= mysqli_prepare($conn,'SELECT SUBSTRING_INDEX(SUBSTRING_INDEX(types, ",", 3), ",", -2) AS type_three FROM poi');
 $q_4= mysqli_prepare($conn,'SELECT SUBSTRING_INDEX(SUBSTRING_INDEX(types, ",", 4), ",", -3) AS type_four FROM poi');
 $q_5= mysqli_prepare($conn,'SELECT SUBSTRING_INDEX(SUBSTRING_INDEX(types, ",", 5), ",", -4) AS type_five FROM poi');
 $q_6= mysqli_prepare($conn,'SELECT SUBSTRING_INDEX(SUBSTRING_INDEX(types, ",", 6), ",", -5) AS type_six FROM poi');

 $q1=mysqli_prepare($conn,'INSERT INTO poi(type_one, type_two, type_three, type_four, type_five, type_six) VALUES (?,?,?,?,?,?)');

 mysqli_stmt_bind_param($q1,'ssssss',$type_one,$type_two,$type_three,$type_four,$type_five,$type_six);

 $type_one = $q_1;
 $type_two = $q_2;
 $type_three = $q_3;
 $type_four = $q_4;
 $type_five = $q_5;
 $type_six = $q_6;

 mysqli_stmt_execute($q1);

?>
