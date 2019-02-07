<?php
// database connection
$serverName="*YOUR HOST*";
$dbusername="*YOUR DATABASE USERNAME*";
$dbpassword="*YOUR DATABASE PASSWORD*";
$dbname="*YOUR DATABASE NAME*";

$conn = mysqli_connect($serverName, $dbusername, $dbpassword, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="The stats of my avocado plant">
    <meta name="author" content="Me">
    <link rel="shortcut icon" type="image/ico" href="favicon.ico"/>

    <title>Avocado Plant Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
  </head>

  <body>
        <main role="main" class=" pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Avocado Plant Dashboard</h1>
            <p>I made this dashboard to keep track of my avocado plant.<br>The stats are updated to a database locally, no login here.</p>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
                <button class="btn btn-sm btn-outline-secondary">Share</button>
                <button class="btn btn-sm btn-outline-secondary">Export</button>
              </div>
              <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
              </button>
            </div>
          </div>

          <canvas class="my-4" id="lineChart" width="900" height="380"></canvas><br>

          <?php
                $sql="SELECT * FROM PlantDAT ORDER BY date DESC";
                $result = mysqli_query($conn, $sql);
          ?>		
          <h2>Plant Information</h2>
          <p>This tables shows the date, description, plant growth (in cm) and the amount of water it absorbed.</p>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>Date</th>
                  <th>Description</th>
                  <th>Plant (cm)</th>
                  <th>Water (cm)</th>
                </tr>
              </thead>
              <tbody>
              <?php while($rws=  mysqli_fetch_array($result)){
                echo "<tr>";
                echo "<td>".$rws[1]."</td>";
                echo "<td>".$rws[2]."</td>";
                echo "<td>".$rws[4]."</td>";
                echo "<td>".$rws[3]."</td>";
                echo "</tr>";
                } ?>
              </tbody>
            </table>
          </div>

    <?php 
    // Get the 'water (cm)' from database to chart
            $query="SELECT GROUP_CONCAT(`water (cm)` SEPARATOR ', ') FROM PlantDAT ORDER BY date";
            $result = mysqli_query($conn, $query);
            foreach($result as $category) { }
    
            $res_arr = implode(',',$category);
            //print_r($res_arr);
            
    // Get the 'plant (cm)' from database to chart
            $query2="SELECT GROUP_CONCAT(`plant (cm)` SEPARATOR ', ') FROM PlantDAT ORDER BY date";
            $result2 = mysqli_query($conn, $query2);
            foreach($result2 as $category2) { }
    
            $res_arr2 = implode(',',$category2);
            //print_r($res_arr2);
            
    // Get the dates from database to chart
            $query3="SELECT GROUP_CONCAT(`date` SEPARATOR '`, `') FROM PlantDAT";
            $result3 = mysqli_query($conn, $query3);
            foreach($result3 as $category3) { }
    
            $res_arr3 = implode(',',$category3);
            //print_r($res_arr3);
    ?>
    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>

    <!-- Graphs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script>
  //line
  var ctxL = document.getElementById("lineChart").getContext('2d');
  var myLineChart = new Chart(ctxL, {
    type: 'line',
    data: {
      labels: [` <?php print_r($res_arr3); ?>`],
      datasets: [{
          label: "Water absorbed (cm)",
          data: [<?php print_r($res_arr); ?>],
          backgroundColor: [
            'rgba(105, 0, 132, .2)',
          ],
          borderColor: [
            'rgba(200, 99, 132, .7)',
          ],
          borderWidth: 2
        },
        {
          label: "Plant growth (cm)",
          data: [<?php print_r($res_arr2); ?>],
          backgroundColor: [
            'rgba(0, 137, 132, .2)',
          ],
          borderColor: [
            'rgba(0, 10, 130, .7)',
          ],
          borderWidth: 2
        }
      ]
    },
    options: {
      responsive: true
    }
  });


</script>
  </body>
</html>
