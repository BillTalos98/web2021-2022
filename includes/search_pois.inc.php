
<?php
include("dbh.inc.php");
$query = $conn->query("SELECT * FROM poi WHERE types LIKE '%".$_POST['name']."%';");
while ($result = $query ->fetch_object()) {
 $id=stripslashes($result->id);
 $p_name=stripslashes($result->p_name);
 $address=stripslashes($result->address);
 $types=stripslashes($result->types);
 $lat=stripslashes($result->lat);
 $lng=stripslashes($result->lng);
 $rating=stripslashes($result->rating);
 $rating_n=stripslashes($result->rating_n);
 $cur_popularity=stripslashes($result->cur_popularity);

?>
  <tr class="record">
   <td width = "20"><?php echo $p_name; ?></td>
   <td><?php echo $address; ?></td>
   <td><?php echo $types; ?></td>
   <td><?php echo $rating; ?></td>
   <td><?php echo $rating_n; ?></td>
   <td><?php echo $cur_popularity; ?></td>
   <td align="center"><a href="#" id="<?php echo $result->id; ?>" class="insbutton"><img src="images/search_poi.png" style="width:25px;"/></a></td>
  </tr>
<?php } ?>

<script type="text/javascript">
$(function() {
$(".insbutton").click(function(){
 //Save the link in a variable called element
 var element = $(this);
 //Find the id of the link that was clicked
 var ins_id = element.attr("id");
 //Built a url to send
 var info = 'id=' + ins_id;
    $.ajax({
     type: "GET",
     url: "includes/visitPoi.inc.php",
     data: info,
     success: function(data){
     alert(data);
     }
  });

 return false;
});
});
</script>
