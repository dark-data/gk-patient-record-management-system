<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
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
          <td align='center' style="font-size:22px;"><b>G.K. Hospital</b></td>

        </tr>
        <tr>
          <td align='center' style="font-size:22px;"><b>THANGALAKSHMI SCAN CENTRE,</b></td>
        </tr>
        <tr>
          <td align='center' style="font-size:22px;">No.61, Pournami Nagar, Arni, Tiruvannamalai (632301).</td>
        </tr>
        <tr>
          <td align='center' style="font-size:22px;">Reg No.: PNA/5028/2019</td>
        </tr>
      </table>
      <table width="90%" align="center" style="border-collapse: collapse;" border="1" >
        <tr>
          <td width="33%">&nbsp;&nbsp;Patient Name</td>
          <td width="33%">&nbsp;&nbsp;</td>
          <td width="34%">&nbsp;&nbsp;Age&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;45</td>

        </tr>
        <tr>
          <td>&nbsp;&nbsp;Patient ID</td>
          <td>&nbsp;&nbsp;</td>
          <td>&nbsp;&nbsp;Sex&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;male</td>

        </tr>
        <tr>
          <td>&nbsp;&nbsp;Refered by Name</td>
          <td>&nbsp;&nbsp;</td>
          <td>&nbsp;&nbsp;Date&emsp;&emsp;&emsp;&emsp;&emsp;<?php echo date("d/m/Y"); ?></td>

        </tr>
        <tr>
          <td>&nbsp;&nbsp;Study</td>
          <td>&nbsp;&nbsp;Obstetrics</td>
          <td>&nbsp;&nbsp;Indication</td>
        </tr>
      </table>
      <p align="left" style="padding-left:5%;">Dear Dr, Thanks for your referral.</p>
    </div>
