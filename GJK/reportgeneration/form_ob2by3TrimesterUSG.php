<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
<style type="text/css">
.form-style-8{
	font-family: 'Open Sans Condensed', arial, sans;
	width: 800px;
	padding: 0px 30px;
  padding-bottom: 25px;
	background: #FFFFFF;
	margin: 50px auto;
	box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.22);
	-moz-box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.22);
	-webkit-box-shadow:  0px 0px 15px rgba(0, 0, 0, 0.22);

}
.form-style-8 h6{
	background: #4D4D4D;
	text-transform: uppercase;
  letter-spacing: 2px;
	font-family: 'Open Sans Condensed', sans-serif;
	color: #ffffff;
	font-size: 10px;
	font-weight: 100;

	padding: 6px;

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
	padding: 10px;
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
	padding: 3px 18px;
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
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "gjk";
$conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}//& password='$pass'
//random string or key for mapping report with patien headers
$n=10;
function getName($n,$con) {
 $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
 $randomString = '';

 for ($i = 0; $i < $n; $i++) {
   $index = rand(0, strlen($characters) - 1);
   $randomString .= $characters[$index];
 }


   $sql = "select * from patient_record_header where rkey= '$randomString' ";
   $result = $con->query($sql);
   if ($result->num_rows > 0) {
     return getName($n,$con);
  }else{
    return $randomString;
  }

}

$rkey = getName($n,$conn);//use this to store random report key

if(!isset($_SESSION)) {
  session_start();
}
if(session_id() != ''){
  $user = $_SESSION["username"];
}else {
  include'sessionerror.php';
}
 ?><table width="100%">
   <tr>
     <td>
       <div class="form-style-8 scroll" style="width: 90%;padding-top:0px;">
             <h6>Patient details</h6>
             <form method="post" action="action.php">
               <table>
                 <tr>
                   <td><input type="text" name="pname" placeholder="Patient Name" required /></td>
                   <td><input type="text" pattern="\d*" name="age" placeholder="Age" required maxlength="3"/></td>
                   <td><input type="text" name="referred" placeholder="Referred by" required /></td>
                 </tr>
                 <tr>
                   <td>&emsp;&emsp;&emsp;<b>Gender:</b></td>
                   <td colspan="2"><input type="radio" name="gender" value="female" checked> Female&emsp;&emsp;&emsp;<input type="radio" name="gender" value="male" > Male<br></td>
                 </tr>
                 <tr>
                   <td><input type="text" name="indication" placeholder="Indication" required /></td>
                   <td><b>Patient ID: <?php
                   $sn=0;
                   $sql="SELECT MAX(pid)as sno FROM patient_record_header";
                   $result = $conn->query($sql);
                   if ($result->num_rows > 0) {
                       if($row = $result->fetch_assoc()) {
                           $sn=$row["sno"];
                           echo $sn+1;
                     }
                   }
                    ?><input type="hidden" name="pid" value="<?php echo $sn+1; ?>"/></b></td>
                   <td><b>Study:</b>&emsp;&emsp;&emsp;Obstetrics<input type="hidden" name="study" value="Obstetrics"><input type="hidden" name="rkey" value="<?php echo $rkey; ?>"></td>
                 </tr>
               </table><br/><br/>
               <h6>OB 2/3 Trimester USG Form</h6>
               <table>
                 <tr>
                   <td align="right"><b>BPD: </b></td>
                   <td><input type="text"pattern="[+-]?[0-9]+(.[0-9]+)?([Ee][+-]?[0-9]+)?" placeholder="BPD" name="bpd" required/></td>
                   <td><input type="text" placeholder="D & WKS" name="bpdwd" required/></td>

                   <td align="right"><b>HC: </b></td>
                   <td><input type="text"pattern="[+-]?[0-9]+(.[0-9]+)?([Ee][+-]?[0-9]+)?" placeholder="HC" name="hc" required/></td>
                   <td><input type="text" placeholder="D & WKS" name="hcwd" required/></td>
                 </tr>
                 <tr>
                   <td align="right"><b>AC: </b></td>
                   <td><input type="text"pattern="[+-]?[0-9]+(.[0-9]+)?([Ee][+-]?[0-9]+)?" placeholder="AC" name="ac" required/></td>
                   <td><input type="text" placeholder="D & WKS" name="acwd" required/></td>

                   <td align="right"><b>FL: </b></td>
                   <td><input type="text" pattern="[+-]?[0-9]+(.[0-9]+)?([Ee][+-]?[0-9]+)?" placeholder="FL" name="fl" required/></td>
                   <td><input type="text" placeholder="D & WKS" name="flwd" required/></td>
                 </tr>

                 <tr>
                   <td align="right"><b>Placenta:</b></td>
                   <td><input type="text" name="placenta" required/></td>
                   <td align="right"><b>Liquor:</b></td>
                   <td> <input type="text" name="liquor" required/></td>
                   <td align="right"><b>AFI:</b></td>
                   <td><input type="text" name="afi" /></td>
                 </tr>

                  <tr>
                    <td align="right"><b>Fetal Heart Rate:</b></td>
                    <td><input type="text" name="fhr" required/></td>
                    <td align="right"><b>Fetal wt(gms):</b></td>
                    <td><input type="text" name="fwt" required/></td>
                    <td align="right"><b>Maternal info:</b></td>
                    <td><input type="text" name="minfo" required/></td>
                  </tr>
                  <tr>
                    <td colspan="2" align="right"><b> Cervical Length:</b></td>
                    <td colspan="2"><input type="text" name="cervical" required/></td>
                    <td></td><td></td>
                  </tr>
                  <tr>
                    <td colspan="2"><b>Gestational Age of:</b></td>
                    <td><input type="text" pattern="\d*" name="geswks" required/></td>
                    <td><b>weeks</b></td>
                    <td><input type="text" pattern="\d*" name="gesdays" required/></td>
                    <td><b>days</b></td>
                  </tr>
               </table><br/><br/>
               <br/>
               <input type="submit" name="obtwo" value="submit"/>
             </form>
             <form method="post" action="action.php">
               <input type="hidden" name="rtype" value="obtwo"/>
              <input type="hidden" name="attendant" value="<?php  if(!isset($_SESSION)) {session_start();}$user = $_SESSION["username"];echo $user;?>"/>
              <input style="position:absolute; top: 3%;right:200px;" type="submit" value="New" name="newrep"/>
             </form>
             <form method="post" action="undo.php">
              <input type="hidden" name="attendant" value="<?php  if(!isset($_SESSION)) {session_start();}$user = $_SESSION["username"];echo $user;?>"/>
              <input style="position:absolute; top: 3%;right:45px;" type="submit" value="undo changes" name="obtwo"/>
             </form>
           </div>
     </td>
   </tr>
 </table>


  </body>
</html>
