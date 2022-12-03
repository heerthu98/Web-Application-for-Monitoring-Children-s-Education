<?php
// Initialize the session
session_start();

if (isset($_SESSION['Parent_Id']) && isset($_SESSION['U_Name'])) {
    include "../conn.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../styles/styles.css?v=<?php echo time(); ?>">
    <title>Document</title>
</head>
<body>
<?php include('header.php'); ?>
    <div class="con">
            <div class="user_Information">
                <form action="" method="POST">
                    <?php 
                    $sql="SELECT * FROM parent WHERE Parent_Id = '".$_SESSION['Parent_Id']."'";
                    $result=mysqli_query($conn,$sql);
                    $row=mysqli_fetch_assoc($result);

                    $username=$row['User_Name'];
                    $email=$row['Email'];
                    $fname=$row['First_Name'];
                    $lname=$row['Last_Name'];
                    $gender=$row['Gender'];
                    $dob=$row['DOB'];
                    $phn=$row['Phone'];
                    ?>
                        <h3>Update your Profile</h3>

                        User Name<input type="text" name="uname" value="<?php echo $username;?>" required>

                        <label>Email</label>
                        <input type="email"  name="email" value="<?php echo $email;?>" required>

                        <label>First Name</label>
                        <input type="text"  name="fname"   value="<?php echo $fname;?>" required>
                        <br>
                        <label>Last Name</label>
                        <input type="text"  name="lname"  value="<?php echo $lname;?>" required>
                        <br>
                        <br>
                        <label for="gender">Gender</label>
                        <input type="radio" name="gender" value="Male" required><span>Male</span>
                        <input type="radio" name="gender" value="Female" required><span>Female</span>
                        <br>
                        <label>Date</label> 
                        <input type="date" name="dob"  value="<?php echo $dob;?>" required><br>
                        <label>Phone Number</label>
                        <input type="number" name="pnumber"  value="<?php echo $phn;?>" required><br>
                        <br>
                        <input type="submit" class="btn" value="Update" name="btn-save">
                </form>
            </div>

            <?php 
            if(isset($_POST['btn-save'])){
                $username=$_POST['uname'];
                $email=$_POST['email'];
                $fname=$_POST['fname'];
                $lname=$_POST['lname'];
                $gender=$_POST['gender'];
                $dob=$_POST['dob'];
                $phn=$_POST['pnumber'];
            
                $sql="UPDATE `parent` SET `Parent_Id`='".$_SESSION['Parent_Id']."',`Email`='$email',`First_Name`='$fname',`Last_Name`='$lname',`Gender`='$gender',`DOB`='$dob',`Phone`='$phn' WHERE `Parent_Id`='".$_SESSION['Parent_Id']."'"  ;
            
                
                $result=mysqli_query($conn,$sql);
            
                if($result){
                    echo '<script>  
                    alert("update successfully....!");
                   </script>';
                }
                else{
                    die(mysqli_error($con));
                }
            }
            ?>
            <!--change password-->
            <div class="change_password">
                <form action="p_setting.php" method="POST" name="myForm" onsubmit = "return(validate());">
                    <h3 style="text-align: center;color: #1c6e8c;font-size: 20px;"><b>Change password</b></h3>
                    <br>
                    <?php if (isset($_GET['error'])) { ?>
     		        <p class="error"><?php echo $_GET['error']; ?></p>
     	            <?php } ?>

     	            <?php if (isset($_GET['success'])) { ?>
                    <p class="success"><?php echo $_GET['success']; ?></p>
                     <?php } ?>
                    <label>Current Password</label><br>
                   
                    <input type="password"  name="op" /><br><br>
                    <label>New Password</label><br><br>
                    <input type="password"  name="np" /><br>
                        <p>Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.</p>
                        <br>
                        <label>Verify</label><br><br>
                    <input type="password" name="c_np" />
                    <br><br>
                    <button type="submit" class="btn" name="btn_change_ps">Save</button><br>
                </form>
            </div>
    </div>
    <?php
    
?>
</body>
    <script type="text/javascript">
        function validate() {
      
            if( document.myForm.cpassword.value == "" ) {
               alert( "Please enter Current Password !" );
               document.myForm.cpassword.focus() ;
               return false;
            }
            if( document.myForm.npassword.value == "" ) {
               alert( "Please enter New Password !" );
               document.myForm.npassword.focus() ;
               return false;
            }
            if( document.myForm.vpassword.value == "" ) {
               alert( "Please the verify Password !" );
               document.myForm.vpassword.focus() ;
               return false;
            }
            
            return( true );
         }
    </script>
    
</html>
<?php 
}else{
    header("Location: http://localhost/First_Project/pages/login.php");
     exit();
}
 ?>