<?php

          //connect to db
   /// $conn = new mysqli('localhost','root','');
    ///mysqli_select_db($conn,'web_base');

    //$filename=$_FILES['file']['name'];
    $targetDir="upload/";
    $targetPath=$targetDir . basename($_FILES["inpFile"]["name"]);

    if(move_uploaded_file($_FILES['inpFile']['tmp_name'],$targetPath)){
      echo "The file ". basename($_FILES["inpFile"]["name"]). " has been uploaded.";
    }

    $conn = new mysqli('localhost','root','');
    mysqli_select_db($conn,'web_base');

    //JSON to array
    $json=file_get_contents( $_FILES["inpFile"]["name"] , $targetPath );
    $data=json_decode($json,true);


    //1st level of pois
  //  $POIs=$data['POIs'];

    //use prepare statement for insert query
    $q1=mysqli_prepare($conn,'INSERT INTO poi(id,p_name,address,types,lat,lng,rating,rating_n,cur_popularity) VALUES (?,?,?,?,?,?,?,?,?)');
    $q2=mysqli_prepare($conn,'INSERT INTO populartimes(poi_id,d_name,time_of_the_day,popularity) VALUES (?,?,?,?)');
    //$q3=mysqli_prepare($conn,'INSERT INTO types(type_id,type) VALUES (?,?)');
    mysqli_stmt_bind_param($q1,'ssssdddii',$id,$p_name,$address,$types,$lat,$lng,$rating,$rating_n,$cur_popularity);
    mysqli_stmt_bind_param($q2,'ssss',$poi_id,$d_name,$time_of_the_day,$popularity);
    //mysqli_stmt_bind_param($q3,'ss',$type_id,$type);

    foreach ($data as $row) {
      $id=$row['id'];
      $p_name=$row['name'];
      $address=$row['address'];
      $types=implode(",",array_values($row["types"]));
      $lat=$row['coordinates']['lat'];
      $lng=$row['coordinates']['lng'];
      $rating=$row['rating'];
      $rating_n=$row['rating_n'];
      $cur_popularity=$row['current_popularity'];
      mysqli_stmt_execute($q1);

      foreach ($row['populartimes'] as $value) {

      //for($j=0; $j<=6; $j++){
        for($k=0; $k<=23; $k++){
          $poi_id=$row['id'];
          $d_name=$value['name'];
          $time_of_the_day=$k;
          $popularity=$value['data'][$k];
          mysqli_stmt_execute($q2);
      }
    }

  }

//      $q3=mysqli_prepare($conn,'INSERT INTO types($types) VALUES ($values)');
  //    mysqli_stmt_bind_param($q3,'ss',$type_id,$type);

      //$type = $row['types'];
    //  return mysqli_stmt_execute($q3);





      /*$type=$row['types']['$i'];
      if(!$i){
        mysqli_stmt(q3)
      }*/


      // code...

    mysqli_close($conn);


?>



          <br />
              </div>
           </body>
      </html>
