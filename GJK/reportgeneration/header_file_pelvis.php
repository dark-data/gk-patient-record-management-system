
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
          <td align='center' style="font-size:26px;"><b>XXX HOSPITAL</b></td>

        </tr>
        <tr>
          <td align='center' style="font-size:22px;"><b>XXXXXXXX SCAN CENTRE,</b></td>
        </tr>
        <tr>
          <td align='center' style="font-size:20px;">No.XXX, XXXXXX Nagar, XXXX, XXXXXX (632XXX).</td>
        </tr>
        <tr>
          <td align='center' style="font-size:20px;">Reg No.: XXXX/XXXXX/XXXXX</td>
        </tr>
      </table>
      <table width="90%" align="center" style="border-collapse: collapse;" border="1" >
        <tr>
          <td width="33%">&nbsp;&nbsp;Patient Name</td>
          <td width="33%">&nbsp;&nbsp;<?php echo $patient_name; ?></td>
          <td width="34%">&nbsp;&nbsp;Age&emsp;&emsp;&emsp;&emsp;&emsp;<?php echo " ".$age; ?></td>

        </tr>
        <tr>
          <td>&nbsp;&nbsp;Patient ID</td>
          <td>&nbsp;&nbsp;<?php echo $pid; ?></td>
          <td>&nbsp;&nbsp;Sex&emsp;&emsp;&emsp;&emsp;&emsp;<?php echo " ".$gender; ?></td>

        </tr>
        <tr>
          <td>&nbsp;&nbsp;Referred by</td>
          <td>&nbsp;&nbsp;<?php echo $referred; ?></td>
          <td>&nbsp;&nbsp;Date&emsp;&emsp;&emsp;&emsp;&emsp;<?php echo date("d/m/Y"); ?></td>

        </tr>
        <tr>
          <td>&nbsp;&nbsp;Study</td>
          <td>&nbsp;&nbsp;gynaec</td>
          <td>&nbsp;&nbsp;Indication&emsp;&emsp;&emsp;<?php echo $indication; ?></td>
        </tr>
      </table>
      <p align="left" style="padding-left:5%;">Dear Dr, Thanks for your referral.</p>
    </div>
