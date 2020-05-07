
  <head>
<meta http-equiv=refresh URL="OB_1st_TRIMESTER_USG_REPORT.php" content="3">
    <title></title>
  </head>
  <style>
  .example_a {
  color: #fff !important;
  text-transform: uppercase;
  text-decoration: none;
  padding: 20px;
  border-radius: 5px;
  display: inline-block;
  border: none;
  transition: all 0.4s ease 0s;
  }
  .example_b {
  color: #fff !important;
  text-transform: uppercase;
  text-decoration: none;
  padding: 20px;
  border-radius: 5px;
  display: inline-block;
  border: none;
  transition: all 0.4s ease 0s;
  }
  .example_c {
  color: #fff !important;
  text-transform: uppercase;
  text-decoration: none;
  padding: 20px;
  border-radius: 5px;
  display: inline-block;
  border: none;
  transition: all 0.4s ease 0s;
  }
  .print{
    background: #1680d3;
  }
  .cancel{
    background: #ed3330;
  }
  .save{
    background: #4aa64a;
  }
  .example_a:hover {
  background: #434343;
  letter-spacing: 2px;
  -webkit-box-shadow: 0px 5px 40px -10px rgba(0,0,0,0.57);
  -moz-box-shadow: 0px 5px 40px -10px rgba(0,0,0,0.57);
  box-shadow: 5px 40px -10px rgba(0,0,0,0.57);
  transition: all 0.4s ease 0s;
  }
  .example_b:hover {
  background: #059b86;
  letter-spacing: 2px;
  -webkit-box-shadow: 0px 5px 40px -10px rgba(0,0,0,0.57);
  -moz-box-shadow: 0px 5px 40px -10px rgba(0,0,0,0.57);
  box-shadow: 5px 40px -10px rgba(0,0,0,0.57);
  transition: all 0.4s ease 0s;
  }
  .example_c:hover {
  background: #22d790;
  letter-spacing: 2px;
  -webkit-box-shadow: 0px 5px 40px -10px rgba(0,0,0,0.57);
  -moz-box-shadow: 0px 5px 40px -10px rgba(0,0,0,0.57);
  box-shadow: 5px 40px -10px rgba(0,0,0,0.57);
  transition: all 0.4s ease 0s;
  }
  p{letter-spacing:2px;}

  </style>
<div id="printableArea">
<?php
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

$name = "";
$desig="";
  if(!isset($_SESSION)) {
    session_start();
  }
   $user = $_SESSION["username"];
   $sql = "select * from user_account where username= '$user' ";
   $result = $conn->query($sql);
   if ($result->num_rows > 0) {
       if($row = $result->fetch_assoc()) {
           $name=$row['fullname'];
           $desig = $row['degree'];
       }
   }
   $sql = "select * from patient_record_header where attendedby= '$user' AND report_type='ogone' AND status='notPrinted'";
   $pid="";
   $age="";
   $gender="";
   $referred="";
   $patient_name="";
   $indication="";
   $rkey="";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        if($row = $result->fetch_assoc()) {
            $pid=$row['pid'];
            $age=$row['age'];
            $gender=$row['gender'];
            $referred=$row['referredby'];
            $patient_name=$row['name'];
            $indication=$row['indication'];
            $rkey=$row['rkey'];
        }
    }
    require 'header_file.php';
    //report table 'obfirst'
    //obfirst parameters
    $lmp = "";
    $lmpga = "";
    $lmpeod = "";
    $usgga = "";
    $usgeod ="";
    //uterus
    $crl = "";
    $wk = "";
    $days = "";
    //ovaries
    $ro = "";
    $rom = "";
    $lo = "";
    $lom = "";
    $sql2 = "select * from obfirst where rkey= '$rkey'";
    $result2 = $conn->query($sql2);
    if ($result2->num_rows > 0) {
        if($row2 = $result2->fetch_assoc()) {
          //obfirst parameters
          $lmp = $row2['lmp'];
          $lmpga = $row2['ga_lmp'];
          $lmpeod = $row2['eod_lmp'];
          $usgga = $row2['ga_usg'];
          $usgeod =$row2['eod_usg'];
          //uterus
          $crl = $row2['crl'];
          $wk = $row2['ges_week'];
          $days = $row2['ges_day'];
          //ovaries
          $ro = $row2['ro'];
          $rom = $row2['rom'];
          $lo = $row2['lo'];
          $lom = $row2['lom'];
        }
    }
 ?>
