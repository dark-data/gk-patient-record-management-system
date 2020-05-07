<?php
$col = $_POST["act"];
$value = $_POST["val"];
if(!isset($_SESSION))
    {
        session_start();
    }
if(session_id() != ''){
  $user = $_SESSION["username"];


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gjk";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}//& password='$pass'
$sql = "update user_account set $col= '$value' where username = '$user'";
if ($conn->query($sql) === TRUE) {
  include 'accMgmt.php';
    echo "<h3 style='position: fixed; top:0;'>Record updated successfully</h3><br/>";
} else {include 'accMgmt.php';
    echo "Error updating record: " . $conn->error;
}

}else{
  echo "string";
}
 ?>
