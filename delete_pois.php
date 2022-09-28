<?php
  include_once 'admin_header.php';

  if ($_SESSION["useruid"] === NULL) {
    header("location: ../index.php?error=nologin");
    exit();
  }

 ?>

 <!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Delete confirmation Records jquery ajax</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="style9.css">

<script type="text/javascript">
$(function() {
$(".delbutton").click(function(){
 //Save the link in a variable called element
 var element = $(this);
 //Find the id of the link that was clicked
 var del_id = element.attr("id");
 //Built a url to send
 var info = 'id=' + del_id;
 if(confirm("Sure you want to delete this record? There is NO undo!")) {
    $.ajax({
     type: "GET",
     url: "includes/deletePois.inc.php",
     data: info,
     success: function(data){
     alert(data);
     }
  });
    $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
    .animate({ opacity: "hide" }, "slow");
  }
 return false;
});
});
</script>
</head>
<body>
<table id="box-table-a">
 <thead>
  <tr>
   <th scope="col">id</th>
   <th scope="col">p_name</th>
   <th scope="col">address</th>
   <th scope="col">types</th>
   <th scope="col">lat</th>
   <th scope="col">lng</th>
   <th scope="col">rating</th>
   <th scope="col">rating_n</th>
   <th scope="col" width="40">Action</th>
  </tr>
 </thead>
 <tbody>
<?php
include("includes/dbh.inc.php");
$query = $conn->query("SELECT * FROM poi  ORDER BY rating DESC");
while ($result = $query ->fetch_object()) {
 $id=stripslashes($result->id);
 $p_name=stripslashes($result->p_name);
 $address=stripslashes($result->address);
 $types=stripslashes($result->types);
 $lat=stripslashes($result->lat);
 $lng=stripslashes($result->lng);
 $rating=stripslashes($result->rating);
 $rating_n=stripslashes($result->rating_n);
?>
  <tr class="record">
   <td><?php echo $id; ?></td>
   <td><?php echo $p_name; ?></td>
   <td><?php echo $address; ?></td>
   <td><?php echo $types; ?></td>
   <td><?php echo $lat; ?></td>
   <td><?php echo $lng; ?></td>
   <td><?php echo $rating; ?></td>
   <td><?php echo $rating_n; ?></td>
   <td align="center"><a href="#" id="<?php echo $result->id; ?>" class="delbutton"><img src="images/delete.png" style="width:25px;"/></a></td>
  </tr>
<?php } ?>
 </tbody>
</table>

</body>
</html>


   <?php
     include_once 'footer.php';
   ?>