<center>

  <u><h2>OB First Trimester USG Report</h2></u>
  <p align="left" style="padding-left:5%;">Real time B mode ultrasonography of pelvis. Showed Gravid uterus with Single /<br/> Twin intrauterine gestation.<br/>

<table width="100%" >
  <tr>
    <td><font><b>LMP</b>:</font>   <u><?php if($lmp!=''){ echo date('d/m/Y',strtotime($lmp));} ?></u></td>
    <td><font><b>GA</b>(LMP)</font>:  <font style="padding:0px 10px; border-bottom:1px solid;"><?php echo $lmpga; ?></font></td>
    <td><font><b>EDD</b>(LMP)</font>:  <font style="padding:0px 10px; border-bottom:1px solid;"><?php if($lmpeod!=''){echo date('d/m/Y',strtotime($lmpeod));} ?></font></td>
  </tr>
  <tr>
    <td></td>
    <td><font><b>GA</b>(USG)</font>:   <font style="padding:0px 10px; border-bottom:1px solid;"><?php echo $usgga; ?></font></td>
    <td><font><b>EDD</b>(USG):</font>  <font style="padding:0px 10px; border-bottom:1px solid;"><?php if($usgeod !=''){echo date('d/m/Y',strtotime($usgeod));} ?></font></td>
  </tr>
</table><br/>
  <u ><b style="font-size:20px;">Urinary bladder</b></u><br/>
<font style="padding-left:5%;">Is normal contour. No intraluminal echoes.</font><br/><br/>

<u style="height:2px;"><b style="font-size:20px;">Uterus</b></u><br/><br/>
<font style="padding-left:5%;">Gravid uterus showing a single gestational sac containing a yolk sac and an</font><br/>
embryo of CRL <font style="padding:0px 10px; border-bottom:1px solid;"><?php echo $crl; ?></font> cm corresponding to <font style="padding:0px 10px; border-bottom:1px solid;"><?php echo $wk; ?></font> wks
<font style="padding:0px 10px; border-bottom:1px solid;"><?php echo $days; ?></font> days gestational age Embryo<br/>
show regular cardiac pulsation of 144 /min.<br/><br/>
<u><b style="font-size:20px;">Ovaries</b></u><br/><br/>
Right Ovary&emsp; <font style="padding:0px 10px; border-bottom:1px solid;"><?php echo $ro; ?></font>&emsp;measures&emsp; <font style="padding:0px 10px; border-bottom:1px solid;"><?php echo $rom; ?></font> cm<br/>
Left Ovary&emsp; <font style="padding:0px 12px; border-bottom:1px solid;"><?php echo $lo; ?></font> &emsp;measures&emsp;<font style="padding:0px 10px; border-bottom:1px solid;"><?php echo $lom; ?></font> cm<br/>
Both Ovaries are normal in size & echo texture<br/>
no free fluid.
</p>
<p align="left" style="padding-left:5%; padding-right:5%;"><u><b style="font-size:20px;">Impression</b></u><br/><br/><font style="padding-Left:4%;">Single live intra uterine gestation corresponding to gestational age of <font style="padding:0px 10px; border-bottom:1px solid;"><?php echo $wk; ?></font> wks</font>
 <font style="padding:0px 10px; border-bottom:1px solid;"><?php echo $days; ?></font> day Gestational age assigned as per LMP.</p>
<p align="left" style="padding-left:5%; padding-right:5%;"><font style="padding-Left:4%;">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;I, Dr.
  <?php
  echo $name;
 ?>, declare that while conducting ultrasonography on </font>Mrs. <?php echo $patient_name; ?> . I have neither detected not disclosed the sac of her fetus to anybody in any manner.</p>
<br><br><br/>

<table width="100%">
<tr>
  <td width="50%"></td>
  <td><center><?php echo $name.".,".$desig ?></center></td>
</tr>
  <tr>

    <td align="center" colspan="2">
      <p style="width: 90%;  bottom: 10px;letter-spacing:0px;  border-top: 1px solid;" align="center">
        <i>
          USG has its own limitation not all the  congenital anomalies are detected by it in the antenatal period
        </i>
      </p>
    </td>
  </tr>
</table>
</center>


</div>
<form name="pc" method="post" action="savereport.php">
<input type="hidden" name="rtype" value="ogone"/>
<?php

require 'footer.php';
mysqli_close($conn);?>
