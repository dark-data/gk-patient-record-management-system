<?php
// Starting session
session_start();
header("Location: ../index.php");
// Destroying session
session_destroy();
?>
