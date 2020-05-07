<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "gjk";
$conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$query2 = "SELECT report_type, count(*) as number FROM patient_record_header WHERE date = CURDATE() GROUP BY report_type";
$resultchart = mysqli_query($conn, $query2);
?>

<head>
<link rel = "icon" type = "image/png" href = "images/logo.png" />
<title>G . K . Hospital</title>
<script type="text/javascript" src="pie.js"></script>
<script type="text/javascript">
       google.charts.load('current', {'packages':['corechart']});
       google.charts.setOnLoadCallback(drawChart);
       function drawChart()
       {
            var data = google.visualization.arrayToDataTable([
                      ['Gender', 'Number'],
                      <?php
                      while($row = mysqli_fetch_array($resultchart))
                      {
                        $rt = $row["report_type"];
                        if($rt =="ogone"){
                          $rt="OB First Trimester USG Report";
                        }elseif($rt =="obtwo"){
                          $rt="OB 2/3 Trimester USG Report";
                        }elseif($rt =="pelvis"){
                          $rt="Pelvis Scan Report";
                        }elseif($rt =="pelvistwo"){
                          $rt="Pelvis Scan Report(2)";
                        }
                           echo "['".$rt."', ".$row["number"]."],";
                      }
                      ?>
                 ]);
            var options = {
                  title: 'Today Reports Generated',
                  //is3D:true,
                  pieHole: 0.4
                 };
            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            chart.draw(data, options);
       }
       </script>
</head>
  <body background="../images/admin.jpg" style="background-size: 100%;background-repeat: no-repeat;">
    <div id="piechart" style="width: 720px; height: 500px;"></div>
  </body>
</html>
