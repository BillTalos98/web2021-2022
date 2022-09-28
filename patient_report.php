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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Report</title>
    <link rel="stylesheet" type="text/css" href="style10.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>


    <div class="container">
      <div class="card-header">
        <h4>Positive Diagnosis to Covid-19 test.</h4>
      </div>
      <div class="card-body">
        <h3> I have been positive in Covid-19 since: </h3>
        <form action="includes/report.inc.php" method="POST">
          <div class="form-group mb-3">
            <label for="">Date of Test</label>
            <input type="date" name="date_of_diagnosis" class="form-control"/>
          </div>
          <div class="form-group mb-3">
            <button type="submit" name="save_date" class="btn btn-primary">Save Data</button>
          </div>
        </form>
        <?php
        if (isset($_GET["error"])){
          if ($_GET["error"] == "patientalreadyactive") {
            echo '<i style="color:white;font-size:30px;font-family:calibri ;"> You are already a covid-19 patient. You must wait for 2 weeks after your date report. </i> ';
          }
          if ($_GET["error"] == "futuredatereport") {
            echo '<i style="color:white;font-size:30px;font-family:calibri ;"> You can not report a future date from today </i> ';
          }
          if ($_GET["error"] == "none") {
            echo '<i style="color:white;font-size:30px;font-family:calibri ;"> Successfully Reported </i> ';
          }
        }
       ?>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
  include_once 'footer.php';
?>
