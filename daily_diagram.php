<?php
    include_once 'admin_header.php';

    if ($_SESSION["useruid"] === NULL) {
    header("location: ../index.php?error=nologin");
    exit();
   }

   /*require "includes/dbh.inc.php";

   $result = array();
   $result['visits'] = '';
   $result['visit_date'] = '';

$sql = "SELECT  COUNT(*),
                v_date as visit_date
        FROM visit_by
        GROUP BY DATE(visit_date)
        LIMIT 0, 1";
$query_result = mysqli_query($conn, $sql);

// Loop the query result
while($row = mysqli_fetch_array($query_result))
{
        $result['visits']       = $row[0];
        $result['visit_date']  = $row[1];
}
        mysqli_close($conn);*/
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Getting Started with Chart JS with www.chartjs3.com</title>
    <style>
      * {
        margin: 0;
        padding: 0;
        font-family: sans-serif;
      }
      .chartMenu {
        width: 100vw;
        height: 40px;
        background: #1A1A1A;
        color: rgba(255, 26, 104, 1);
      }
      .chartMenu p {
        padding: 10px;
        font-size: 20px;
      }
      .chartCard {
        width: 100vw;
        height: calc(100vh - 40px);
        background: rgba(255, 26, 104, 0.2);
        display: flex;
        align-items: center;
        justify-content: center;
      }
      .chartBox {
        width: 700px;
        padding: 20px;
        border-radius: 20px;
        border: solid 3px rgba(255, 26, 104, 1);
        background: white;
      }
    </style>
  </head>
  <body>
    <div class="chartMenu">
      <p>WWW.CHARTJS3.COM (Chart JS 3.9.1)</p>
    </div>
    <div class="chartCard">
      <div class="chartBox">
        <canvas id="myChart"></canvas>
      </div>
    </div>

    <?php

    try{
      $sql = "SELECT * FROM web_base.visit_by";
      $result = $pdo->query($sql);
      if($result->rowCount() > 0) {

        while($row = $result->fetch()) {
          echo $row["v_date"];
        }
      unset($result);
    } else {
      echo "No records matching your query were found.";
    }
  } catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
  }

     ?>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
    /*const day = [
      { x: Date.parse('2022-08-25 00:00:00 GMT+0300'), y: 18 },
      { x: Date.parse('2022-08-26 00:00:00 GMT+0300'), y: 12 },
      { x: Date.parse('2022-08-27 00:00:00 GMT+0300'), y: 6 },
      { x: Date.parse('2022-08-28 00:00:00 GMT+0300'), y: 9 },
      { x: Date.parse('2022-08-29 00:00:00 GMT+0300'), y: 12 },
      { x: Date.parse('2022-08-30 00:00:00 GMT+0300'), y: 3 },
      { x: Date.parse('2022-08-31 00:00:00 GMT+0300'), y: 9 }
    ];

    const week = [
      { x: Date.parse('2022-08-21 00:00:00 GMT+0300'), y: 75 },
      { x: Date.parse('2022-08-28 00:00:00 GMT+0300'), y: 59 },
      { x: Date.parse('2022-09-4 00:00:00 GMT+0300'), y: 91 },
      { x: Date.parse('2022-09-11 00:00:00 GMT+0300'), y: 108 },
      { x: Date.parse('2022-09-18 00:00:00 GMT+0300'), y: 125 }
    ];

    const month = [
      { x: Date.parse('2022-05-01 00:00:00 GMT+0300'), y: 214 },
      { x: Date.parse('2022-06-01 00:00:00 GMT+0300'), y: 178 },
      { x: Date.parse('2022-07-01 00:00:00 GMT+0300'), y: 450},
      { x: Date.parse('2022-08-01 00:00:00 GMT+0300'), y: 541 },
      { x: Date.parse('2022-09-01 00:00:00 GMT+0300'), y: 320 }
    ];

    console.log(Date.parse('2022-08-25 00:00:00 GMT+0300'));*/
    // setup
    const data = {
      labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
      datasets: [{
        label: 'Weekly Sales',
        data: [18, 12, 6, 9, 12, 3, 9],
        backgroundColor: [
          'rgba(255, 26, 104, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)',
          'rgba(0, 0, 0, 0.2)'
        ],
        borderColor: [
          'rgba(255, 26, 104, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)',
          'rgba(0, 0, 0, 1)'
        ],
        borderWidth: 1
      }]
    };

    // config
    const config = {
      type: 'bar',
      data,
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    };

    // render init block
    const myChart = new Chart(
      document.getElementById('myChart'),
      config
    );

    /*function timeFrame(period){
      //console.log(period)
      console.log(period.value);
      if(period.value == 'day') {
        myChart.config.options.scales.x.time.unit = period.value;
        myChart.config.data.datasets[0].data = day;
      }
      if(period.value == 'week') {
        myChart.config.options.scales.x.time.unit = period.value;
        myChart.config.data.datasets[0].data = week;
      }
      if(period.value == 'month') {
        myChart.config.options.scales.x.time.unit = period.value;
        myChart.config.data.datasets[0].data = month;
      }
      myChart.update();
    }*/

    </script>

  </body>
</html>
<?php
    include_once 'footer.php';
?>
