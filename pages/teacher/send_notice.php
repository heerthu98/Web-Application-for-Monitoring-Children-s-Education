<?php

include 'connection.php';

if(isset($_POST['btn_send'])){
    $position=$_POST['selectposition'];
    $message=$_POST['message'];
    $send_poster=$_POST['send_poster'];

    $query="INSERT INTO  send_notice(position, messages, poster_name)VALUES(?,?,?)";
    $stmt=$conn->prepare($query);
    $stmt->bind_param("sss",$position,$message,$send_poster);
    $stmt->execute();
    
    if($stmt){

        $_SESSION['status']="Notice Sent Successfully...";
        header('location:teacher-dashboard.php');
    }
    else{
        echo "Something Went Wrong...";
    }

   
}

?>