
<html>
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
//use this to store random report key

if(!isset($_SESSION)) {
  session_start();
}
if(session_id() != ''){
  $user = $_SESSION["username"];
}else {
  include'sessionerror.php';
}
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

$rkey = getName($n,$conn);
$tmp = $rkey;
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
                   <td><b>Study:</b>&emsp;&emsp;&emsp;Gynaec<input type="hidden" name="study" value="gynaec"><input type="hidden" name="rkey" value="<?php echo $rkey; ?>"></td>
                 </tr>
               </table><br/><br/>
               <h6>Pelvis Scan Form</h6>
               <table>
                 <tr>
                   <td style="letter-spacing:2px;"><b>Sonography of Pelvis: </b></td>
                   <td style="letter-spacing:1px;">&emsp;<b><input type="checkbox" name="transAbdorminal" value="yes"/>Trans-Abdorminal</b></td>
                   <td style="letter-spacing:1px;">&emsp;<b><input type="checkbox" name="transVaginal" value="yes"/>Trans-Vaginal</b></td>
                 </tr><tr></tr>
                 <tr>
                   <td style="letter-spacing:2px;"><b>Uterus Appeared: </b></td>
                   <td style="letter-spacing:1px;">&emsp;<b><input type="radio" name="uterus" value="antiverted" checked/>antiverted</b></td>
                   <td style="letter-spacing:1px;">&emsp;<b><input type="radio" name="uterus" value="retroverted"/>retroverted</b></td>
                 </tr>
                 <tr>
                   <td><b>Uterus measured:</b></td>
                   <td><input type="text" name="um" value="0 X 0 X 0"/></td>
                   <td><b>cms</b></td>
                 </tr>
                 <tr>
                   <td style="letter-spacing:2px;"><b>Cavity Appeared: </b></td>
                   <td style="letter-spacing:1px;">&emsp;<b><input type="radio" name="cavity" value="normal" checked/>normal</b></td>
                   <td style="letter-spacing:1px;">&emsp;<b><input type="radio" name="cavity" value="abnormal"/>abnormal</b></td>
                 </tr>
                 <tr>
                   <td><b>Endometrial thickness:</b></td>
                   <td><input type="text" name="emt" pattern="[+-]?[0-9]+(.[0-9]+)?([Ee][+-]?[0-9]+)?" value=""/></td>
                   <td><b>cms</b></td>
                 </tr><tr>

                 </tr>
                 <tr>
                   <td><b>Right Ovary Measured:</b></td>
                   <td colspan="2"><input type="text" name="rom" value="0 X 0 X 0" placeholder="IN mm." value=""/></td>
                 </tr>
                 <tr>
                   <td style="letter-spacing:2px;"><b>Appeared: </b></td>
                   <td style="letter-spacing:1px;">&emsp;<b><input type="radio" name="ro" value="normal" checked/>normal</b></td>
                   <td style="letter-spacing:1px;">&emsp;<b><input type="radio" name="ro" value="abnormal"/>abnormal</b></td>
                 </tr>
                 <tr>
                   <td colspan="2"><input type="text" name="roacomment"/></td>
                 </tr>
                 <tr>
                   <td><b>Left Ovary Measured:</b></td>
                   <td colspan="2"><input type="text" name="lom" value="0 X 0 X 0" placeholder="IN mm." value=""/></td>
                 </tr>
                 <tr>
                   <td style="letter-spacing:2px;"><b>Appeared: </b></td>
                   <td style="letter-spacing:1px;">&emsp;<b><input type="radio" name="lo" value="normal" checked/>normal</b></td>
                   <td style="letter-spacing:1px;">&emsp;<b><input type="radio" name="lo" value="abnormal"/>abnormal</b></td>
                 </tr>
                 <tr>
                   <td colspan="2"><input type="text" name="loacomment"/></td>
                 </tr>
               </table>
               <table width="100%" style="border-collapse:collapse" border="1">
                 <tr>
                   <td rowspan="2" width="10%">Date</td><td rowspan="2">Day</td><td colspan="2" align="center">Dominant Follicle</td><td rowspan="2">Endometrial<br/>thickness</td>
                 </tr>
                 <tr>
                   <td align="center">Right ovary</td><td align="center">Left ovary</td>
                 </tr>
                 <tr>
                    <td><input type="date" name="date1"/></td>
                    <td><input type="text" pattern="[0-9]*" maxlength="3" name="day1"/></td>
                    <td><input type="text" name="ro1" maxlength="50"/></td>
                    <td><input type="text" name="lo1" maxlength="50"/></td>
                    <td><input type="text" name="emt" /></td>
                 </tr>
               </table><br/><br/>
               <h6>Impression</h6>
               <table width="100%">
                 <tr>
                   <td><input type="text" name="impression" placeholder="impression"/></td>
                 </tr>
               </table>
               <br/>
               <input type="submit" value="submit" name="newPelvis"/>
             </form>
             <form method="post" action="action.php">
               <input type="hidden" name="rtype" value="pelvis"/>
              <input type="hidden" name="attendant" value="<?php  if(!isset($_SESSION)) {session_start();}$user = $_SESSION["username"];echo $user;?>"/>
              <input style="position:absolute; top: 3%;right:200px;" type="submit" value="New" name="newrep"/>
             </form>
             <form method="post" action="undo.php">
              <input type="hidden" name="attendant" value="<?php  if(!isset($_SESSION)) {session_start();}$user = $_SESSION["username"];echo $user;?>"/>
              <input style="position:absolute; top: 3%;right:45px;" type="submit" value="undo changes" name="pelvis"/>
             </form>
           </div>
     </td>
   </tr>
 </table>


  </body>
</html>
