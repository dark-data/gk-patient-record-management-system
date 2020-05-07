<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $email = $_POST["mail"];
  $uname = $_POST["uname"];
  $pass = $_POST["pass"];
  $phone = $_POST["phone"];
  $dob = $_POST["dob"];
  $degree = $_POST["degree"];
  $address = $_POST["address"];
  $type = $_POST["type"];


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
$sql = "INSERT INTO user_account (username, type, password, fullname, address, email, phone, dob, degree ) VALUES('$uname','$type','$pass','$name','$address','$email','$phone',DATE '$dob','$degree')";
if ($conn->query($sql) === TRUE) {
  include 'accMgmt.php';
    echo "<h3 style='position: fixed; top:0;'>account created successfully</h3><br/>";
} else {include 'accMgmt.php';
    echo "Error in creating account : " . $conn->error;
}
}
?>
