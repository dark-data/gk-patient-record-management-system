
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
<?php //date2 updation
if (isset($_POST['date2'])){
?>
  <body style="padding:0px;">
    <?php

    $pid = $_POST['pid'];
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
$pname="";
$age="";
$referred="";
$gender="";
$indiction="";
$tabdominal="";
$tvaginal="";
$uappear="";
$umeasure="";
$cavity="";
$emt="";
$rom="";
$ro="";
$roc="";
$lom="";
$lo="";
$loc="";
$impression="";
$dte1="";
$day1="";
$ro1="";
$lo1="";
$emt1="";
$rkey="";
$sql="SELECT * FROM patient_record_header WHERE pid='$pid'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    if($row = $result->fetch_assoc()) {
      $pname=$row["name"];
      $rkey=$row["rkey"];
      $age=$row["age"];
      $gender=$row["gender"];
      $referred=$row["referredby"];
      $indiction=$row["indication"];
  }
}
$sql2="SELECT * FROM pelvis WHERE rkey='$rkey'";
$result1 = $conn->query($sql2);
if ($result1->num_rows > 0) {
    if($row1 = $result1->fetch_assoc()) {
      $tvaginal=$row1["tvaginal"];
      $tabdominal=$row1["tabdominal"];
      $uappear=$row1["uterus_appeared"];
      $umeasure=$row1["uterus_measure"];
      $cavity=$row1["cavity"];
      $rom=$row1["ro_measure"];
      $ro=$row1["ro_appear"];
      $roc=$row1["ro_comment"];
      $lom=$row1["lo_mesure"];
      $lo=$row1["lo_appear"];
      $loc=$row1["lo_comment"];
      $impression=$row1["impression"];

      $dte1=$row1["date1"];
      $day1=$row1["day1"];
      $ro1=$row1["ro1"];
      $lo1=$row1["lo1"];
      $emt1=$row1["et1"];
  }
}
 ?><table width="100%">
   <tr>
     <td>
       <div class="form-style-8 scroll" style="width: 90%;padding-top:0px;">
             <h6>Patient details</h6>
             <form method="post" action="action.php">
               <table>
                 <tr>
                   <td><input type="text" name="pname" placeholder="Patient Name" value="<?php echo $pname; ?>"required readonly/></td>
                   <td><input type="text" pattern="\d*" name="age" placeholder="Age" required maxlength="3" value="<?php echo $age; ?>" readonly/></td>
                   <td><input type="text" name="referred" placeholder="Referred by" value="<?php echo $referred; ?>" required readonly/></td>
                 </tr>
                 <tr>
                   <td>&emsp;&emsp;&emsp;<b>Gender:</b></td>
                   <td colspan="2"><input type="radio" name="gender" value="female" <?php if($gender == "female"){echo "checked";} ?> > Female&emsp;&emsp;&emsp;<input type="radio" name="gender" value="male" <?php if($gender == "male"){echo "checked";} ?>> Male<br></td>
                 </tr>
                 <tr>
                   <td><input type="text" name="indication" placeholder="Indication" value="<?php echo $indiction; ?>" required /></td>
                   <td><b>Patient ID:<?php  ?>

                    <input type="hidden" name="pid" value="<?php echo $pid; ?>"/></b></td>
                   <td><b>Study:</b>&emsp;&emsp;&emsp;Gynaec<input type="hidden" name="study" value="gynaec"><input type="hidden" name="rkey" value="<?php echo $rkey; ?>" ></td>
                 </tr>
               </table><br/><br/>
               <h6>Pelvis Scan Form</h6>
               <table>
                 <tr>
                   <td style="letter-spacing:2px;"><b>Sonography of Pelvis: </b></td>
                   <td style="letter-spacing:1px;">&emsp;<b><input type="checkbox" name="transAbdorminal" value="yes" <?php if ($tabdominal == "yes") {echo "checked";} ?>/>Trans-Abdorminal</b></td>
                   <td style="letter-spacing:1px;">&emsp;<b><input type="checkbox" name="transVaginal" value="yes" <?php if($tvaginal == "yes"){echo "checked";} ?>/>Trans-Vaginal</b></td>
                 </tr><tr></tr>
                 <tr>
                   <td style="letter-spacing:2px;"><b>Uterus Appeared: </b></td>
                   <td style="letter-spacing:1px;">&emsp;<b><input type="radio" name="uterus" value="antiverted" <?php if($uappear == "antiverted"){echo "checked";} ?>/>antiverted</b></td>
                   <td style="letter-spacing:1px;">&emsp;<b><input type="radio" name="uterus" value="retroverted" <?php if($uappear == "retroverted"){echo "checked";} ?>/>retroverted</b></td>
                 </tr>
                 <tr>
                   <td><b>Uterus measured:</b></td>
                   <td><input type="text" name="um" value="<?php echo $umeasure; ?>" readonly/></td>
                   <td><b>cms</b></td>
                 </tr>
                 <tr>
                   <td style="letter-spacing:2px;"><b>Cavity Appeared: </b></td>
                   <td style="letter-spacing:1px;">&emsp;<b><input type="radio" name="cavity" value="normal" <?php if($cavity == "normal"){echo "checked";} ?>/>normal</b></td>
                   <td style="letter-spacing:1px;">&emsp;<b><input type="radio" name="cavity" value="abnormal" <?php if($cavity == "abnormal"){echo "checked";} ?>/>abnormal</b></td>
                 </tr>
                 <tr>

                 </tr>
                 <tr>
                   <td><b>Right Ovary Measured:</b></td>
                   <td colspan="2"><input type="text" name="rom" value="<?php echo $rom; ?>" placeholder="IN mm." readonly/></td>
                 </tr>
                 <tr>
                   <td style="letter-spacing:2px;"><b>Appeared: </b></td>
                   <td style="letter-spacing:1px;">&emsp;<b><input type="radio" name="ro" value="normal" <?php if($ro == "normal"){echo "checked";} ?>/>normal</b></td>
                   <td style="letter-spacing:1px;">&emsp;<b><input type="radio" name="ro" value="abnormal"<?php if($ro == "abnormal"){echo "checked";} ?>/>abnormal</b></td>
                 </tr>
                 <tr>
                   <td colspan="2"><input type="text" name="roacomment" value="<?php echo $roc; ?>" readonly/></td>
                 </tr>
                 <tr>
                   <td><b>Left Ovary Measured:</b></td>
                   <td colspan="2"><input type="text" name="lom" value="0 X 0 X 0" placeholder="IN mm." value=" <?php echo $lom; ?>"/></td>
                 </tr>
                 <tr>
                   <td style="letter-spacing:2px;"><b>Appeared: </b></td>
                   <td style="letter-spacing:1px;">&emsp;<b><input type="radio" name="lo" value="normal" <?php if($lo == "normal"){echo "checked";} ?>/>normal</b></td>
                   <td style="letter-spacing:1px;">&emsp;<b><input type="radio" name="lo" value="abnormal" <?php if($lo == "abnormal"){echo "checked";} ?>/>abnormal</b></td>
                 </tr>
                 <tr>
                   <td colspan="2"><input type="text" name="loacomment" value="<?php echo $loc; ?>" readonly/></td>
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
                    <td><input type="date" name="date1" value="<?php echo $dte1; ?>" readonly/></td>
                    <td><input type="text" pattern="[0-9]*" maxlength="3" name="day1" value="<?php echo $day1; ?>" readonly/></td>
                    <td><input type="text" name="ro1" maxlength="50" value="<?php echo $ro1; ?>" readonly/></td>
                    <td><input type="text" name="lo1" maxlength="50"value="<?php echo $lo1; ?>" readonly/></td>
                    <td><input type="text" name="emt1" value="<?php echo $emt1; ?>" readonly/></td>
                 </tr>
                 <tr>
                    <td><input type="date" name="date2" value="" autofocus required/></td>
                    <td><input type="text" pattern="[0-9]*" maxlength="3" name="day2" value="" required/></td>
                    <td><input type="text" name="ro2" maxlength="50" value="" required/></td>
                    <td><input type="text" name="lo2" maxlength="50"value="" required/></td>
                    <td><input type="text" name="emt2" value=""/></td>
                 </tr>
               </table><br/><br/>
               <h6>Impression</h6>
               <table width="100%">
                 <tr>
                   <td><input type="text" name="impression" placeholder="impression" value="<?php echo $impression; ?>"/></td>
                 </tr>
               </table>
               <br/>
               <input type="submit" value="submit" name="pelvisdate2"/>
             </form>

             <form method="post" action="undo.php">
              <input type="hidden" name="rkey" value="<?php  echo $rkey;?>"/>
              <input style="position:absolute; top: 3%;right:45px;" type="submit" value="undo changes" name="pelvisdate2"/>
             </form>
           </div>
     </td>
   </tr>
 </table>
