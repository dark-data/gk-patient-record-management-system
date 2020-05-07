<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
<style type="text/css">
.form-style-8{
	font-family: 'Open Sans Condensed', arial, sans;
	width: 500px;
	padding: 30px;
	background: #FFFFFF;
	margin: 50px auto;
	box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.22);
	-moz-box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.22);
	-webkit-box-shadow:  0px 0px 15px rgba(0, 0, 0, 0.22);

}
.form-style-8 h2{
	background: #4D4D4D;
	text-transform: uppercase;
  letter-spacing: 2px;
	font-family: 'Open Sans Condensed', sans-serif;
	color: #797979;
	font-size: 18px;
	font-weight: 100;
	padding: 20px;
	margin: -30px -30px 30px -30px;
}
.form-style-8 input[type="text"],
.form-style-8 input[type="date"],
.form-style-8 input[type="email"],
.form-style-8 input[type="number"],
.form-style-8 input[type="tel"],
.form-style-8 input[type="url"],
.form-style-8 input[type="password"],
.form-style-8 textarea,
.form-style-8 select
{
	box-sizing: border-box;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	outline: none;
	display: block;
	width: 100%;
	padding: 7px;
	border: none;
	border-bottom: 1px solid #ddd;
	background: transparent;
	margin-bottom: 10px;
	font: 16px Arial, Helvetica, sans-serif;
	height: 45px;
}
.form-style-8 input[type="button"],
.form-style-8 input[type="submit"]{
	-moz-box-shadow: inset 0px 1px 0px 0px #45D6D6;
	-webkit-box-shadow: inset 0px 1px 0px 0px #45D6D6;
	box-shadow: inset 0px 1px 0px 0px #45D6D6;
	background-color: #2CBBBB;
	border: 1px solid #27A0A0;
	display: inline-block;
	cursor: pointer;
	color: #FFFFFF;
	font-family: 'Open Sans Condensed', sans-serif;
	font-size: 14px;
	padding: 8px 18px;
	text-decoration: none;
	text-transform: uppercase;
}
.form-style-8 input[type="button"]:hover,
.form-style-8 input[type="submit"]:hover {
	background:linear-gradient(to bottom, #34CACA 5%, #30C9C9 100%);
	background-color:#34CACA;
}
</style>
  </head>
  <body style="padding:0px;">
    <?php
$username="";
$password="";
$fullname="";
$address ="";
$email = "";
$phone="";
$degree="";
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "gjk";
$conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}//& password='$pass'
if(!isset($_SESSION)) {
  session_start();
}
    if(session_id() != ''){
      $user = $_SESSION["username"];

      $sql = "select * from user_account where username= '$user' ";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
          if($row = $result->fetch_assoc()) {
              $username=$row['username'];
              $password=$row["password"];
              $fullname = $row["fullname"];
              $address = $row["address"];
              $email = $row["email"];
              $phone= $row["phone"];
              $degree = $row["degree"];
            }
      }

}else {
  include'sessionerror.php';
}
 ?>
    <table width="100%">
      <tr style="padding-top:0px;">
        <td width="60%">
          <div class="form-style-8" style="padding-top:0px;"><br/>
            <h2>My Account</h2>
            <table width="100%">
            <tr>
              <form action="updateacc.php" method="post">
                <td><p style="letter-spacing: 4px; font-size: 20px; color: #434445;">username</p></td>
                <td>
                  <input type="text" name="val" placeholder="Username" value="<?php echo $username; ?>" required/>
                  <input type="hidden" name="act" value="username"/>
                </td>
                <td><input type="submit" name="type" value="modify"/></td>
              </form>
            </tr>
            <tr>
              <form action="updateacc.php" method="post">
                <td><p style="letter-spacing: 4px; font-size: 20px; color: #434445;">Password</p></td>
                <td>
                  <input type="password" name="val" placeholder="Password" value="<?php echo $password; ?>" required/>
                  <input type="hidden" name="act" value="password"/>
                </td>
                <td><input type="submit" name="type" value="modify"/></td>
              </form>
            </tr>
            <tr>
              <form action="updateacc.php" method="post">
                <td><p style="letter-spacing: 4px; font-size: 20px; color: #434445;">Full Name</p></td>
                <td>
                  <input type="text" name="val" placeholder="Fullname" value="<?php echo $fullname; ?>" required/>
                  <input type="hidden" name="act" value="fullname"/>
                </td>
                <td><input type="submit" name="type" value="modify"/></td>
              </form>
            </tr>
            <tr>

                <td><p style="letter-spacing: 4px; font-size: 20px; color: #434445;">E-mail</p></td>
                <td>
                  <input type="email" name="val" placeholder="e-mail Id" value="<?php echo $email; ?>" readonly/>
                </td>
                <td></td>

            </tr>
            <tr>

                <td><p style="letter-spacing: 4px; font-size: 20px; color: #434445;">Phone no</p></td>
                <td>
                  <input type="tel" pattern="[0-9]{10}" name="val" placeholder="Phone Number" value="<?php echo $phone; ?>" readonly/>
                </td>
                <td></td>
            
            </tr>
            <tr>
              <form action="updateacc.php" method="post">
                <td><p style="letter-spacing: 4px; font-size: 20px; color: #434445;">Degree</p></td>
                <td>
                  <input type="text" name="val" placeholder="Degree" value="<?php echo $degree; ?>"required/>
                  <input type="hidden" name="act" value="degree"/>
                </td>
                <td><input type="submit" name="type" value="modify"/></td>
              </form>
            </tr>
            <tr>
              <form action="updateacc.php" method="post">
                <td><p style="letter-spacing: 4px; font-size: 20px; color: #434445;">Address</p></td>
                <td>
                  <textarea style="" name="val" placeholder="Address" required> <?php echo $address; ?> </textarea>
                  <input type="hidden" name="act" value="address"/>
                </td>
                <td><input type="submit" name="type" value="modify"/></td>
              </form>
            </tr>
            </table>
            </div>
        </td>
        <td style="padding-top: 0px;">
        </td>
      </tr>
    </table>
  </body>
</html>
