<?php


// Initialize the session
session_start();
$conn = mysqli_connect('localhost', 'root', '' , 'wedoclever') or die ('Unable to connect');

if (isset($_POST['btn-save'])){
    $UserName = mysqli_real_escape_string($db, $_POST['uname']);
    $FirstName = mysqli_real_escape_string($db, $_POST['fname']);
    $LastName = mysqli_real_escape_string($db, $_POST['lname']);
    $gender = mysqli_real_escape_string($db, $_POST['gender']);
    $pass = mysqli_real_escape_string($db, $_POST['psw']);
    $cpass = mysqli_real_escape_string($db, $_POST['cpsw']);
    $DOB = mysqli_real_escape_string($db, $_POST['dob']);
    $pnumber = mysqli_real_escape_string($db, $_POST['pnumber']);
    $email = mysqli_real_escape_string($db, $_POST['email']);  


    
    $pw =md5($pass);
    $sql = "INSERT INTO student (User_Name, Email,Password,First_Name, Last_Name, Gender, DOB, Phone) VALUES ('$UserName','$email','$pw','$FirstName','$LastName','$gender','$DOB','$pnumber')";
    if ($db->query($sql) === TRUE) {
        header("location: parent-dashboard.php");
        
      } else {
        echo "Error: " . $sql . "<br>" . $db->error;
      }
}

?>