
<!DOCTYPE html>

<html>
<style>
html{
  overflow-x: hidden;
}
#box{
padding: 15px 10px;
margin: 8px 0 ;
border: 2px solid #EBDEF0;
border-radius: 25%;
width: 88%;
}

button:hover {opacity: 0.8;}

.footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: #4d4c4c;
   color: white;
   text-align: center;
}

img.avatar {
    width: 20%;
    border-radius: 50%;
}

.container {
    border-radius: 5px;
    padding: 56px;
	background-color: #AF7AC5;
}

table{
opacity: 0.9;
    width:40%;
    border-radius: 5px;
    background-color: #f2f2f2;
    padding:30px 50px;
}
img  {
    border-radius: 0px 5px 0px 0px;
    float: right;
}
</style>

  <head>
    <meta charset="UTF-8">
<link rel = "icon" type = "image/png" href = "images/logo.png" />
    <title>G . K . Hospital</title>

    <script src="libraries/p5.js" type="text/javascript"></script>

    <script src="libraries/p5.dom.js" type="text/javascript"></script>
    <script src="libraries/p5.sound.js" type="text/javascript"></script>

    <script src="sketch.js" type="text/javascript"></script>

    <style> body {padding: 0; margin: 0;} canvas {vertical-align: top;} </style>
  </head>
<body background="images/login.jpg" style="background-size: 100%;background-repeat: no-repeat;">

<form name='login' method="POST" action="login.php" >
<div style="background-color: #ffffff; border-radius: 3px;border-bottom: 3px solid #116ab9; padding-top:5px; padding-left: 6px; position: absolute; width:100%;top:0px;">
  <img src='images/logo.png'style="float: left;padding: 10px 18px;width:80px; height:80px;"/><center><p style="letter-spacing: 3px;color: #454a4b;font-size:30px;padding-top:20px;">System for Patient Record management. </p></center>
</div>
<br><br><br>

<div  align='center' style="padding-top:8%;">
<table><tr><td><h1><font color="#57575B">Sign in</font><img src="images/av.png" style="width:80px; height:80px;"></h1>
</td></tr><tr><td><br/>
<input type="text" name="uname" maxlength="30" style="width: 100%;    padding: 12px 20px;    margin: 8px 0;    display: inline-block;    border: 1px solid #ccc;    border-radius: 4px;    box-sizing: border-box;" placeholder="    Enter Username"  required>
<BR>
</td>
</tr><tr>
<td>
<input type="password" style="width: 100%;    padding: 12px 20px;    margin: 8px 0;    display: inline-block;    border: 1px solid #ccc;    border-radius: 4px;    box-sizing: border-box;"placeholder="    Password" name="psw" maxlength="30" required>
<br><br><br>
</td></tr><tr>
<td>
<button type="submit" style="width: 100%;background-color: #116ab9;color: white;padding: 14px 20px;margin: 8px 0;border: none;border-radius: 4px;cursor: pointer;letter-spacing: 3px;font-size:16px;">
  Login
</button><br/>
</td></tr></table> </div>

</form>


  </body>
</html>
