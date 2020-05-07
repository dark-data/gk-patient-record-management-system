
<?php
//random string or key for mapping report with patien headers
$user="";
if(!isset($_SESSION)) {
  session_start();
}
if(session_id() != ''){
  $user = $_SESSION["username"];
}
//use this to store random report key

 if (isset($_POST['ogone'])){
    $age = $_POST["age"];
    $gender = $_POST["gender"];
    $referred = $_POST["referred"];
    $pname  =$_POST["pname"];
    $indication = $_POST["indication"];
    $study = $_POST["study"];
    $reportkey = $_POST["rkey"];
    //obfirst parameters
    $lmp = $_POST["lmp"];
    $lmpga = $_POST["galmp"];
    $lmpeod = $_POST["eodlmp"];
    $usgga = $_POST["gausg"];
    $usgeod = $_POST["eodusg"];
    //uterus
    $crl = $_POST["crl"];
    $wk = $_POST["geswks"];
    $days = $_POST["gesdays"];
    //ovaries
    $ro = $_POST["ro"];
    $rom = $_POST["rom"];
    $lo = $_POST["lo"];
    $lom = $_POST["lom"];
//dbconn
    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "gjk";
    $conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sqstatusupdate="UPDATE patient_record_header SET status = 'Printed' WHERE attendedby = '$user' AND report_type = 'ogone' AND status = 'notPrinted'";
    $sqlheader = "INSERT INTO patient_record_header(age, gender, referredby, name, date, study, indication, rkey, attendedby, report_type, status) VALUES ('$age','$gender','$referred','$pname', CURDATE(),'$study','$indication','$reportkey','$user','ogone','notPrinted')";
    $sql = "INSERT INTO obfirst(rkey, lmp, ga_lmp, eod_lmp, ga_usg, eod_usg, crl, ges_week, ges_day, ro, rom, lo, lom) VALUES ('$reportkey',DATE '$lmp','$lmpga',DATE '$lmpeod','$usgga',DATE '$usgeod','$crl','$wk','$days','$ro','$rom','$lo','$lom')";
    if ($conn->query($sqstatusupdate) === TRUE) {
      if ($conn->query($sqlheader) === TRUE) {
      }
      if ($conn->query($sql) === TRUE) {
        include'form_obFirstTrimesterUSG.php';
        echo "<h3 style='position: fixed; top:0;'>report created successfully</h3><br/>";
      }else{
        echo "<h3 style='position: fixed; top:0;'>error creating report</h3><br/>";
      }
    }
}elseif (isset($_POST['obtwo'])){
   $age = $_POST["age"];
   $gender = $_POST["gender"];
   $referred = $_POST["referred"];
   $pname  =$_POST["pname"];
   $indication = $_POST["indication"];
   $study = $_POST["study"];
   $reportkey = $_POST["rkey"];
   //obfirst parameters
   $bpd = $_POST["bpd"];
   $bpdwd = $_POST["bpdwd"];
   $hc = $_POST["hc"];
   $hcwd = $_POST["hcwd"];
   $ac = $_POST["ac"];
   $acwd = $_POST["acwd"];
   $fl = $_POST["fl"];
   $flwd = $_POST["flwd"];

   $placenta = $_POST["placenta"];
   $liquor = $_POST["liquor"];
   $afi = $_POST["afi"];

   $fhr = $_POST["fhr"];
   $fwt = $_POST["fwt"];
   $minfo = $_POST["minfo"];
   $cetvical = $_POST["cervical"];
   $geswks = $_POST["geswks"];
   $gesdays = $_POST["gesdays"];
//dbconn
   $servername = "localhost";
   $dbusername = "root";
   $dbpassword = "";
   $dbname = "gjk";
   $conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);
   // Check connection
   if (!$conn) {
       die("Connection failed: " . mysqli_connect_error());
   }
   $sqstatusupdate="UPDATE patient_record_header SET status = 'Printed' WHERE attendedby = '$user' AND report_type = 'obtwo' AND status = 'notPrinted'";
   $sqlheader = "INSERT INTO patient_record_header(age, gender, referredby, name, date, study, indication, rkey, attendedby, report_type, status) VALUES ('$age','$gender','$referred','$pname', CURDATE(),'$study','$indication','$reportkey','$user','obtwo','notPrinted')";
   $sql = "INSERT INTO obtwo(bpd, hc, ac, fl, placenta, liquor, afi, fhr, fwt, mi, geswk, gesdays, cl, rkey, bpdwd, hcwd, acwd, flwd) VALUES ('$bpd','$hc','$ac', '$fl','$placenta', '$liquor','$afi','$fhr', '$fwt','$minfo','$geswks','$gesdays','$cetvical','$reportkey',  '$bpdwd', '$hcwd', '$acwd', '$flwd')";
   if ($conn->query($sqstatusupdate) === TRUE) {
     if ($conn->query($sqlheader) === TRUE) {
     }
     if ($conn->query($sql) === TRUE) {
       include'form_ob2by3TrimesterUSG.php';
       echo "<h3 styleby='position: fixed; top:0;'>report created successfully</h3><br/>";
     }else{
       echo "<h3 style='position: fixed; top:0;'>error creating report</h3><br/>";
     }
   }
}
elseif (isset($_POST['newPelvis'])){//to do pelvistwo
   $age = $_POST["age"];
   $gender = $_POST["gender"];
   $referred = $_POST["referred"];
   $pname  =$_POST["pname"];
   $indication = $_POST["indication"];
   $study = $_POST["study"];
   $reportkey = $_POST["rkey"];
   //pelvistwo parameters
   $tabdominal = "no";
   if (isset($_POST['transAbdorminal'])){
     $tabdominal = $_POST['transAbdorminal']; // check value of checked checkbox.
   }
   $tvaginal = "no";
   if (isset($_POST['transVaginal'])){
     $tvaginal = $_POST['transVaginal']; // check value of checked checkbox.
   }
   $uappear = $_POST["uterus"];
   $umeasure = $_POST["um"];
   $cavity = $_POST["cavity"];
   $emt = $_POST["emt"];
   $rom = $_POST["rom"];
   $ro = $_POST["ro"];
   $rocomment = $_POST["roacomment"];
   $lom = $_POST["lom"];
   $lo = $_POST["lo"];
   $locomment = $_POST["loacomment"];
   $impression = $_POST["impression"];
   $dte1 = $_POST["date1"];
   $day1 = $_POST["day1"];
   $ro1 = $_POST["ro1"];
   $lo1 = $_POST["lo1"];
   $emt = $_POST["emt"];
//dbconn
   $servername = "localhost";
   $dbusername = "root";
   $dbpassword = "";
   $dbname = "gjk";
   $conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);
   // Check connection
   if (!$conn) {
       die("Connection failed: " . mysqli_connect_error());
   }
   $sqstatusupdate="UPDATE patient_record_header SET status = 'Printed' WHERE attendedby = '$user' AND report_type = 'pelvis' AND status = 'notPrinted'";
   $sqlheader = "INSERT INTO patient_record_header(age, gender, referredby, name, date, study, indication, rkey, attendedby, report_type, status) VALUES ('$age','$gender','$referred','$pname', CURDATE(),'$study','$indication','$reportkey','$user','pelvis','notPrinted')";
   $sql = "INSERT INTO pelvis(rkey, tvaginal, tabdominal, uterus_appeared, uterus_measure, cavity, ro_measure, ro_appear, ro_comment, lo_mesure, lo_appear, lo_comment, date1, day1, ro1, lo1, et1, impression) VALUES('$reportkey','$tvaginal','$tabdominal','$uappear','$umeasure','$cavity','$rom','$ro','$rocomment','$lom','$lo','$locomment','$dte1','$day1','$ro1','$lo1','$emt','$impression')";
   if ($conn->query($sqstatusupdate) === TRUE) {
     if ($conn->query($sqlheader) === TRUE) {
     }
     if ($conn->query($sql) === TRUE) {
       include'form_pelvis2.php';
       echo "<h3 styleby='position: fixed; top:0;'>report created successfully</h3><br/>";
     }else{
       echo "<h3 style='position: fixed; top:0;'>error creating report</h3><br/>";
     }
   }
}
elseif (isset($_POST['pelvistwo'])){//to do pelvistwo
   $age = $_POST["age"];
   $gender = $_POST["gender"];
   $referred = $_POST["referred"];
   $pname  =$_POST["pname"];
   $indication = $_POST["indication"];
   $study = $_POST["study"];
   $reportkey = $_POST["rkey"];
   //pelvistwo parameters
   $tabdominal = "no";
   if (isset($_POST['transAbdorminal'])){
     $tabdominal = $_POST['transAbdorminal']; // check value of checked checkbox.
   }
   $tvaginal = "no";
   if (isset($_POST['transVaginal'])){
     $tvaginal = $_POST['transVaginal']; // check value of checked checkbox.
   }
   $uappear = $_POST["uterus"];
   $umeasure = $_POST["um"];
   $cavity = $_POST["cavity"];
   $emt = $_POST["emt"];
   $rom = $_POST["rom"];
   $ro = $_POST["ro"];
   $rocomment = $_POST["roacomment"];
   $lom = $_POST["lom"];
   $lo = $_POST["lo"];
   $locomment = $_POST["loacomment"];
   $impression = $_POST["impression"];
//dbconn
   $servername = "localhost";
   $dbusername = "root";
   $dbpassword = "";
   $dbname = "gjk";
   $conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);
   // Check connection
   if (!$conn) {
       die("Connection failed: " . mysqli_connect_error());
   }
   $sqstatusupdate="UPDATE patient_record_header SET status = 'Printed' WHERE attendedby = '$user' AND report_type = 'pelvistwo' AND status = 'notPrinted'";
   $sqlheader = "INSERT INTO patient_record_header(age, gender, referredby, name, date, study, indication, rkey, attendedby, report_type, status) VALUES ('$age','$gender','$referred','$pname', CURDATE(),'$study','$indication','$reportkey','$user','pelvistwo','notPrinted')";
   $sql = "INSERT INTO pelvistwo(rkey, tvaginal, tabdominal, uterus_appeared, u_measured, cavity, endomaterial_thickness, ro_measure, ro, ro_comment, lo_measure, lo, lo_comment, impression) VALUES ('$reportkey','$tvaginal','$tabdominal','$uappear','$umeasure','$cavity','$emt','$rom','$ro','$rocomment','$lom','$lo','$locomment','$impression')";
   if ($conn->query($sqstatusupdate) === TRUE) {
     if ($conn->query($sqlheader) === TRUE) {
     }
     if ($conn->query($sql) === TRUE) {
       include'form_pelvis2.php';
       echo "<h3 styleby='position: fixed; top:0;'>report created successfully</h3><br/>";
     }else{
       echo "<h3 style='position: fixed; top:0;'>error creating report</h3><br/>";
     }
   }
}