</body>
<?php }

elseif (isset($_POST['date3'])){


   ?>
  <body style="padding:0px;">
    <?php

    $pid = $_POST['pid'];
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
$pname="";
$age="";
$referred="";
$gender="";
$indiction="";
$tabdominal="";
$tvaginal="";
$uappear="";
$umeasure="";
$cavity="";
$emt="";
$rom="";
$ro="";
$roc="";
$lom="";
$lo="";
$loc="";
$impression="";
$dte1="";
$day1="";
$ro1="";
$lo1="";
$emt1="";
$dte2="";
$day2="";
$ro2="";
$lo2="";
$emt2="";
$rkey="";
$sql="SELECT * FROM patient_record_header WHERE pid='$pid'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    if($row = $result->fetch_assoc()) {
      $pname=$row["name"];
      $rkey=$row["rkey"];
      $age=$row["age"];
      $gender=$row["gender"];
      $referred=$row["referredby"];
      $indiction=$row["indication"];
  }
}
$sql2="SELECT * FROM pelvis WHERE rkey='$rkey'";
$result1 = $conn->query($sql2);
if ($result1->num_rows > 0) {
    if($row1 = $result1->fetch_assoc()) {
      $tvaginal=$row1["tvaginal"];
      $tabdominal=$row1["tabdominal"];
      $uappear=$row1["uterus_appeared"];
      $umeasure=$row1["uterus_measure"];
      $cavity=$row1["cavity"];
      $rom=$row1["ro_measure"];
      $ro=$row1["ro_appear"];
      $roc=$row1["ro_comment"];
      $lom=$row1["lo_mesure"];
      $lo=$row1["lo_appear"];
      $loc=$row1["lo_comment"];
      $impression=$row1["impression"];

      $dte1=$row1["date1"];
      $day1=$row1["day1"];
      $ro1=$row1["ro1"];
      $lo1=$row1["lo1"];
      $emt1=$row1["et1"];

      $dte2=$row1["date2"];
      $day2=$row1["day2"];
      $ro2=$row1["ro2"];
      $lo2=$row1["lo2"];
      $emt2=$row1["et2"];
  }
}
 ?><table width="100%">
   <tr>
     <td>
       <div class="form-style-8 scroll" style="width: 90%;padding-top:0px;">
             <h6>Patient details</h6>
             <form method="post" action="action.php">
               <table>
                 <tr>
                   <td><input type="text" name="pname" placeholder="Patient Name" value="<?php echo $pname; ?>"required readonly/></td>
                   <td><input type="text" pattern="\d*" name="age" placeholder="Age" required maxlength="3" value="<?php echo $age; ?>" readonly/></td>
                   <td><input type="text" name="referred" placeholder="Referred by" value="<?php echo $referred; ?>" required readonly/></td>
                 </tr>
                 <tr>
                   <td>&emsp;&emsp;&emsp;<b>Gender:</b></td>
                   <td colspan="2"><input type="radio" name="gender" value="female" <?php if($gender == "female"){echo "checked";} ?> > Female&emsp;&emsp;&emsp;<input type="radio" name="gender" value="male" <?php if($gender == "male"){echo "checked";} ?>> Male<br></td>
                 </tr>
                 <tr>
                   <td><input type="text" name="indication" placeholder="Indication" value="<?php echo $indiction; ?>" required /></td>
                   <td><b>Patient ID:<?php  ?>

                    <input type="hidden" name="pid" value="<?php echo $pid; ?>"/></b></td>
                   <td><b>Study:</b>&emsp;&emsp;&emsp;Gynaec<input type="hidden" name="study" value="gynaec"><input type="hidden" name="rkey" value="<?php echo $rkey; ?>" ></td>
                 </tr>
               </table><br/><br/>
               <h6>Pelvis Scan Form</h6>
               <table>
                 <tr>
                   <td style="letter-spacing:2px;"><b>Sonography of Pelvis: </b></td>
                   <td style="letter-spacing:1px;">&emsp;<b><input type="checkbox" name="transAbdorminal" value="yes" <?php if ($tabdominal == "yes") {echo "checked";} ?>/>Trans-Abdorminal</b></td>
                   <td style="letter-spacing:1px;">&emsp;<b><input type="checkbox" name="transVaginal" value="yes" <?php if($tvaginal == "yes"){echo "checked";} ?>/>Trans-Vaginal</b></td>
                 </tr><tr></tr>
                 <tr>
                   <td style="letter-spacing:2px;"><b>Uterus Appeared: </b></td>
                   <td style="letter-spacing:1px;">&emsp;<b><input type="radio" name="uterus" value="antiverted" <?php if($uappear == "antiverted"){echo "checked";} ?>/>antiverted</b></td>
                   <td style="letter-spacing:1px;">&emsp;<b><input type="radio" name="uterus" value="retroverted" <?php if($uappear == "retroverted"){echo "checked";} ?>/>retroverted</b></td>
                 </tr>
                 <tr>
                   <td><b>Uterus measured:</b></td>
                   <td><input type="text" name="um" value="<?php echo $umeasure; ?>" readonly/></td>
                   <td><b>cms</b></td>
                 </tr>
                 <tr>
                   <td style="letter-spacing:2px;"><b>Cavity Appeared: </b></td>
                   <td style="letter-spacing:1px;">&emsp;<b><input type="radio" name="cavity" value="normal" <?php if($cavity == "normal"){echo "checked";} ?>/>normal</b></td>
                   <td style="letter-spacing:1px;">&emsp;<b><input type="radio" name="cavity" value="abnormal" <?php if($cavity == "abnormal"){echo "checked";} ?>/>abnormal</b></td>
                 </tr>
                 <tr>

                 </tr>
                 <tr>
                   <td><b>Right Ovary Measured:</b></td>
                   <td colspan="2"><input type="text" name="rom" value="<?php echo $rom; ?>" placeholder="IN mm." readonly/></td>
                 </tr>
                 <tr>
                   <td style="letter-spacing:2px;"><b>Appeared: </b></td>
                   <td style="letter-spacing:1px;">&emsp;<b><input type="radio" name="ro" value="normal" <?php if($ro == "normal"){echo "checked";} ?>/>normal</b></td>
                   <td style="letter-spacing:1px;">&emsp;<b><input type="radio" name="ro" value="abnormal"<?php if($ro == "abnormal"){echo "checked";} ?>/>abnormal</b></td>
                 </tr>
                 <tr>
                   <td colspan="2"><input type="text" name="roacomment" value="<?php echo $roc; ?>" readonly/></td>
                 </tr>
                 <tr>
                   <td><b>Left Ovary Measured:</b></td>
                   <td colspan="2"><input type="text" name="lom" value="0 X 0 X 0" placeholder="IN mm." value=" <?php echo $lom; ?>"/></td>
                 </tr>
                 <tr>
                   <td style="letter-spacing:2px;"><b>Appeared: </b></td>
                   <td style="letter-spacing:1px;">&emsp;<b><input type="radio" name="lo" value="normal" <?php if($lo == "normal"){echo "checked";} ?>/>normal</b></td>
                   <td style="letter-spacing:1px;">&emsp;<b><input type="radio" name="lo" value="abnormal" <?php if($lo == "abnormal"){echo "checked";} ?>/>abnormal</b></td>
                 </tr>
                 <tr>
                   <td colspan="2"><input type="text" name="loacomment" value="<?php echo $loc; ?>" readonly/></td>
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
                    <td><input type="date" name="date1" value="<?php echo $dte1; ?>" readonly/></td>
                    <td><input type="text" pattern="[0-9]*" maxlength="3" name="day1" value="<?php echo $day1; ?>" readonly/></td>
                    <td><input type="text" name="ro1" maxlength="50" value="<?php echo $ro1; ?>" readonly/></td>
                    <td><input type="text" name="lo1" maxlength="50"value="<?php echo $lo1; ?>" readonly/></td>
                    <td><input type="text" name="emt1" value="<?php echo $emt1; ?>" readonly/></td>
                 </tr>
                 <tr>
                    <td><input type="date" name="date2" value="<?php echo $dte2; ?>" autofocus="true" readonly/></td>
                    <td><input type="text" pattern="[0-9]*" maxlength="3" name="day2" value="<?php echo $day2; ?>" readonly/></td>
                    <td><input type="text" name="ro2" maxlength="50" value="<?php echo $ro2; ?>"readonly/></td>
                    <td><input type="text" name="lo2" maxlength="50"value="<?php echo $lo2; ?>"readonly/></td>
                    <td><input type="text" name="emt2" value="<?php echo $emt2; ?>"readonly/></td>
                 </tr>
                 <tr>
                    <td><input type="date" name="date3" value="" autofocus="true" required/></td>
                    <td><input type="text" pattern="[0-9]*" maxlength="3" name="day3" value="" required/></td>
                    <td><input type="text" name="ro3" maxlength="50" value="" required/></td>
                    <td><input type="text" name="lo3" maxlength="50"value="" required/></td>
                    <td><input type="text" name="emt3" value="" required/></td>
                 </tr>
               </table><br/><br/>
               <h6>Impression</h6>
               <table width="100%">
                 <tr>
                   <td><input type="text" name="impression" placeholder="impression" value="<?php echo $impression; ?>"/></td>
                 </tr>
               </table>
               <br/>
               <input type="submit" value="submit" name="pelvisdate3"/>
             </form>

             <form method="post" action="undo.php">
              <input type="hidden" name="rkey" value="<?php  echo $rkey;?>"/>
              <input style="position:absolute; top: 3%;right:45px;" type="submit" value="undo changes" name="pelvisdate2"/>
             </form>
           </div>
     </td>
   </tr>
 </table>
