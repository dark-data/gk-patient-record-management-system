<?php

if (isset($_POST['newPelvis'])){
  include 'form_new_pelvis.php';
}elseif (isset($_POST['date2'])){
  include 'pelvis_report_final.php';
  if(!isset($_SESSION)) {
      session_start();
    }
    $user = $_SESSION["username"];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "gjk";
    // Create connection

    //require 'dbcon.php';

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
       die("Connection failed: " . mysqli_connect_error());
    }//& password='$pass'
    $sql = "SELECT * FROM patient_record_header a, pelvis b WHERE a.attendedby= '$user' AND a.rkey = b.rkey AND b.date2 IS NULL AND b.date1 IS NOT NULL ORDER BY b.date2 ASC";
    $result = $conn->query($sql);

  ?>
  <!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
table {
  border-collapse: collapse;
  border-spacing: 0;

  border: 1px solid #ddd;
}

th, td {
  width:100px;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}
</style>
</head>
<body><br/><br/><br/><br/>
  <table align="center">
  <tr style="background:#a9c8e8;">
    <th style='width:30px;'><b>Sno</b></th>
    <th style='width:30px;'><b>pid</b></th>
    <th ><b>patient name</b></th>
    <th ><b>date</b></th>
    <th ><b>action</b></th>

  </tr>
</table>
<div style="overflow-y:auto;height: 230px;">
<table align="center"><?php
$i=1;
 if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      echo "<tr>          <td style='width:30px;'>".$i."</td><td style='width:30px;'>".$row['pid']."</td><td>".$row['name']."</td><td>".$row['date1']."</td><td><form method='post' action='pelvis_update.php'><input type='hidden' name='pid' value='".$row['pid']."'><input type='submit' name='date2' value='update record'></form></td>        </tr>";
    }
}else {
  echo $conn->error;
} ?>
</table>
</div>
</body>
</html>
  <?php
}elseif (isset($_POST['date3'])){
  include 'pelvis_report_final.php';
  if(!isset($_SESSION)) {
      session_start();
    }
    $user = $_SESSION["username"];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "gjk";
    // Create connection

    //require 'dbcon.php';

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
       die("Connection failed: " . mysqli_connect_error());
    }//& password='$pass'
    $sql = "SELECT * FROM patient_record_header a, pelvis b WHERE a.attendedby= '$user' AND a.rkey = b.rkey AND b.date2 IS NOT NULL AND b.date3 IS NULL ORDER BY b.date3 ASC";
    $result = $conn->query($sql);

  ?>
  <!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
table {
  border-collapse: collapse;
  border-spacing: 0;

  border: 1px solid #ddd;
}

th, td {
  width:100px;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}
</style>
</head>
<body><br/><br/><br/><br/>
  <table align="center">
  <tr style="background:#a9c8e8;">
    <th style='width:30px;'><b>Sno</b></th>
    <th style='width:30px;'><b>pid</b></th>
    <th ><b>patient name</b></th>
    <th ><b>date</b></th>
    <th ><b>action</b></th>

  </tr>
</table>
<div style="overflow-y:auto;height: 230px;">
<table align="center"><?php
$i=1;
 if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      echo "<tr>          <td style='width:30px;'>".$i."</td><td style='width:30px;'>".$row['pid']."</td><td>".$row['name']."</td><td>".$row['date1']."</td><td><form method='post' action='pelvis_update.php'><input type='hidden' name='pid' value='".$row['pid']."'><input type='submit' name='date3' value='update record'></form></td>        </tr>";
    }
}else {
  echo $conn->error;
} ?>
</table>
</div>
</body>
</html>
<?php
}elseif (isset($_POST['date4'])){

    include 'pelvis_report_final.php';
    if(!isset($_SESSION)) {
        session_start();
      }
      $user = $_SESSION["username"];
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "gjk";
      // Create connection

      //require 'dbcon.php';

      $conn = mysqli_connect($servername, $username, $password, $dbname);
      // Check connection
      if (!$conn) {
         die("Connection failed: " . mysqli_connect_error());
      }//& password='$pass'
      $sql = "SELECT * FROM patient_record_header a, pelvis b WHERE a.attendedby= '$user' AND a.rkey = b.rkey AND b.date3 IS NOT NULL AND b.date4 IS NULL ORDER BY b.date4 ASC";
      $result = $conn->query($sql);

    ?>
    <!DOCTYPE html>
  <html>
  <head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
  table {
    border-collapse: collapse;
    border-spacing: 0;

    border: 1px solid #ddd;
  }

  th, td {
    width:100px;
    text-align: left;
    padding: 8px;
  }

  tr:nth-child(even){background-color: #f2f2f2}
  </style>
  </head>
  <body><br/><br/><br/><br/>
    <table align="center">
    <tr style="background:#a9c8e8;">
      <th style='width:30px;'><b>Sno</b></th>
      <th style='width:30px;'><b>pid</b></th>
      <th ><b>patient name</b></th>
      <th ><b>date</b></th>
      <th ><b>action</b></th>

    </tr>
  </table>
  <div style="overflow-y:auto;height: 230px;">
  <table align="center"><?php
  $i=1;
   if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        echo "<tr>          <td style='width:30px;'>".$i."</td><td style='width:30px;'>".$row['pid']."</td><td>".$row['name']."</td><td>".$row['date1']."</td><td><form method='post' action='pelvis_update.php'><input type='hidden' name='pid' value='".$row['pid']."'><input type='submit' name='date4' value='update record'></form></td>        </tr>";
      }
  }else {
    echo $conn->error;
  } ?>
  </table>
  </div>
  </body>
  </html>
  <?php
}elseif (isset($_POST['final'])){

    include 'pelvis_report_final.php';
    if(!isset($_SESSION)) {
        session_start();
      }
      $user = $_SESSION["username"];
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "gjk";
      // Create connection

      //require 'dbcon.php';

      $conn = mysqli_connect($servername, $username, $password, $dbname);
      // Check connection
      if (!$conn) {
         die("Connection failed: " . mysqli_connect_error());
      }//& password='$pass'
      $sql = "SELECT * FROM patient_record_header a, pelvis b WHERE a.attendedby= '$user' AND a.rkey = b.rkey AND b.date3 IS NOT NULL AND b.date4 IS NOT NULL ORDER BY b.date4 ASC";
      $result = $conn->query($sql);

    ?>
    <!DOCTYPE html>
  <html>
  <head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
  table {
    border-collapse: collapse;
    border-spacing: 0;

    border: 1px solid #ddd;
  }

  th, td {
    width:100px;
    text-align: left;
    padding: 8px;
  }

  tr:nth-child(even){background-color: #f2f2f2}
  </style>
  </head>
  <body><br/><br/><br/><br/>
    <table align="center">
    <tr style="background:#a9c8e8;">
      <th style='width:30px;'><b>Sno</b></th>
      <th style='width:30px;'><b>pid</b></th>
      <th ><b>patient name</b></th>
      <th ><b>date</b></th>
      <th ><b>action</b></th>

    </tr>
  </table>
  <div style="overflow-y:auto;height: 230px;">
  <table align="center"><?php
  $i=1;
   if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        echo "<tr>          <td style='width:30px;'>".$i."</td><td style='width:30px;'>".$row['pid']."</td><td>".$row['name']."</td><td>".$row['date1']."</td><td><form method='post' action='pelvis_update.php'><input type='hidden' name='pid' value='".$row['pid']."'><input type='submit' name='final' value='update record'></form></td>        </tr>";
        $i=$i+1;
      }
  }else {
    echo $conn->error;
  } ?>
  </table>
  </div>
  </body>
  </html>
  <?php
}
?>
