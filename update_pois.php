<?php
  include_once 'admin_header.php';
  include_once 'includes/dbh.inc.php';

  if ($_SESSION["useruid"] === NULL) {
    header("location: ../index.php?error=nologin");
    exit();
  }
 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
         <title>HTML Table With Edit Section</title>
         <meta charset="utf-8">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
         <link rel="stylesheet" type="text/css" href="style13.css">
       </head>
       <body>
         <div class="mainTable">
            <table id="table" border="1">
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
                  <th scope="col">cur_popularity</th>
                  <th scope="col" width="40">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                    $table = mysqli_query($conn,"SELECT * FROM poi  ORDER BY rating DESC");
                    while($row = mysqli_fetch_array($table)){ ?>

                  <tr id="<?php echo $row['id']; ?>">
                    <td data-target="id"><?php echo $row['id']; ?></td>
                    <td data-target="p_name"><?php echo $row['p_name']; ?></td>
                    <td data-target="address"><?php echo $row['address']; ?></td>
                    <td data-target="types"><?php echo $row['types']; ?></td>
                    <td data-target="lat"><?php echo $row['lat']; ?></td>
                    <td data-target="lng"><?php echo $row['lng']; ?></td>
                    <td data-target="rating"><?php echo $row['rating']; ?></td>
                    <td data-target="rating_n"><?php echo $row['rating_n']; ?></td>
                    <td data-target="cur_popularity"><?php echo $row['cur_popularity']; ?></td>
                    <td><a href="#" data-role="update" data-id="<?php echo $row['id'] ;?>">Update</a></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>

            <!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button> -->

         </div>

         <!-- Modal -->
         <div id="myModal" class="modal fade in" role="dialog">
           <div class="modal-dialog">

             <!-- Modal content-->
             <div class="modal-content">
               <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                 <h4 class="modal-title">Modal Header</h4>
               </div>
               <div class="modal-body">
                <!-- <div class="form-group">
                   <label>id</label>
                   <input type="text" id="id" class="form-control">
                 </div> -->
                 <div class="form-group">
                   <label>p_name</label>
                   <input type="text" id="p_name" class="form-control">
                 </div>
                 <div class="form-group">
                   <label>address</label>
                   <input type="text" id="address" class="form-control">
                 </div>
                 <div class="form-group">
                   <label>types</label>
                   <input type="text" id="types" class="form-control">
                 </div>
                 <div class="form-group">
                   <label>lat</label>
                   <input type="text" id="lat" class="form-control">
                 </div>
                 <div class="form-group">
                   <label>lng</label>
                   <input type="text" id="lng" class="form-control">
                 </div>
                 <div class="form-group">
                   <label>rating</label>
                   <input type="text" id="rating" class="form-control">
                 </div>
                 <div class="form-group">
                   <label>rating_n</label>
                   <input type="text" id="rating_n" class="form-control">
                 </div>
                 <div class="form-group">
                   <label>cur_popularity</label>
                   <input type="text" id="cur_popularity" class="form-control">
                 </div>
                 <input type"hidden" id="userId" class="form-control">
               </div>


               <div class="modal-footer">
                 <a href="#" id="save" class="btn btn-primary pull-right">Update</a>
                 <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
               </div>
             </div>

           </div>
         </div>
       </body>

       <script>

       $(document).ready(function(){
          $(document).on('click','a[data-role=update]',function(){

                var id = $(this).data('id');
                var p_name = $('#'+id).children('td[data-target=p_name]').text();
                var address = $('#'+id).children('td[data-target=address]').text();
                var types = $('#'+id).children('td[data-target=types]').text();
                var lat = $('#'+id).children('td[data-target=lat]').text();
                var lng = $('#'+id).children('td[data-target=lng]').text();
                var rating = $('#'+id).children('td[data-target=rating]').text();
                var rating_n = $('#'+id).children('td[data-target=rating_n]').text();
                var cur_popularity = $('#'+id).children('td[data-target=cur_popularity]').text();


                $('#p_name').val(p_name);
                $('#address').val(address);
                $('#types').val(types);
                $('#lat').val(lat);
                $('#lng').val(lng);
                $('#rating').val(rating);
                $('#rating_n').val(rating_n);
                $('#cur_popularity').val(cur_popularity);
                $('#userId').val(id);
                $('#myModal').val('toggle');
              });

              $('#save').click(function(){
                  var id = $('#userId').val();
                  var p_name = $('#p_name').val();
                  var address = $('#address').val();
                  var types = $('#types').val();
                  var lat = $('#lat').val();
                  var lng = $('#lng').val();
                  var rating = $('#rating').val();
                  var rating_n = $('rating_n').val();
                  var cur_popularity = $('#cur_popularity').val();

                  $.ajax({
                    url :'includes/updatePois.inc.php',
                    method : 'POST',
                    data : {p_name : p_name , address : address , types : types , lat : lat, lng : lng , rating : rating , rating_n : rating_n , cur_popularity : cur_popularity, id : id},
                    success : function(response){
                      $('#'+id).children('td[data-target=id]').text(id);
                      $('#'+id).children('td[data-target=p_name]').text(p_name);
                      $('#'+id).children('td[data-target=address]').text(address);
                      $('#'+id).children('td[data-target=types]').text(types);
                      $('#'+id).children('td[data-target=lat]').text(lat);
                      $('#'+id).children('td[data-target=lng]').text(lng);
                      $('#'+id).children('td[data-target=rating]').text(rating);
                      $('#'+id).children('td[data-target=rating_n]').text(rating_n);
                      $('#'+id).children('td[data-target=cur_popularity]').text(cur_popularity);
                      $('#myModal').modal('toggle');
                    }
                  });
                });
       });

       </script>

</html>


   <?php
     include_once 'footer.php';
   ?>
