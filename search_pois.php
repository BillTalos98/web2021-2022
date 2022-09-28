<?php
  include_once 'cus_header.php';

  if ($_SESSION["useruid"] === NULL) {
    header("location: ../index.php?error=nologin");
    exit();
  }


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Live Search</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style9.css">
</head>
<body>


<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="col-md-4">
        <input type="text" class="form-control" id="search">
        <table class="table table-bordered">
          <thead>
            <tr class="heading">
              <th>p_name</th>
              <th>address</th>
              <th>types</th>
              <th>rating</th>
              <th>rating_n</th>
              <th>cur_popularity</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody id="output">

          </tbody>
        </table>
      </div class="col-md-4">
      <div class="col-md-12">
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $("#search").keypress(function(){
      $.ajax({
        type:'POST',
        url:'includes/search_pois.inc.php',
        data:{
        name:$("#search").val(),
        },
        success:function(data){
          $("#output").html(data);
        }
      });
    });
  });
</script>
</body>
</html>

<?php
  include_once 'footer.php';
?>
