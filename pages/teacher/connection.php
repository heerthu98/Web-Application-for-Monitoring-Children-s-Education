<?php

//intializing variable
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

try{
    //create connection
  $conn = mysqli_connect($servername,$username,$password,$dbname);
  
  
  }
  catch(MySQLi_sql_Exception $ex){
    echo("error in connection");
  }


?>