<head>
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
p{
  letter-spacing:2px;
}

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
     $sql = "SELECT * FROM patient_record_header where attendedby = '$user' AND report_type='obtwo' AND status='notPrinted'";
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
          }else {
            echo("Error description: " . $conn -> error);
          }
      }else {
echo($conn -> error);      }
require 'header_file.php';
//ob2/ob_2BAR3_TRIMESTER_USG_REPORT
$bpd="";
$hc="";
$ac="";
$fl="";
$placenta="";
$liquor="";
$afi="";
$fhr="";
$fwt="";
$minfo="";
$geswks="";
$gesdays="";
$cervical="";
$bpdwd="";
$hcwd="";
$acwd="";
$flwd="";
$sql2 = "select * from obtwo where rkey= '$rkey'";
$result2 = $conn->query($sql2);
if ($result2->num_rows > 0) {
    if($row2 = $result2->fetch_assoc()) {
      $bpd = $row2['bpd'];
      $hc = $row2['hc'];
      $ac = $row2['ac'];
      $fl = $row2['fl'];
      $placenta =$row2['placenta'];
      $liquor = $row2['liquor'];
      $afi = $row2['afi'];
      $fhr = $row2['fhr'];
      $fwt = $row2['fwt'];
      $minfo = $row2['mi'];
      $geswks = $row2['geswk'];
      $gesdays = $row2['gesdays'];
      $cervical= $row2['cl'];
      $bpdwd= $row2['bpdwd'];
      $hcwd= $row2['hcwd'];
      $acwd= $row2['acwd'];
      $flwd = $row2['flwd'];
    }
}
?>

<center>
  <u style="color:#0a7b70;"><h2 style="color:#0a7b70;">OB 2/3 Trimester USG Report</h2></u>
  <p align="left"style="padding-left:5%; padding-right:5%;">Real time B mode sonography of pelvis, showed Gravid uterus with Single/<br/>
    Twin intrauterine gestation.<br/>
    Fetal Biometry (All Measurements in cm)<br/><br/>
    <table width="50%" align="center" style="border-collapse: collapse;" border="1">
      <tr>
        <td width="30%" style="border:1px solid #0a7b70; color:#0a7b70;">&emsp;<b>BPD </b></td>
        <td style="border:1px solid #0a7b70; color:#0a7b70;"><?php echo $bpd; ?></td>
        <td width="53%"style="border:1px solid #0a7b70; color:#0a7b70;">&emsp;<?php echo $bpdwd; ?></td>
      </tr>
      <tr>
        <td style="border:1px solid #0a7b70; color:#0a7b70;">&emsp;<b>HC</b></td>
        <td style="border: 1px solid #0a7b70; border-left:0px; color:#0a7b70"><?php echo $hc; ?></td>
        <td style="border:1px solid #0a7b70; color:#0a7b70;">&emsp;<?php echo $hcwd; ?></td>
      </tr>
      <tr>
        <td style="border:1px solid #0a7b70; color:#0a7b70;">&emsp;<b>AC</b></td>
        <td style="border:1px solid #0a7b70; color:#0a7b70;"><?php echo $ac; ?></td>
        <td style="border:1px solid #0a7b70; color:#0a7b70;">&emsp;<?php echo $acwd; ?></td>
      </tr>
      <tr>
        <td style="border:1px solid #0a7b70; color:#0a7b70;">&emsp;<b>FL</b></td>
        <td style="border:1px solid #0a7b70; color:#0a7b70;"><?php echo $fl; ?></td>
        <td style="border:1px solid #0a7b70; color:#0a7b70;">&emsp;<?php echo $flwd; ?></td>
      </tr>
    </table><br/>
    <table width="90%" align="center">
      <tr>
        <td width="40%">Placenta</td>
        <td>:- &emsp;&emsp;<font style="padding:0px 10px; border-bottom:1px dashed;"><?php echo $placenta; ?></font></td>
      </tr>
      <tr>
        <td>Liquor</td>
        <td>:-  &emsp;&emsp;<font style="padding:0px 10px; border-bottom:1px dashed;"><?php echo $liquor; ?></font>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; AFI&emsp;:-&emsp;
          <font style="padding:0px 10px; border-bottom:1px dashed;"><?php echo $afi; ?></font></td>
      </tr>
      <tr>
        <td>Fetal Heart Rate</td>
        <td>:-  &emsp;&emsp;<font style="padding:0px 10px; border-bottom:1px dashed;"><?php echo $fhr; ?></font>&emsp;&emsp;&emsp;&emsp;/Bpm, Rhythm Regular/</td>
      </tr>
      <tr>
        <td>Approximate fetal wt at present</td>
        <td>:- &emsp;&emsp;<font style="padding:0px 10px; border-bottom:1px dashed;"><?php echo $fwt; ?></font>&emsp;&emsp;&emsp;gms</td>
      </tr>
      <tr>
        <td>Cardiac activity normal</td>
      </tr>
      <tr>
        <td>Fetal movements present</td>
      </tr>
      <tr>
        <td>No fetal anomalies detected</td>
      </tr>
      <tr>
        <td>Presentation Cephalic /</td>
      </tr>
      <tr>
        <td><p>Maternal information &emsp;<u><?php echo $minfo; ?></u></p></td>
        <td>:- Cervical length &emsp;<font style="padding:0px 10px; border-bottom:1px dashed;"><?php echo $cervical; ?></font>cm normal</td>
      </tr>
      <tr>
        <td><u style="color:#0a7b70;"><h2 style="color:#0a7b70;">IMPRESSION</h2></u></td>
      </tr>
      <tr>
        <td colspan="2">Single live intrauterine gestation corresponding to gestational age of <font style="padding:0px 10px; border-bottom:1px dashed;"><?php echo $geswks; ?></font> wks <font style="padding:0px 10px; border-bottom:1px dashed;"><?php echo $gesdays; ?></font> day. Gestational age assigned as per LMP.</p></td>
      </tr>
      <tr>
        <td colspan="2"><p> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;I, Dr.<font style="padding:0px 10px; border-bottom:1px dashed;"><?php echo $name; ?></font> declare that while conducting ultrasonography on Mrs. <font style="padding:0px 10px; border-bottom:1px dashed;"><?php echo $patient_name; ?></font>, I have neither detected not disclosed the sex of her fetus to anybody in any manner.</p></td>

      </tr>

    </table><br/><br/><br/>

    <table width="100%">
    <tr>
      <td width="50%"></td>
      <td><center><?php echo $name.".,".$desig ?></center></td>
    </tr>
      <tr>

        <td align="center" colspan="2">
          <p style="width: 100%;  bottom: 10px;letter-spacing:0px;  border-top: 1px solid #0a7b70; color:#0a7b70;" align="center">
            <i>
              USG has its own limitation not all the congenital anomalies are detected by it in the antenatal period
            </i>
          </p>
        </td>
      </tr>
    </table>
    </center>

</div>
<?php

require 'footer.php';
mysqli_close($conn);?>
