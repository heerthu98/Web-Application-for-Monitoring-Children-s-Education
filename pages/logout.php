<?php 
session_start();

session_unset();
session_destroy();

//echo ('<script>window.location.replace("http://localhost/First_Project/pages/login");</script>');
header("Location: http://localhost/First_Project/pages/login.php");
?>