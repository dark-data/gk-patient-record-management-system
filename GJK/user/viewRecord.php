<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
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
if(isset($_POST['search'])){
  $s = $_post['pn'];
  $servername = "localhost";
  $dbusername = "root";
  $dbpassword = "";
  $dbname = "gjk";
  $conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);
  // Check connection
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }

  $sql="SELECT * FROM patient_record_header WHERE name like %'$s'%";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
      if($row = $result->fetch_assoc()) {
        echo $row['rkey'];
}else {
  echo "string";
}
}else {
  echo "string";
}

}elseif (isset($_POST['view'])) {
  $servername = "localhost";
  $dbusername = "root";
  $dbpassword = "";
  $dbname = "gjk";
  $conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);
  // Check connection
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }
  $sqstatusupdate="UPDATE patient_record_header SET status = 'Printed' WHERE attendedby = '$user' AND report_type = 'pelvis' AND status = 'notPrinted'";
  $sqlheader = "UPDATE patient_record_header SET status = 'notPrinted' WHERE rkey = '$rkey'";

  if ($conn->query($sqstatusupdate) === TRUE) {
    if ($conn->query($sqlheader) === TRUE) {
    }
  }
  mysqli_close($conn);
}

 ?>
  </body>
</html>

<?php


 ?>
