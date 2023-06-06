<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<div id="content"> 

<?php 
  $con = new mysqli('localhost','root','','slave');
  $query = $con->query("
    SELECT MONTHNAME(order_date_added) as monthname, COUNT(order_id) as orders FROM tbl_order GROUP BY monthname ORDER BY monthname
  ");

  $month = [];
  $orders = [];

  foreach($query as $data)
  {
    $month[] = $data['monthname'];
    $orders[] = $data['orders'];
  }

?>


<div style="width: 1000px; margin:auto;">
  <canvas id="myChart"></canvas>
</div>
</div>
 
<script>
  // === include 'setup' then 'config' above ===
  const labels = <?php echo json_encode($month) ?>;
  const data = {
    labels: labels,
    datasets: [{
      backgroundColor:'#063260;',  
      label: 'Monthly Sales',
      data: <?php echo json_encode($orders) ?>,
      borderColor: [
        'rgb(255, 99, 132)',
        'rgb(255, 159, 64)',
        'rgb(255, 205, 86)',
        'rgb(75, 192, 192)',
        'rgb(54, 162, 235)',
        'rgb(153, 102, 255)',
        'rgb(201, 203, 207)'
      ],
      borderWidth: 1
    }]
  };

  const config = {
    type: 'bar',
    data: data,
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    },
  };

  var myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>

</body>
</html>
