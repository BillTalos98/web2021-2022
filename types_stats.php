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
  <title>Document</title>
</head>

<body>

  <div style="width: 65%;">

    <canvas id="myChart2"></canvas>
    <canvas id="myChart3"></canvas>

  </div>

  <script>
    //window.onload = function graph(){

    var data2 = $.ajax({
      url: 'includes/selectDE.php',
      method: 'POST',
      dataType: 'json',
      success: function(data2) {}
    });
    data2.done(success2);
    console.log(data2)



    function success2(res) {
      let allStoreTypes = [];
      let storeType = []

      for (let i = 0; i < res.length; i++) {
        allStoreTypes.push(res[i].types);
        console.log(allStoreTypes);

        for (let j = i; j < allStoreTypes.length; j++) {
          const secondaryArray = allStoreTypes[j].split(",");
          console.log(secondaryArray)

          for (k = 0; k < secondaryArray.length; k++) {
            storeType.push(secondaryArray[k])
            console.log(storeType);


          }
          //console.log(allStoreTypes);
          //console.log(secondaryArray)

          console.log(storeType);

        }
      }

      const store_type = [...new Set(storeType)];
      console.log(store_type)

      const count = storeType.reduce((accumulator, value) => {
        return {
          ...accumulator,
          [value]: (accumulator[value] || 0) + 1
        };

      }, {});
      console.log(count);






      const ctx = document.getElementById('myChart2').getContext('2d');
      const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: [],
          datasets: [{
            label: '',
            data: count,
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
            borderWidth: 1
          }]
        }
      });

    }


    var data3 = $.ajax({
      url: 'includes/selectE.php',
      method: 'POST',
      dataType: 'json',
      success: function(data3) {}
    });
    data3.done(success3);
    console.log(data3)



    function success3(res) {
      let allStoreTypes = [];
      let storeType = []

      for (let i = 0; i < res.length; i++) {
        allStoreTypes.push(res[i].types);
        console.log(allStoreTypes);

        for (let j = i; j < allStoreTypes.length; j++) {
          const secondaryArray = allStoreTypes[j].split(",");
          console.log(secondaryArray)

          for (k = 0; k < secondaryArray.length; k++) {
            storeType.push(secondaryArray[k])
            console.log(storeType);


          }
          //console.log(allStoreTypes);
          //console.log(secondaryArray)

          console.log(storeType);

        }
      }

      const store_type = [...new Set(storeType)];
      console.log(store_type)

      const count1 = storeType.reduce((accumulator, value) => {
        return {
          ...accumulator,
          [value]: (accumulator[value] || 0) + 1
        };

      }, {});
      console.log(count1);






      const ctx = document.getElementById('myChart3').getContext('2d');
      const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: [],
          datasets: [{
            label: '',
            data: count1,
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
            borderWidth: 1
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
