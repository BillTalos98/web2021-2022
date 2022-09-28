<?php
  include_once 'dbh.inc.php';

  if(isset($_POST['id'])){

    $p_name = $_POST['p_name'];
    $address = $_POST['address'];
    $types = $_POST['types'];
    $lat = $_POST['lat'];
    $lng = $_POST['lng'];
    $rating = $_POST['rating'];
    $rating_n = $_POST['rating_n'];
    $cur_popularity = $_POST['cur_popularity'];
    $id = $_POST['id'];

    $sql = "UPDATE poi SET id = '$id', p_name = '$p_name', address = '$address', types = '$types', lat = '$lat', lng = '$lng', rating = '$rating', rating_n = '$rating_n', cur_popularity = '$cur_popularity' WHERE id = '$id';";
    $result = mysqli_query($conn, $sql);
    if($result){
      echo 'data updated';
    }
  }
 ?>
