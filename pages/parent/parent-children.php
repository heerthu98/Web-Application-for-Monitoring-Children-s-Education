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
    <div class="cons">
        <!--
        <div class="sec_1">
            <div class="childern">
                <div>
                    <img src="../img/child.png" width="200px">
                </div>
                <div>
                    <h2></h2>
                    <p>12 Years</p>
                </div>
            </div>
            <div class="meg">
                <select>
                            <?php 
                           // while($r=mysqli_fetch_array($g)){
                                ?>
                                <option><?php //echo $r['First_Name']; ?></option>
                            <?php
                           // }
                            ?>
                        </select><br><br>

                <button class="btn" onclick="openForm()">Send Message</button>

                <div class="form-popup" id="myForm">
                    <form action="pro.php" class="form-container">
                        <button type="button" class="close" onclick="closeForm()"><i class="fa fa-times"></i></button>
                        <textarea class="span4" id="new_message" name="new_message" placeholder="Type in your message" rows="15" cols="30"></textarea>
                        <button class="btn" type="submit">Send Message</button><br><br>
                        <input type="reset" class="btn-re">
                    </form>
                </div>

                <br><br>

                <button class="btn">Attendance</button>
               
            </div>

        </div>-->

        <div class="table-responsive">
            <table class="table table-hover" id="table">
                <thead>
                     <tr>
                        <th scope="col" style="width: 100px;">ID</th>
                        <th scope="col">User Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                         <th scope="col">Gender</th>
                        <th scope="col">Dob</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Grade</th>
                        <th scope="col">Edit/Delete</th>
                    </tr>
                </thead>
    <tbody>

  <?php
  //$result = mysqli_query($conn,"SELECT * FROM parent WHERE Parent_Id = '".$_SESSION['Parent_Id']."'");
         //$row1 = mysqli_fetch_array($result1);
  $result = mysqli_query($conn,"SELECT * FROM student WHERE Parent_Id = '".$_SESSION['Parent_Id']."'  ");
              //$row2 = mysqli_fetch_array($result2);
             // echo $row2['Date'];

    if($result){
        while($row= mysqli_fetch_assoc($result)){
            $id=$row['Parent_Id'];
            $user=$row['User_Name'];
            $email=$row['Email'];
            $fname=$row['First_Name'];
            $lname=$row['Last_Name'];
            $gen=$row['Gender'];
            $dob=$row['DOB'];
            $phn=$row['Phone'];
            $grade=$row['Grade_Name'];

            echo '<tr>
            <td>'.$id.'</td>
            <td>'.$user.'</td>
            <td>'.$email.'</td>
            <td>'.$fname.'</td>
            <td>'.$lname.'</td>
            <td>'.$gen.'</td>
            <td>'.$dob.'</td>
            <td>'.$phn.'</td>
            <td>'.$grade.'</td>
            <td>
            <button class="btn btn-primary"><a class="text-light" id="editBtn">Edit</a></button>
            </td>

          </tr>';
        }
        
    }

  ?>
  </tbody>
</table>
</div>
    </div>   
    <div class="img">
    <img src="../img/parent.jpg" height="400px" width="600px">
</div>
        <script>
            window.onscroll = function() {
                scrollFunction()
            };

            function openForm() {
                document.getElementById("myForm").style.display = "block";
            }

            function closeForm() {
                document.getElementById("myForm").style.display = "none";
            }
        </script>

<?php 
                    $sql="SELECT * FROM student WHERE Parent_Id = '".$_SESSION['Parent_Id']."'";
                    $result=mysqli_query($conn,$sql);
                    $row1=mysqli_fetch_assoc($result);

                    $username=$row1['User_Name'];
                    $email=$row1['Email'];
                    $fname=$row1['First_Name'];
                    $lname=$row1['Last_Name'];
                    $gender=$row1['Gender'];
                    $dob=$row1['DOB'];
                    $phn=$row1['Phone'];
                    $grade = $row1['Grade_Name'];
                    ?>
            <div id="children_Form" class="Form2">

                <div class="form_container_children">
                    <span class="close">&times;</span>
                     <form action="" method="POST">
                    <h2>UPDATE CHILDERN</h2>

                 <label>User Name &nbsp; &nbsp;&nbsp; </label>
                <input type="text" name="uname" value="<?php echo $username;?>" required disabled> 
                <br> <br>
                <label>Email &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</label>
                <input type="email"  name="email" value="<?php echo $email;?>" required>
                <br> <br>
                <label>First Name &nbsp; &nbsp; &nbsp;</label>
                <input type="text"  name="fname"   value="<?php echo $fname;?>" required>
                <br> <br>
                <label>Last Name &nbsp; &nbsp; &nbsp;</label>
                <input type="text"  name="lname"  value="<?php echo $lname;?>" required>
                <br>
                <br>
                <label for="gender">Gender&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;</label>
                <input type="radio" name="gender" value="Male" required><span>Male &nbsp; &nbsp; &nbsp;</span>
                <input type="radio" name="gender" value="Female" required><span>Female</span>
                <br>
                <label>DOB &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</label> 
                <input type="date" name="dob"  value="<?php echo $dob;?>" required><br><br>
                <label>Grade &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</label> 
                <input type="text" name="grade"  value="<?php echo $grade;?>" required><br><br>
                <label>Phone Number</label>
                <input type="number" name="pnumber"  value="<?php echo $phn;?>" required><br>
            <br>
         <input type="submit" class="btn" value="Save" name="btn-saved" > 
        
        </form>
    </div>

    </div>
    <?php 
            if(isset($_POST['btn-saved'])){
                $email=$_POST['email'];
                $fname=$_POST['fname'];
                $lname=$_POST['lname'];
                $gender=$_POST['gender'];
                $dob=$_POST['dob'];
                $phn=$_POST['pnumber'];
                $grd=$_POST['grade'];
                $sql="UPDATE `student` SET `Parent_Id`='".$_SESSION['Parent_Id']."',`Email`='$email',`First_Name`='$fname',`Last_Name`='$lname',`Gender`='$gender',`DOB`='$dob',`Phone`='$phn',`Grade_Name`='$grade' WHERE `Parent_Id`='".$_SESSION['Parent_Id']."'"  ;
            
                
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

<script>

    var modal = document.getElementById("children_Form");

    var btn = document.getElementById("editBtn");

    var span = document.getElementsByClassName("close")[0];


    btn.onclick = function() {
        modal.style.display = "block";
    }

    span.onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

</script> 
    </body>

</html>
<?php 
}else{
    header("Location: http://localhost/First_Project/pages/login.php");
     exit();
}
 ?>