</body>
<?php }elseif (isset($_POST['date4'])){ ?>
  <body style="padding:0px;">
    <?php

    $pid = $_POST['pid'];
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
$pname="";
$age="";
$referred="";
$gender="";
$indiction="";
$tabdominal="";
$tvaginal="";
$uappear="";
$umeasure="";
$cavity="";
$emt="";
$rom="";
$ro="";
$roc="";
$lom="";
$lo="";
$loc="";
$impression="";
$dte1="";
$day1="";
$ro1="";
$lo1="";
$emt1="";
$dte2="";
$day2="";
$ro2="";
$lo2="";
$emt2="";
$dte3="";
$day3="";
$ro3="";
$lo3="";
$emt3="";
$rkey="";
$sql="SELECT * FROM patient_record_header WHERE pid='$pid'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    if($row = $result->fetch_assoc()) {
      $pname=$row["name"];
      $rkey=$row["rkey"];
      $age=$row["age"];
      $gender=$row["gender"];
      $referred=$row["referredby"];
      $indiction=$row["indication"];
  }
}
$sql2="SELECT * FROM pelvis WHERE rkey='$rkey'";
$result1 = $conn->query($sql2);
if ($result1->num_rows > 0) {
    if($row1 = $result1->fetch_assoc()) {
      $tvaginal=$row1["tvaginal"];
      $tabdominal=$row1["tabdominal"];
      $uappear=$row1["uterus_appeared"];
      $umeasure=$row1["uterus_measure"];
      $cavity=$row1["cavity"];
      $rom=$row1["ro_measure"];
      $ro=$row1["ro_appear"];
      $roc=$row1["ro_comment"];
      $lom=$row1["lo_mesure"];
      $lo=$row1["lo_appear"];
      $loc=$row1["lo_comment"];
      $impression=$row1["impression"];

      $dte1=$row1["date1"];
      $day1=$row1["day1"];
      $ro1=$row1["ro1"];
      $lo1=$row1["lo1"];
      $emt1=$row1["et1"];

      $dte2=$row1["date2"];
      $day2=$row1["day2"];
      $ro2=$row1["ro2"];
      $lo2=$row1["lo2"];
      $emt2=$row1["et2"];

      $dte3=$row1["date3"];
      $day3=$row1["day3"];
      $ro3=$row1["ro3"];
      $lo3=$row1["lo3"];
      $emt3=$row1["et3"];
  }
}
 ?><table width="100%">
   <tr>
     <td>
       <div class="form-style-8 scroll" style="width: 90%;padding-top:0px;">
             <h6>Patient details</h6>
             <form method="post" action="action.php">
               <table>
                 <tr>
                   <td><input type="text" name="pname" placeholder="Patient Name" value="<?php echo $pname; ?>"required readonly/></td>
                   <td><input type="text" pattern="\d*" name="age" placeholder="Age" required maxlength="3" value="<?php echo $age; ?>" readonly/></td>
                   <td><input type="text" name="referred" placeholder="Referred by" value="<?php echo $referred; ?>" required readonly/></td>
                 </tr>
                 <tr>
                   <td>&emsp;&emsp;&emsp;<b>Gender:</b></td>
                   <td colspan="2"><input type="radio" name="gender" value="female" <?php if($gender == "female"){echo "checked";} ?> > Female&emsp;&emsp;&emsp;<input type="radio" name="gender" value="male" <?php if($gender == "male"){echo "checked";} ?>> Male<br></td>
                 </tr>
                 <tr>
                   <td><input type="text" name="indication" placeholder="Indication" value="<?php echo $indiction; ?>" required /></td>
                   <td><b>Patient ID:<?php  ?>

                    <input type="hidden" name="pid" value="<?php echo $pid; ?>"/></b></td>
                   <td><b>Study:</b>&emsp;&emsp;&emsp;Gynaec<input type="hidden" name="study" value="gynaec"><input type="hidden" name="rkey" value="<?php echo $rkey; ?>" ></td>
                 </tr>
               </table><br/><br/>
               <h6>Pelvis Scan Form</h6>
               <table>
                 <tr>
                   <td style="letter-spacing:2px;"><b>Sonography of Pelvis: </b></td>
                   <td style="letter-spacing:1px;">&emsp;<b><input type="checkbox" name="transAbdorminal" value="yes" <?php if ($tabdominal == "yes") {echo "checked";} ?>/>Trans-Abdorminal</b></td>
                   <td style="letter-spacing:1px;">&emsp;<b><input type="checkbox" name="transVaginal" value="yes" <?php if($tvaginal == "yes"){echo "checked";} ?>/>Trans-Vaginal</b></td>
                 </tr><tr></tr>
                 <tr>
                   <td style="letter-spacing:2px;"><b>Uterus Appeared: </b></td>
                   <td style="letter-spacing:1px;">&emsp;<b><input type="radio" name="uterus" value="antiverted" <?php if($uappear == "antiverted"){echo "checked";} ?>/>antiverted</b></td>
                   <td style="letter-spacing:1px;">&emsp;<b><input type="radio" name="uterus" value="retroverted" <?php if($uappear == "retroverted"){echo "checked";} ?>/>retroverted</b></td>
                 </tr>
                 <tr>
                   <td><b>Uterus measured:</b></td>
                   <td><input type="text" name="um" value="<?php echo $umeasure; ?>" readonly/></td>
                   <td><b>cms</b></td>
                 </tr>
                 <tr>
                   <td style="letter-spacing:2px;"><b>Cavity Appeared: </b></td>
                   <td style="letter-spacing:1px;">&emsp;<b><input type="radio" name="cavity" value="normal" <?php if($cavity == "normal"){echo "checked";} ?>/>normal</b></td>
                   <td style="letter-spacing:1px;">&emsp;<b><input type="radio" name="cavity" value="abnormal" <?php if($cavity == "abnormal"){echo "checked";} ?>/>abnormal</b></td>
                 </tr>
                 <tr>

                 </tr>
                 <tr>
                   <td><b>Right Ovary Measured:</b></td>
                   <td colspan="2"><input type="text" name="rom" value="<?php echo $rom; ?>" placeholder="IN mm." readonly/></td>
                 </tr>
                 <tr>
                   <td style="letter-spacing:2px;"><b>Appeared: </b></td>
                   <td style="letter-spacing:1px;">&emsp;<b><input type="radio" name="ro" value="normal" <?php if($ro == "normal"){echo "checked";} ?>/>normal</b></td>
                   <td style="letter-spacing:1px;">&emsp;<b><input type="radio" name="ro" value="abnormal"<?php if($ro == "abnormal"){echo "checked";} ?>/>abnormal</b></td>
                 </tr>
                 <tr>
                   <td colspan="2"><input type="text" name="roacomment" value="<?php echo $roc; ?>" readonly/></td>
                 </tr>
                 <tr>
                   <td><b>Left Ovary Measured:</b></td>
                   <td colspan="2"><input type="text" name="lom" value="0 X 0 X 0" placeholder="IN mm." value=" <?php echo $lom; ?>"/></td>
                 </tr>
                 <tr>
                   <td style="letter-spacing:2px;"><b>Appeared: </b></td>
                   <td style="letter-spacing:1px;">&emsp;<b><input type="radio" name="lo" value="normal" <?php if($lo == "normal"){echo "checked";} ?>/>normal</b></td>
                   <td style="letter-spacing:1px;">&emsp;<b><input type="radio" name="lo" value="abnormal" <?php if($lo == "abnormal"){echo "checked";} ?>/>abnormal</b></td>
                 </tr>
                 <tr>
                   <td colspan="2"><input type="text" name="loacomment" value="<?php echo $loc; ?>" readonly/></td>
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
                    <td><input type="date" name="date1" value="<?php echo $dte1; ?>" readonly/></td>
                    <td><input type="text" pattern="[0-9]*" maxlength="3" name="day1" value="<?php echo $day1; ?>" readonly/></td>
                    <td><input type="text" name="ro1" maxlength="50" value="<?php echo $ro1; ?>" readonly/></td>
                    <td><input type="text" name="lo1" maxlength="50"value="<?php echo $lo1; ?>" readonly/></td>
                    <td><input type="text" name="emt1" value="<?php echo $emt1; ?>" readonly/></td>
                 </tr>
                 <tr>
                    <td><input type="date" name="date2" value="<?php echo $dte2; ?>" autofocus readonly/></td>
                    <td><input type="text" pattern="[0-9]*" maxlength="3" name="day2" value="<?php echo $day2; ?>" readonly/></td>
                    <td><input type="text" name="ro2" maxlength="50" value="<?php echo $ro2; ?>"readonly/></td>
                    <td><input type="text" name="lo2" maxlength="50"value="<?php echo $lo2; ?>"readonly/></td>
                    <td><input type="text" name="emt2" value="<?php echo $emt2; ?>"readonly/></td>
                 </tr>
                 <tr>
                    <td><input type="date" name="date3" value="<?php echo $dte3; ?>" readonly/></td>
                    <td><input type="text" pattern="[0-9]*" maxlength="3" name="day3" value="<?php echo $day3; ?>" readonly/></td>
                    <td><input type="text" name="ro3" maxlength="50" value="<?php echo $ro3; ?>"readonly/></td>
                    <td><input type="text" name="lo3" maxlength="50"value="<?php echo $lo3; ?>"readonly/></td>
                    <td><input type="text" name="emt3" value="<?php echo $emt3; ?>"readonly/></td>
                 </tr>
                 <tr>
                    <td><input type="date" name="date4" value="" autofocus="true" required/></td>
                    <td><input type="text" pattern="[0-9]*" maxlength="3"name="day4" value="" required/></td>
                    <td><input type="text" name="ro4" maxlength="50" value="" required/></td>
                    <td><input type="text" name="lo4" maxlength="50"value="" required/></td>
                    <td><input type="text" name="emt4" value="" required/></td>
                 </tr>
               </table><br/><br/>
               <h6>Impression</h6>
               <table width="100%">
                 <tr>
                   <td><input type="text" name="impression" placeholder="impression" value="<?php echo $impression; ?>"/></td>
                 </tr>
               </table>
               <br/>
               <input type="submit" value="submit" name="pelvisdate4"/>
             </form>

             <form method="post" action="undo.php">
              <input type="hidden" name="rkey" value="<?php  echo $rkey;?>"/>
              <input style="position:absolute; top: 3%;right:45px;" type="submit" value="undo changes" name="pelvisdate4"/>
             </form>
           </div>
     </td>
   </tr>
 </table>
