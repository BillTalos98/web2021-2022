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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <title>Document</title></head>
<body>

  <div style="width: 65%;">
    <canvas id="myChart"></canvas>
  </div>

  <script>
    //window.onload = function graph(){
    var data = $.ajax({
      url: 'includes/statsA.php',
      method: 'POST',
      dataType: 'json',
      success: function(data) {}
    });
    data.done(success)
    // console.log(data)
    // === include 'setup' then 'config' above ===
    function success(Response) {

      let dataz = [];
      dataz.push(parseInt(Response[0]), parseInt(Response[1]), parseInt(Response[2]))

      console.log(dataz);

      const ctx = document.getElementById('myChart').getContext('2d');
      const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: ['# of Visits', '# of Covid Cases', '# of infectious visits'],
          datasets: [{
            label: '',
            data: dataz,
            backgroundColor: [
              'rgba(255, 99, 132, 0.2)',
              'rgba(255, 159, 64, 0.2)',
              'rgba(255, 205, 86, 0.2)',
              'rgba(75, 192, 192, 0.2)',
              'rgba(54, 162, 235, 0.2)',
              'rgba(153, 102, 255, 0.2)',
              'rgba(201, 203, 207, 0.2)'
            ],
            borderColor: [
              'rgba(255, 0, 0, 1)',
              'rgb(255, 159, 64)',
              'rgb(255, 205, 86)',
              'rgb(75, 192, 192)',
              'rgb(54, 162, 235)',
              'rgb(153, 102, 255)',
              'rgb(201, 203, 207)'
            ],
            borderWidth: 2
          }]
        }
      });
    }
  </script>

</body>

</html>

<?php
include_once 'footer.php';
?>
