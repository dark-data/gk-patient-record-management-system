<?php

if(session_id() != ''){
//echo 'Hi, ' . $_SESSION["username"];
?>



<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <link rel = "icon" type = "image/png" href = "images/logo.png" />
        <title>G . K . Hospital</title><style>

        </style>
    </head>

    <frameset rows="16%,*" noresize border="0" >
        <frame src="admin/top.php" scrolling="no">
        <frame src="admin/bottom.php"name="last">
    </frameset>

</html>











<?php
}else{
  require 'sessionerror.php';
}

?>
