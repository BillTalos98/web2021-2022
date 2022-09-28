<?php
  include_once 'admin_header.php';

  if ($_SESSION["useruid"] === NULL) {
    header("location: ../index.php?error=nologin");
    exit();
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->

	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style7.css">
	<title>Upload</title>
</head>
<body>

  <section class="showcase">
        <div class="container grid">
            <div class="showcase-text">

            </div>
        </div>
  </section>

		<!-- Showcase -->
	<section
		class="bg-primary text-light p-5 p-lg-0 pt-lg-5 text-center text-sm-start">
		<div class="container">
			<div class="d-sm-flex align-items-center justify-content-between">
				<div><br>

				<div class="input-group">
          <form class=form id="uploadForm">

					       <input  type="file"  name="inpFile" id="inpFile" ><br>
                 <input  class="button" type="submit" value="Upload">


          </form>

				</div><br><br>
        <script>
          const uploadForm=document.getElementById("uploadForm");
          const inpFIle=document.getElementById("fileupload");

          uploadForm.addEventListener("submit",uploadFile);

          function uploadFile (e){
            e.preventDefault();

            const xhr= new XMLHttpRequest();
            xhr.open("POST","json_con_db3.php");

            //xhr.setRequestHeader("Content-Type","multipart/form-data");
            xhr.send(new FormData(uploadForm));


          }



        </script>

				</div>
			</div>
		</div>
	</section>
</div>


</body>
</html>
