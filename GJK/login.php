<?php
// to be completed
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $uname = $_POST["uname"];
  $pass = $_POST["psw"];

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

//require 'dbcon.php';

$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}//& password='$pass'

$sql = "select * from user_account where username= '$uname' ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    if($row = $result->fetch_assoc()) {
        $type=$row['type'];
        $x=$row["password"];
		if($x == $pass){
      if($type=='admin'){
        session_start();

// Storing session data
$_SESSION["username"] = $uname;
$_SESSION["type"] = "admin";
        include'admin/admin.php';

      }elseif ($type=='normal') {
        // code...date_default_timezone_set("Asia/Calcutta"); $datew="hour minute : ";
        $hourMin = date('h:i');
        $dte=date('Y-m-d');
        $sql = "INSERT INTO log (user, time, date, type)VALUES ('$uname',NOW(),DATE '$dte','$type')";
        if (mysqli_query($conn, $sql)) {
          session_start();

  // Storing session data
  $_SESSION["username"] = $uname;
  $_SESSION["type"] = "normal";
          include'user/user.php';
        } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
      }
		}
		else{
			include'index.php';
			echo'<div class="footer"> Password incorrect </div>';
		}
	}
}
else{
		include'index.php';
  		echo'<div class="footer">   <strong>    Error!    </strong>    invalid password     </div>';
}

mysqli_close($conn);

}else{
  include'sessionerror.php';
}
?>
