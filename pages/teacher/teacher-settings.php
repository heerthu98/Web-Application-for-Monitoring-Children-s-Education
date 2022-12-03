<?php
  include 'update.php';


?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../styles/styles.css">
    <title>teacher</title>
</head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<body>
<?php include('teacher_header.php'); ?>
        <div class="sec_2">
            <form action="update.php" method="POST">
            <div class="profilesection">
                <div class="heading">
                    <h3>Update your Profile.</h3>
                </div>
                <div class="editprofile">
                    <label for="uname">Username</label>
                    <input type="text" id="u_name" name="uname" required>
                    <label for="fname">First Name</label>
                    <input type="text" id="f_name" name="fname" required> 
                    <label for="pass">Password</label>
                    <input type="password" id="password" name="pass" required>
                    <label for="pno">Phone number</label>
                    <input type="phone" id="pnumber" name="pno" required>
                    <label for="dob">Date Of Birth</label>
                    <input type="date" id="dobirth" name="dob" required>
                </div>
                <div class="editprofile_1">
                    <label for="email">Email</label>
                    <input type="email" id="e_mail" name="email" required>
                    <label for="lname">Last Name</label>
                    <input type="text" id="l_name" name="lname" required>
                    <label for="confirmpassword">Confirm Password</label>
                    <input type="password" id="confirm_pass" name="confirmpassword" required>
                    <label>Address</label>
                    <input type="text" id="aaddress" name="address" required>
                    <label for="selectgender">Gender</label><br>
                    <select name="selectgender" id="ggender" required>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
                <div class="editbutton">
                    <button type="submit" name="submit" class="send-btn1">submit</button>
                    <button type="submit" name="reset" class="reset-btn1">Reset</button>  
                </div>      
            </div>
            </form>
        </div>
        
        <script>
            window.onscroll = function() {scrollFunction()};

            function openForm() {
              document.getElementById("myForm").style.display = "block";
            }
            
            function closeForm() {
              document.getElementById("myForm").style.display = "none";
            }
            </script>
            
    </body>
</html>