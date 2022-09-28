<?php
    $conn = new mysqli('localhost','root','');
    mysqli_select_db($conn,'web_base');
    session_start();
    mysqli_set_charset($conn, "utf8");
    $data=$_POST['storeInfo'];
    $count=count($data);
    //echo json_encode($data);
    //echo $count;

    $day=$_POST['day'];
    //echo $day;
    $time_of_the_day=$_POST['time_of_the_day'];
    //$id=array();
    //echo $time_of_the_day;

    $popularity=array();
    //$id=array();
    //array_push($id,array($data['storeInfo']));
   // $id=array();



   // $statement=mysqli_prepare($conn,"SELECT * populartimes where d_name=$day and poi_id=$id and time_of_the_day=$time_of_the_day");


        for($j=0;$j<$count;$j++){
            $id=$data[$j];

            for($i=0;$i<3;$i++){


                $statement="SELECT p1.id, p1.p_name, p1.address, p1.types, p1.lat, p1.lng, p1.rating, p1.rating_n, p2.d_name, p2.time_of_the_day, p2.popularity FROM poi  p1 INNER JOIN populartimes  p2  where (p2.poi_id=p1.id and  d_name='$day' and poi_id=$id and time_of_the_day=$time_of_the_day+$i)";
                //echo $statement;
                $statement_run=mysqli_query($conn,$statement);
                if(mysqli_num_rows($statement_run)>0){
                    $row=mysqli_num_rows($statement_run);
                    while($row=$statement_run->fetch_assoc()){
                        array_push($popularity,array("id"=>$row['id'],"poi_name"=>$row["p_name"],"address"=>$row["address"],"types"=>$row["types"],"lat"=>$row["lat"],"lng"=>$row["lng"],"rating"=>$row["rating"],"rating_n"=>$row["rating_n"],"d_name"=>$row["d_name"],"time_of_the_day"=>$row['time_of_the_day'],"popularity"=>$row["popularity"]));
                    }
                }


            }
        }





    $popularity=json_encode($popularity) ;
    echo $popularity;
?>