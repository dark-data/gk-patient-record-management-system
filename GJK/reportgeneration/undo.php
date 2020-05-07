<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gjk";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
}
if (isset($_POST['ogone'])){
  $attendant = $_POST['attendant'];
  $status  = "notPrinted";
  $rkey="";
  $sql2 = "SELECT * FROM patient_record_header WHERE attendedby='$attendant' AND status = '$status' AND report_type='ogone'";
  $result2 = $conn->query($sql2);
  if ($result2->num_rows > 0) {
      if($row2 = $result2->fetch_assoc()) {
        $rkey = $row2['rkey'];
      }
  }
  $sql = "DELETE FROM patient_record_header WHERE attendedby='$attendant' AND status = '$status' AND report_type='ogone'";
  $sql3 = "DELETE FROM obfirst WHERE rkey='$rkey'";
  if ($conn->query($sql) === TRUE && $conn->query($sql3) === TRUE) {
      echo "Record deleted successfully";
  } else {
      echo "Error deleting record: " . $conn->error;
  }
  include'form_obFirstTrimesterUSG.php';

  $conn->close();
}elseif (isset($_POST['obtwo'])){
  $attendant = $_POST['attendant'];
  $status  = "notPrinted";
  $rkey="";
  $sql2 = "select * from patient_record_header WHERE attendedby='$attendant' AND status = '$status' AND report_type='obtwo'";
  $result2 = $conn->query($sql2);
  if ($result2->num_rows > 0) {
      if($row2 = $result2->fetch_assoc()) {
        $rkey = $row2['rkey'];
      }
  }
  $sql = "DELETE FROM patient_record_header WHERE attendedby='$attendant' AND status = '$status' AND report_type='obtwo'";
  $sql3 = "DELETE FROM obtwo WHERE rkey='$rkey'";
  if ($conn->query($sql) === TRUE && $conn->query($sql3) === TRUE) {
      echo "Record deleted successfully";
  } else {
      echo "Error deleting record: " . $conn->error;
  }
  include'form_obFirstTrimesterUSG.php';

  $conn->close();
}
elseif (isset($_POST['pelvistwo'])){
  $attendant = $_POST['attendant'];
  $status  = "notPrinted";
  $rkey="";
  $sql2 = "select * from patient_record_header WHERE attendedby='$attendant' AND status = '$status' AND report_type='pelvistwo'";
  $result2 = $conn->query($sql2);
  if ($result2->num_rows > 0) {
      if($row2 = $result2->fetch_assoc()) {
        $rkey = $row2['rkey'];
      }
  }
  $sql = "DELETE FROM patient_record_header WHERE attendedby='$attendant' AND status = '$status' AND report_type='pelvistwo'";
  $sql3 = "DELETE FROM pelvistwo WHERE rkey='$rkey'";
  if ($conn->query($sql) === TRUE && $conn->query($sql3) === TRUE) {
      echo "Record deleted successfully";
  } else {
      echo "Error deleting record: " . $conn->error;
  }
  include'form_pelvis2.php';

  $conn->close();
}
elseif (isset($_POST['pelvis'])){
  $attendant = $_POST['attendant'];
  $status  = "notPrinted";
  $rkey="";
  $sql2 = "SELECT * FROM patient_record_header WHERE attendedby='$attendant' AND status = '$status' AND report_type='pelvis'";
  $result2 = $conn->query($sql2);
  if ($result2->num_rows > 0) {
      if($row2 = $result2->fetch_assoc()) {
        $rkey = $row2['rkey'];
      }
  }
  $sql = "DELETE FROM patient_record_header WHERE attendedby='$attendant' AND status = '$status' AND report_type='pelvis'";
  $sql3 = "DELETE FROM pelvis WHERE rkey='$rkey'";
  if ($conn->query($sql) === TRUE && $conn->query($sql3) === TRUE) {
      echo "Record deleted successfully";
  } else {
      echo "Error deleting record: " . $conn->error;
  }
  include'form_new_pelvis.php';

  $conn->close();
}
else {
  echo "string";
}
?>