elseif (isset($_POST['newrep'])) {//not needed
  $servername = "localhost";
  $dbusername = "root";
  $dbpassword = "";
  $dbname = "gjk";
  $conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);
  // Check connection
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }
  $attendant = $_POST["attendant"];
  $rtype = $_POST["rtype"];
  $sqstatusupdate="UPDATE patient_record_header SET status = 'Printed' WHERE attendedby = '$attendant' AND report_type = '$rtype' AND status = 'notPrinted'";
  if ($conn->query($sqstatusupdate) === TRUE) {
    echo " new report initiated ";
    if($rtype == "ogone"){
      include 'form_obFirstTrimesterUSG.php';
    }elseif ($rtype == 'obtwo') {
      include 'form_ob2by3TrimesterUSG.php';
    }elseif ($rtype == 'pelvistwo') {
      include 'form_pelvis2.php';
    }elseif ($rtype == 'pelvis') {
      include 'form_new_pelvis.php';
    }

  }
}
elseif (isset($_POST['pelvisdate2'])){//to do date 2
   $date2 = $_POST["date2"];
   $day2 = $_POST["day2"];
   $ro2 = $_POST["ro2"];
   $lo2  =$_POST["lo2"];
   $emt2 = $_POST["emt2"];
   $reportkey = $_POST["rkey"];
   $impression = $_POST['impression'];
   $pid= $_POST['pid'];
//dbconn
   $servername = "localhost";
   $dbusername = "root";
   $dbpassword = "";
   $dbname = "gjk";
   $conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);
   // Check connection
   if (!$conn) {
       die("Connection failed: " . mysqli_connect_error());
   }
   $sqstatusupdate="UPDATE patient_record_header SET status = 'Printed' WHERE attendedby = '$user' AND report_type = 'pelvis' AND status = 'notPrinted'";
   $sqlheader = "UPDATE patient_record_header SET status = 'notPrinted' WHERE rkey = '$reportkey'";
   $sql = "UPDATE pelvis SET date2 = DATE '$date2', day2 = '$day2', ro2 = '$ro2', lo2 ='$lo2',et2='$emt2', impression = '$impression' WHERE rkey = '$reportkey'";
   if ($conn->query($sqstatusupdate) === TRUE) {
     if ($conn->query($sqlheader) === TRUE) {
     }
     if ($conn->query($sql) === TRUE) {
include'pelvis_report_final.php';
       echo "<h3 styleby='position: fixed; top:0;'>report created successfully</h3>

       <br/>";
     }else{
       echo "<h3 style='position: fixed; top:0;'>error creating report</h3><br/>";
     }
   }
}
elseif (isset($_POST['pelvisdate3'])){//to do date 2
   $date3 = $_POST["date3"];
   $day3 = $_POST["day3"];
   $ro3 = $_POST["ro3"];
   $lo3  =$_POST["lo3"];
   $emt3 = $_POST["emt3"];
   $reportkey = $_POST["rkey"];
   $impression = $_POST['impression'];
   $pid= $_POST['pid'];
//dbconn
   $servername = "localhost";
   $dbusername = "root";
   $dbpassword = "";
   $dbname = "gjk";
   $conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);
   // Check connection
   if (!$conn) {
       die("Connection failed: " . mysqli_connect_error());
   }
   $sqstatusupdate="UPDATE patient_record_header SET status = 'Printed' WHERE attendedby = '$user' AND report_type = 'pelvis' AND status = 'notPrinted'";
   $sqlheader = "UPDATE patient_record_header SET status = 'notPrinted' WHERE rkey = '$reportkey'";
   $sql = "UPDATE pelvis SET date3 = DATE '$date3', day3 = '$day3', ro3 = '$ro3', lo3 ='$lo3',et3='$emt3', impression = '$impression' WHERE rkey = '$reportkey'";
   if ($conn->query($sqstatusupdate) === TRUE) {
     if ($conn->query($sqlheader) === TRUE) {
     }
     if ($conn->query($sql) === TRUE) {
include'pelvis_report_final.php';
       echo "<h3 styleby='position: fixed; top:0;'>report created successfully</h3>

       <br/>";

     }else{
       echo "<h3 style='position: fixed; top:0;'>error creating report</h3><br/>";
     }
   }
}
elseif (isset($_POST['pelvisdate4'])){//to do date 2
   $date4 = $_POST["date4"];
   $day4 = $_POST["day4"];
   $ro4 = $_POST["ro4"];
   $lo4  =$_POST["lo4"];
   $emt4 = $_POST["emt4"];
   $reportkey = $_POST["rkey"];
   $impression = $_POST['impression'];
   $pid= $_POST['pid'];
//dbconn
   $servername = "localhost";
   $dbusername = "root";
   $dbpassword = "";
   $dbname = "gjk";
   $conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);
   // Check connection
   if (!$conn) {
       die("Connection failed: " . mysqli_connect_error());
   }
   $sqstatusupdate="UPDATE patient_record_header SET status = 'Printed' WHERE attendedby = '$user' AND report_type = 'pelvis' AND status = 'notPrinted'";
   $sqlheader = "UPDATE patient_record_header SET status = 'notPrinted' WHERE rkey = '$reportkey'";
   $sql = "UPDATE pelvis SET date4 = DATE '$date4', day4 = '$day4', ro4 = '$ro4', lo4 ='$lo4',et4='$emt4', impression = '$impression' WHERE rkey = '$reportkey'";
   if ($conn->query($sqstatusupdate) === TRUE) {
     if ($conn->query($sqlheader) === TRUE) {
     }
     if ($conn->query($sql) === TRUE) {
include 'pelvis_report_final.php';
       echo "<h3 styleby='position: fixed; top:0;'>report created successfully</h3>

       <br/>";
     }else{
       echo "<h3 style='position: fixed; top:0;'>error creating report</h3><br/>";
     }
   }
}
else{
  echo "string";
} ?>
