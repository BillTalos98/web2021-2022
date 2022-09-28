<?php
    $conn = new mysqli('localhost','root','');
    mysqli_select_db($conn,'web_base');
    session_start();
    mysqli_set_charset($conn, "utf8");
   // mysqli_query($conn,"SET NAME 'utf8");
   // mysqli_query($conn,"SET CHARACTER SET 'utf8");
    //mysql_set_charset('utf8');
   // $value=$_POST['search'];
    //$value="cafe";



//        $type=$_GET["search"];
//        $hour=$_GET["hour"];
//        $day=$_GET["day"];

        $stores=array();


     //   $statement1="SELECT p.id,p.p_name,p.address,p.types,p.lat,p.lng,p.rating,p.rating_n,t.d_name,t.time_of_the_day,t.popularity FROM poi p INNER JOIN populartimes t WHERE (p.id=t.poi_id )";//AND p.types LIKE %$value%;";
//$statement1="SELECT id,p_name,address,types,lat,lng,rating,rating_n FROM poi";
//OR p.p_name LIKE %$value%);"
        $statement1="SELECT id,p_name,types,lat,lng FROM poi  ;";
        $statement_run = mysqli_query($conn, $statement1);
        if(mysqli_num_rows($statement_run) > 0 ){
            $row=mysqli_num_rows($statement_run);


            //"SELECT p.patient_username,p.date_of_diagnosis,v.v_poi,v_date,v.v_time FROM patient p INNER JOIN visit_by v where p.patient_username=v.v_username"

            while($row = $statement_run->fetch_assoc()){
                array_push($stores,array("id"=>$row["id"],"name"=>$row["p_name"],"types"=>$row["types"],"lat"=>$row["lat"],"lng"=>$row["lng"]));

//                array_push($stores,array("id"=>$row["id"],"name"=>$row["p_name"],"adress"=>$row["address"],"types"=>$row["types"],"lat"=>$row["lat"],"lng"=>$row["lng"],"rating"=>$row["rating"],"rating_n"=>$row["rating_n"],"d_name"=>$row["d_name"],"time_of_the_day"=>$row["time_of_the_day"],"popularity"=>$row["popularity"]));
//                array_push($patient,array("patient_username"=>$row["patient_username","date_of_diagnosis"=>$row["date_of_diagnosis","v_poi"=>$row["v_poi"],"v_date"=>$row["v_date"],"v_date"=>$row["v_date"],"v_time"=>$row["v_time"]))


            }

                $store=json_encode($stores,$flags=JSON_UNESCAPED_UNICODE);
            }
            echo $store;



       // $data=json_encode($stores);
//        function searchInit($text){
//            $reg="/^".$_GET['search']."/i";//initial case insesitive sear
//            return (bool)@preg_match($reg,$text['p_name ,types']);
//       }


//        $filtered_data=array_filter($data,'searchInit');
//        $filtered_data=array_values($filtered_data);

//        $JSON=json_encode($filtered_data,true);
//        echo $JSON;
//        echo json_encode($stores);




?>