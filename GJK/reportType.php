<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <style media="screen">
  html,
body {
  margin: 0;
  padding: 0;
  width: 100%;
  height: 100vh;
  display: flex;
  flex-direction: row;
  justify-content: center;
  align-items: center;
  background: #000;
}











.glow-on-hover {
  padding: 40px 20px;

  border: none;
  outline: none;
  color: #fff;
  background: #111;
  cursor: pointer;
  position: relative;
  z-index: 0;
  border-radius: 10px;
}

.glow-on-hover:before {
  content: '';
  background: linear-gradient(45deg, #ff0000, #ff7300, #fffb00, #48ff00, #00ffd5, #002bff, #7a00ff, #ff00c8, #ff0000);
  position: absolute;
  top: -2px;
  left:-2px;
  background-size: 400%;
  z-index: -1;
  filter: blur(5px);
  width: calc(100% + 11px);
  height: calc(100% + 8px);
  animation: glowing 20s linear infinite;
  opacity: 0;
  transition: opacity .3s ease-in-out;
  border-radius: 10px;
}

.glow-on-hover:active {
  color: #000
}

.glow-on-hover:active:after {
  background: transparent;
}

.glow-on-hover:hover:before {
  opacity: 1;
}

.glow-on-hover:after {
  z-index: -1;
  content: '';
  position: absolute;
  width: 100%;
  height: 100%;
  background: #2d8fa3;
  left: 0;
  top: 0;
  border-radius: 10px;
}

@keyframes glowing {
  0% { background-position: 0 0; }
  50% { background-position: 400% 0; }
  100% { background-position: 0 0; }
}
td {
  padding-right: 10px;
  height: 180px;
  vertical-align: middle;
  justify-content: center;
  align-items: center;
}



.glow-on-hover-bw {
  padding: 40px 20px;

  border: none;
  outline: none;
  color: #000;
  background: #111;
  cursor: pointer;
  position: relative;
  z-index: 0;
  border-radius: 10px;
}

.glow-on-hover-bw:before {
  content: '';
  background: linear-gradient(45deg, #ff0000, #ff7300, #fffb00, #48ff00, #00ffd5, #002bff, #7a00ff, #ff00c8, #ff0000);
  position: absolute;
  top: -2px;
  left:-2px;
  background-size: 400%;
  z-index: -1;
  filter: blur(5px);
  width: calc(100% + 11px);
  height: calc(100% + 8px);
  animation: glowing 20s linear infinite;
  opacity: 0;
  transition: opacity .3s ease-in-out;
  border-radius: 10px;
}

.glow-on-hover-bw:active {
  color: #000
}

.glow-on-hover-bw:active:after {
  background: transparent;
}

.glow-on-hover-bw:hover:before {
  opacity: 1;
}

.glow-on-hover-bw:after {
  z-index: -1;
  content: '';
  position: absolute;
  width: 100%;
  height: 100%;
  background: #ffffff;
  left: 0;
  top: 0;
  border-radius: 10px;
}
  </style>
  <body style="background-color:#e7faf8;">
    <table>
      <tr>
        <td> <a href="theme/form1.php" class="glow-on-hover" style="font-size: 20px; letter-spacing:3px; text-decoration: none;" type="button">OB First Trimester USG Report</a> </td>
        <td> <a href="theme/form2.php" class="glow-on-hover" style="font-size: 20px; letter-spacing:3px; text-decoration: none;" type="button">OB 2/3 Trimester USG Report</a> </td>
        <td> <a href="theme/form3.php" class="glow-on-hover" style="font-size: 20px; letter-spacing:3px; text-decoration: none;" type="button">Pelvis Scan Report</a> </td>
        <td> <a href="theme/form4.php" class="glow-on-hover" style="font-size: 20px; letter-spacing:3px; text-decoration: none;" type="button">Pelvis Scan Report (2)</button> </td>
      </tr><tr></tr>
      <tr>
        <td> <a href="reportgeneration/form1.php" class="glow-on-hover-bw" style="font-size: 20px; letter-spacing:3px; text-decoration: none;" type="button">OB First Trimester USG Report</a> </td>
        <td> <a href="reportgeneration/form2.php" class="glow-on-hover-bw" style="font-size: 20px; letter-spacing:3px; text-decoration: none;" type="button">OB 2/3 Trimester USG Report</a> </td>
        <td> <a href="reportgeneration/form3.php" class="glow-on-hover-bw" style="font-size: 20px; letter-spacing:3px; text-decoration: none;" type="button">Pelvis Scan Report</a> </td>
        <td> <a href="reportgeneration/form4.php" class="glow-on-hover-bw" style="font-size: 20px; letter-spacing:3px; text-decoration: none;" type="button">Pelvis Scan Report (2)</button> </td>
      </tr>
    </table>
  </body>
</html>
