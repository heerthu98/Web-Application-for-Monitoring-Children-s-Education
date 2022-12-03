<?php
  include 'connection.php';
 

  if(isset($_POST['submit'])){
    $username =  $_POST['uname'];
    $firstname =  $_POST['fname'];
    $lastname = $_POST['lname'];
    $password =  $_POST['pass'];
    $confirmpassword = $_POST['confirmpassword'];
    $email = $_POST['email'];
    $dateofbirth = $_POST['dob'];
    $gender = $_POST['selectgender'];
    $address =  $_POST['address'];
    $phonenumber = $_POST['pno'];
    
   

    $query="INSERT INTO users(Username, First_name, Last_Name, User_Password, Confirm_Password, Email, DOB, Gender, User_Address, Phone)VALUES(?,?,?,?,?,?,?,?,?,?)";
    $stmt=$conn->prepare($query);
    $stmt->bind_param("sssssssssi",$username,$firstname,$lastname,$password,$confirmpassword,$email,$dateofbirth,$gender,$address,$phonenumber);
    $stmt->execute();


  }
  
    
  ?>