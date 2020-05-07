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
$query2 = "SELECT report_type, count(*) as number FROM patient_record_header GROUP BY report_type";
$resultchart = mysqli_query($conn, $query2);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <script type="text/javascript" src="pie.js"></script>
    <script type="text/javascript">
           google.charts.load('current', {'packages':['corechart']});
           google.charts.setOnLoadCallback(drawChart);
           function drawChart()
           {
                var data = google.visualization.arrayToDataTable([
                          ['Gender', 'Number'],
                          <?php
                          $rt="";
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
                      title: 'Reports Generated sofar',
                      //is3D:true,
                      pieHole: 0.4
                     };
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                chart.draw(data, options);
           }
           </script>
    <style>
#search{
  width: 30%;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  font-size: 16px;
  background-color: white;
  background-image: url('../images/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  padding: 12px 20px 12px 40px;
}
#search:focus {
  border: 3px solid #555;
  width: 50%;
}
.table {
  border-collapse: collapse;
  border-spacing: 0;

  border: 1px solid #ddd;
}

.th, .td {
  width:100px;
  text-align: left;
  padding: 8px;
}

.tr:nth-child(even){background-color: #f2f2f2}
</style>
  </head>
  <body>
    <form method="post" action="viewRecord.php">
      <input id="search" type="text" name="pn" placeholder="Search by patient name..">
<input type="submit" name="search" style="display:none;" value="search">
    </form>
<?php
if(!isset($_SESSION)) {
  session_start();
}
if(session_id() != ''){
  $user = $_SESSION["username"];
}else {
  include'sessionerror.php';
}
?>
<table>
  <tr>
    <td width="70%">


<?php
if(isset($_POST['search'])){
  $s = $_POST['pn'];
  $sql="SELECT * FROM patient_record_header WHERE name like '%$s%' ORDER BY pid DESC";
  $result = $conn->query($sql);
?>
<br/><br/><br/>
  <table class="table" align="center">
  <tr style="background:#a9c8e8;">
    <th class="th" style='width:30px;'><b>Sno</b></th>
    <th class="th" style='width:30px;'><b>pid</b></th>
    <th class="th"><b>patient name</b></th>
    <th class="th"><b>date</b></th>
    <th class="th"><b>Report Type</b></th>
    <th class="th"><b>action</b></th>

  </tr>
  </table>
  <div style="overflow-y:auto;height: 400px;">
  <table class="table" align="center">
<?php
  $i=1;
  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $rtype=$row['report_type'];
        if($rtype=="ogone"){
          $rtype = "obfirst";
        }
        echo "<tr><td class='td' style='width:30px;'>".$i."</td><td class='td' style='width:30px;'>".$row['pid']."</td><td class='td'>".$row['name']."</td><td class='td'>".$row['date']."</td><td class='td'>".$rtype."</td><td class='td'><form method='post' action='viewRecord.php'><input type='hidden' name='pid' value='".$row['pid']."'><input type='hidden' name='rkey' value='".$row['rkey']."'><input type='hidden' name='rtype'value='".$rtype."'><input type='submit' name='view' value='view'/></form></td></tr>";
        $i++;
      }
  }else{
    echo "string";
  }
}
?></table>
</div>
</td>
<td width="30%">
<div id="piechart" style="width: 900px; height: 500px;"></div>
</td>

</tr>

</table>
<?php
if (isset($_POST['view'])) {
  $pid="";
  $rkey="";
  $rtype="";
  $pid=$_POST['pid'];
  $rkey=$_POST['rkey'];
  $rtype = $_POST['rtype'];
  $servername = "localhost";
  $dbusername = "root";
  $dbpassword = "";
  $dbname = "gjk";
  $conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);
  // Check connection
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }if ($rtype=="obfirst"){
    $rtype="ogone";
  }
  $sqstatusupdate="UPDATE patient_record_header SET status = 'Printed' WHERE report_type = '$rtype' AND status = 'notPrinted'";
  $sqlheader = "UPDATE patient_record_header SET status = 'notPrinted' WHERE rkey = '$rkey' AND report_type = '$rtype'";

  if ($conn->query($sqstatusupdate) === TRUE) {
    if ($conn->query($sqlheader) === TRUE) {
      if($rtype == "ogone"){
        header("Location: ./report/OB_1st_TRIMESTER_USG_REPORT.php");
      }elseif ($rtype == "obtwo") {
        header("Location: ./report/ob_2BAR3_TRIMESTER_USG_REPORT.php");
      }elseif ($rtype == "pelvis") {
        header("Location: ./report/pelvis_scan_report.php");
      }elseif ($rtype == "pelvistwo") {
        header("Location: ./report/pelvis_scan_report2.php");
      }
    }
  }

}

 ?>
  </body>
</html>

<?php


 ?>
