
  <script type="text/javascript">
    function printDiv(divName) {
         var printContents = document.getElementById(divName).innerHTML;
         var originalContents = document.body.innerHTML;

         document.body.innerHTML = printContents;

         window.print();

         document.body.innerHTML = originalContents;
    }
  </script>
  <style type="text/css" media="print">
    @page
    {
        size: auto;   /* auto is the initial value */
        margin: 0mm;  /* this affects the margin in the printer settings */
    }
</style>

  <body>

    <div align="center">
      <table style="padding:20px 40px; cell-padding:0px 0px;" border="0" width="100%">
        <tr>
          <td rowspan="4"><img src="images/logo.png" width="100px" height="100px"/></td>
          <td align='center' style="font-size:26px; color:#21618c;"><b>XXX HOSPITAL</b></td>

        </tr>
        <tr>
          <td align='center' style="font-size:22px; color:#21618c;"><b>XXXXXXXXXX SCAN CENTRE,</b></td>
        </tr>
        <tr>
          <td align='center' style="font-size:20px; color:#21618c;">No.XXX, XXXXX Nagar, XXXX, XXXXXXXXX (632xxx).</td>
        </tr>
        <tr>
          <td align='center' style="font-size:20px; color:#21618c;">Reg No.: XXXX/XXXXX/XXXXX</td>
        </tr>
      </table>

      <table width="90%" align="center" style=" border-collapse: collapse; " border="1" >
        <tr>
          <td width="23%" style="border: solid 1px #21618c;">&nbsp;&nbsp;<b>Patient Name</b></td>
          <td width="30%" style="border: solid 1px #21618c;">&nbsp;&nbsp;<?php echo $patient_name; ?></td>
          <td width="25%" style="border: solid 1px #21618c;">&nbsp;&nbsp;<b>Age</td>
          <td style="border: solid 1px #21618c;">&nbsp;&nbsp;<?php echo $age; ?></b></td>

        </tr>
        <tr>
          <td style="border: solid 1px #21618c; letter-spacing:1px;">&nbsp;&nbsp;<b>Patient ID</b></td>
          <td style="border: solid 1px #21618c;">&nbsp;&nbsp;<?php echo $pid; ?></td>
          <td style="border: solid 1px #21618c; letter-spacing:1px;">&nbsp;&nbsp;<b>Sex</b></td>
          <td style="border: solid 1px #21618c;">&nbsp;&nbsp;<?php echo $gender; ?></td>

        </tr>
        <tr>
          <td style="border: solid 1px #21618c; letter-spacing:1px;">&nbsp;&nbsp;<b>Referred by</b></td>
          <td style="border: solid 1px #21618c;">&nbsp;&nbsp;<?php echo $referred; ?></td>
          <td style="border: solid 1px #21618c; letter-spacing:1px;">&nbsp;&nbsp;<b>Date</b></td>
          <td style="border: solid 1px #21618c;">&nbsp;&nbsp;<?php echo date("d/m/Y"); ?></td>

        </tr>
        <tr>
          <td style="border: solid 1px #21618c; letter-spacing:1px;">&nbsp;&nbsp;<b>Study</b></td>
          <td style="border: solid 1px #21618c; font-size:14px; font-family: Arial;">&nbsp;&nbsp;<b>GYNAEC</b></td>
          <td style="border: solid 1px #21618c; letter-spacing:1px;">&nbsp;&nbsp;<b>Indication</b></td>
          <td style="border: solid 1px #21618c;">&nbsp;&nbsp;<?php echo $indication; ?></td>
        </tr>
      </table>
      <p align="left" style="padding-left:5%;">Dear Dr, Thanks for your referral.</p>
    </div>