</body>
<?php }else{  ?>
  <body style="padding:0px;">
    <?php

    $pid = $_POST['pid'];
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
$pname="";
$age="";
$referred="";
$gender="";
$indiction="";
$tabdominal="";
$tvaginal="";
$uappear="";
$umeasure="";
$cavity="";
$emt="";
$rom="";
$ro="";
$roc="";
$lom="";
$lo="";
$loc="";
$impression="";
$dte1="";
$day1="";
$ro1="";
$lo1="";
$emt1="";
$dte2="";
$day2="";
$ro2="";
$lo2="";
$emt2="";
$dte3="";
$day3="";
$ro3="";
$lo3="";
$emt3="";

$dte4="";
$day4="";
$ro4="";
$lo4="";
$emt4="";
$rkey="";
$sql="SELECT * FROM patient_record_header WHERE pid='$pid'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    if($row = $result->fetch_assoc()) {
      $pname=$row["name"];
      $rkey=$row["rkey"];
      $age=$row["age"];
      $gender=$row["gender"];
      $referred=$row["referredby"];
      $indiction=$row["indication"];
  }
}
$sql2="SELECT * FROM pelvis WHERE rkey='$rkey'";
$result1 = $conn->query($sql2);
if ($result1->num_rows > 0) {
    if($row1 = $result1->fetch_assoc()) {
      $tvaginal=$row1["tvaginal"];
      $tabdominal=$row1["tabdominal"];
      $uappear=$row1["uterus_appeared"];
      $umeasure=$row1["uterus_measure"];
      $cavity=$row1["cavity"];
      $rom=$row1["ro_measure"];
      $ro=$row1["ro_appear"];
      $roc=$row1["ro_comment"];
      $lom=$row1["lo_mesure"];
      $lo=$row1["lo_appear"];
      $loc=$row1["lo_comment"];
      $impression=$row1["impression"];

      $dte1=$row1["date1"];
      $day1=$row1["day1"];
      $ro1=$row1["ro1"];
      $lo1=$row1["lo1"];
      $emt1=$row1["et1"];

      $dte2=$row1["date2"];
      $day2=$row1["day2"];
      $ro2=$row1["ro2"];
      $lo2=$row1["lo2"];
      $emt2=$row1["et2"];

      $dte3=$row1["date3"];
      $day3=$row1["day3"];
      $ro3=$row1["ro3"];
      $lo3=$row1["lo3"];
      $emt3=$row1["et3"];

      $dte4=$row1["date4"];
      $day4=$row1["day4"];
      $ro4=$row1["ro4"];
      $lo4=$row1["lo4"];
      $emt4=$row1["et4"];
  }
}



 ?><table width="100%">
   <tr>
     <td>
       <div class="form-style-8 scroll" style="width: 90%;padding-top:0px;">
             <h6>Patient details</h6>
             <form method="post" action="action.php">
               <table>
                 <tr>
                   <td><input type="text" name="pname" placeholder="Patient Name" value="<?php echo $pname; ?>"required readonly/></td>
                   <td><input type="text" pattern="\d*" name="age" placeholder="Age" required maxlength="3" value="<?php echo $age; ?>" readonly/></td>
                   <td><input type="text" name="referred" placeholder="Referred by" value="<?php echo $referred; ?>" required readonly/></td>
                 </tr>
                 <tr>
                   <td>&emsp;&emsp;&emsp;<b>Gender:</b></td>
                   <td colspan="2"><input type="radio" name="gender" value="female" <?php if($gender == "female"){echo "checked";} ?> > Female&emsp;&emsp;&emsp;<input type="radio" name="gender" value="male" <?php if($gender == "male"){echo "checked";} ?>> Male<br></td>
                 </tr>
                 <tr>
                   <td><input type="text" name="indication" placeholder="Indication" value="<?php echo $indiction; ?>" required /></td>
                   <td><b>Patient ID:<?php  ?>

                    <input type="hidden" name="pid" value="<?php echo $pid; ?>"/></b></td>
                   <td><b>Study:</b>&emsp;&emsp;&emsp;Gynaec<input type="hidden" name="study" value="gynaec"><input type="hidden" name="rkey" value="<?php echo $rkey; ?>" ></td>
                 </tr>
               </table><br/><br/>
               <h6>Pelvis Scan Form</h6>
               <table>
                 <tr>
                   <td style="letter-spacing:2px;"><b>Sonography of Pelvis: </b></td>
                   <td style="letter-spacing:1px;">&emsp;<b><input type="checkbox" name="transAbdorminal" value="yes" <?php if ($tabdominal == "yes") {echo "checked";} ?>/>Trans-Abdorminal</b></td>
                   <td style="letter-spacing:1px;">&emsp;<b><input type="checkbox" name="transVaginal" value="yes" <?php if($tvaginal == "yes"){echo "checked";} ?>/>Trans-Vaginal</b></td>
                 </tr><tr></tr>
                 <tr>
                   <td style="letter-spacing:2px;"><b>Uterus Appeared: </b></td>
                   <td style="letter-spacing:1px;">&emsp;<b><input type="radio" name="uterus" value="antiverted" <?php if($uappear == "antiverted"){echo "checked";} ?>/>antiverted</b></td>
                   <td style="letter-spacing:1px;">&emsp;<b><input type="radio" name="uterus" value="retroverted" <?php if($uappear == "retroverted"){echo "checked";} ?>/>retroverted</b></td>
                 </tr>
                 <tr>
                   <td><b>Uterus measured:</b></td>
                   <td><input type="text" name="um" value="<?php echo $umeasure; ?>" readonly/></td>
                   <td><b>cms</b></td>
                 </tr>
                 <tr>
                   <td style="letter-spacing:2px;"><b>Cavity Appeared: </b></td>
                   <td style="letter-spacing:1px;">&emsp;<b><input type="radio" name="cavity" value="normal" <?php if($cavity == "normal"){echo "checked";} ?>/>normal</b></td>
                   <td style="letter-spacing:1px;">&emsp;<b><input type="radio" name="cavity" value="abnormal" <?php if($cavity == "abnormal"){echo "checked";} ?>/>abnormal</b></td>
                 </tr>
                 <tr>

                 </tr>
                 <tr>
                   <td><b>Right Ovary Measured:</b></td>
                   <td colspan="2"><input type="text" name="rom" value="<?php echo $rom; ?>" placeholder="IN mm." readonly/></td>
                 </tr>
                 <tr>
                   <td style="letter-spacing:2px;"><b>Appeared: </b></td>
                   <td style="letter-spacing:1px;">&emsp;<b><input type="radio" name="ro" value="normal" <?php if($ro == "normal"){echo "checked";} ?>/>normal</b></td>
                   <td style="letter-spacing:1px;">&emsp;<b><input type="radio" name="ro" value="abnormal"<?php if($ro == "abnormal"){echo "checked";} ?>/>abnormal</b></td>
                 </tr>
                 <tr>
                   <td colspan="2"><input type="text" name="roacomment" value="<?php echo $roc; ?>" readonly/></td>
                 </tr>
                 <tr>
                   <td><b>Left Ovary Measured:</b></td>
                   <td colspan="2"><input type="text" name="lom" value="0 X 0 X 0" placeholder="IN mm." value=" <?php echo $lom; ?>"/></td>
                 </tr>
                 <tr>
                   <td style="letter-spacing:2px;"><b>Appeared: </b></td>
                   <td style="letter-spacing:1px;">&emsp;<b><input type="radio" name="lo" value="normal" <?php if($lo == "normal"){echo "checked";} ?>/>normal</b></td>
                   <td style="letter-spacing:1px;">&emsp;<b><input type="radio" name="lo" value="abnormal" <?php if($lo == "abnormal"){echo "checked";} ?>/>abnormal</b></td>
                 </tr>
                 <tr>
                   <td colspan="2"><input type="text" name="loacomment" value="<?php echo $loc; ?>" readonly/></td>
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
                    <td><input type="date" name="date1" value="<?php echo $dte1; ?>" readonly/></td>
                    <td><input type="text" pattern="[0-9]*" maxlength="3" name="day1" value="<?php echo $day1; ?>" readonly/></td>
                    <td><input type="text" name="ro1" maxlength="50" value="<?php echo $ro1; ?>" readonly/></td>
                    <td><input type="text" name="lo1" maxlength="50"value="<?php echo $lo1; ?>" readonly/></td>
                    <td><input type="text" name="emt1" value="<?php echo $emt1; ?>" readonly/></td>
                 </tr>
                 <tr>
                    <td><input type="date" name="date2" value="<?php echo $dte2; ?>" autofocus readonly/></td>
                    <td><input type="text" pattern="[0-9]*" maxlength="3" name="day2" value="<?php echo $day2; ?>" readonly/></td>
                    <td><input type="text" name="ro2" maxlength="50" value="<?php echo $ro2; ?>"readonly/></td>
                    <td><input type="text" name="lo2" maxlength="50"value="<?php echo $lo2; ?>"readonly/></td>
                    <td><input type="text" name="emt2" value="<?php echo $emt2; ?>"readonly/></td>
                 </tr>
                 <tr>
                    <td><input type="date" name="date3" value="<?php echo $dte3; ?>" readonly/></td>
                    <td><input type="text" pattern="[0-9]*" maxlength="3" name="day3" value="<?php echo $day3; ?>" readonly/></td>
                    <td><input type="text" name="ro3" maxlength="50" value="<?php echo $ro3; ?>"readonly/></td>
                    <td><input type="text" name="lo3" maxlength="50"value="<?php echo $lo3; ?>"readonly/></td>
                    <td><input type="text" name="emt3" value="<?php echo $emt3; ?>"readonly/></td>
                 </tr>
                 <tr>
                    <td><input type="date" name="date4" value="<?php echo $dte4; ?>" readonly/></td>
                    <td><input type="text" pattern="[0-9]*" maxlength="3"name="day4" value="<?php echo $day4; ?>" readonly/></td>
                    <td><input type="text" name="ro4" maxlength="50" value="<?php echo $ro4; ?>" readonly/></td>
                    <td><input type="text" name="lo4" maxlength="50"value="<?php echo $lo4; ?>" readonly/></td>
                    <td><input type="text" name="emt4" value="<?php echo $emt4; ?>" readonly/></td>
                 </tr>
               </table><br/><br/>
               <h6>Impression</h6>
               <table width="100%">
                 <tr>
                   <td><input type="text" name="impression" placeholder="impression" value="<?php echo $impression; ?>"/></td>
                 </tr>
               </table>
               <br/>
               <input type="submit" value="submit" name="pelvisdate4"/>
             </form>

             <form method="post" action="undo.php">
              <input type="hidden" name="rkey" value="<?php  echo $rkey;?>"/>
              <input style="position:absolute; top: 3%;right:45px;" type="submit" value="undo changes" name="pelvisdate4"/>
             </form>
           </div>
     </td>
   </tr>
 </table>
</body>
<?php }
$sqstatusupdate="UPDATE patient_record_header SET status = 'Printed' WHERE attendedby = '$user' AND report_type = 'pelvis' AND status = 'notPrinted'";
$sqlheader = "UPDATE patient_record_header SET status = 'notPrinted' WHERE rkey = '$rkey'";

if ($conn->query($sqstatusupdate) === TRUE) {
  if ($conn->query($sqlheader) === TRUE) {
  }
}
mysqli_close($conn);
?>
</html>
