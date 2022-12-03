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
    
         <!-- rating-->
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
        <link rel="stylesheet" href="jquery.rateyo.css"/>
            <title>Document</title>
</head>
<body>
<?php include('header.php'); ?>

 <!-- cards-->
    <div class="parent_container">
        <div class="parent_flex-item">
            <div class="parent_flex-item-inner">
                <div class="card-front bg-v">
                    <i class="fa fa-child fa-3x tile-icon icon-white"></i>
                    <h4>Childern</h4>
                    <p class="detail">XX</p>
                </div>
            </div>
        </div>
        <div class="parent_flex-item">
            <div class="parent_flex-item-inner">
                <div class="card-front bg-m">
                    <i class="fa fa-heart fa-3x tile-icon icon-white"></i>
                 <h4>Fee paid</h4>
                    <p class="detail">XXXX</p>
                </div>
            </div>
        </div>

        <div class="parent_flex-item">
            <div class="parent_flex-item-inner">
                <div class="card-front bg-b">
                    <i class="fa fa-sun-o fa-3x tile-icon icon-white"></i>
                    <h4>Fee Remaining</h4>
                    <p class="detail">XXXX</p>
                </div>
            </div>
        </div>

        <div class="parent_flex-item">
            <div class="parent_flex-item-inner">
                <div class="card-front bg-g">
                    <i class="fa fa-bar-chart fa-3x tile-icon icon-white"></i>
                    <h4>Monthly fees</h4>
                    <p class="detail">XXXX</p>
                </div>
            </div>
        </div>
    </div>

        <div class="create_children">
            <button id="openBtn">Create Childern</button>
            <br>
        </div>

<!--- rating--->
<div class="con_3">
<div class="parent_container-rating">
        <div class="row">
         <form action="" method="post">
 
            <div class="rating-col">
                <h3>Student Rating</h3>
                 <label>Name</label>
                <input type="text" name="name" required>
 
                 <div class="rateyo" id= "rateYo"
                 data-rateyo-rating="5"
                 data-rateyo-num-stars="5"
                 data-rateyo-score="3">
                </div>
 
                <span class='result'>0</span>
                 <input type="hidden" name="rating"><br>

                 <textarea name="review" id="" cols="30" rows="5" placeholder="How was your overall experince with our application"></textarea><br><br>
                <input type="submit" name="add" id="submit">
             </div>
        </form>
        </div>
    </div>
    <div class="notice-section">
            <!--notice board start here-->
            <div class="container-notice">
                <div class="noticeboard">
                    <div class="notice">
                        <h3>Notice Board</h3>
                        
                    </div>
                    <div class="notice-box-wrap">

                        <div class="notice-list">
                            <h6 class="notice-title">
                            <?php
                         
                            
                         $bname = $_SESSION['Parent_Id'];
                           $stmt = $conn->prepare("SELECT Grade_Name FROM student WHERE Parent_Id = ? ");
                           $stmt->bind_param("s", $bname);
                           $stmt->execute();
                           $result1 = $stmt->get_result(); // get the mysqli result
                            
                            $grade = 0;
                           while($row1 = mysqli_fetch_array($result1)){
                          
                           global $grade;
                           $grade = $row1[0];
                           }
                          
                          // $bname = $_SESSION['Parent_Id'];
                           $query = $conn->prepare("SELECT * FROM notice_board WHERE Position='parent'");
                          // $query->bind_param("s",  $bname ); 
                           $query->execute();
                           $result = $query->get_result();
					    while($row = mysqli_fetch_array($result))
						{
							echo "<strong><i><li><font color=  #ff0066>".$row['Date']."</font></i></li></strong><br><li><b><strong>".$row['Msg_title']."</b></strong></li><br><li><b>".$row['Message']."</b></li><br><i><u><b><font color= #000080<li>".$row['Poster_Name']."</font></b></i></u></li><br><br><hr>";
						}
			            ?>
                            </h6>
                        </div>
                    </div>
                </div>
                </div>
    </div>
    </div>
    

 <script src="jquery.js"></script>
 <script src="jquery.rateyo.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
<script>
    $(function () {
        $(".rateyo").rateYo().on("rateyo.change", function (e, data) {
            var rating = data.rating;
            $(this).parent().find('.score').text('score :'+ $(this).attr('data-rateyo-score'));
            $(this).parent().find('.result').text('rating :'+ rating);
            $(this).parent().find('input[name=rating]').val(rating); //add rating value to input field
        });
    });
 
</script>

    <?php
        //require 'db_connection.php';
            if ($_SERVER["REQUEST_METHOD"] == "POST")
                {
                $name = $_POST["name"];
                $rating = $_POST["rating"];
 
                $sql = "INSERT INTO rate (Name,Rate) VALUES ('$name','$rating')";
                if (mysqli_query($conn, $sql))
                    {
                         echo "New Rate addedddd successfully";
                    }
                else
                    {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                        mysqli_close($conn);
                    }
    ?>

            <div id="myForm" class="Form">

                <div class="parent_form-container">
                    <span class="close">&times;</span>
                    <form action="" method="POST">
                        <h2>CREATE CHILDERN</h2>

                        <input type="text" placeholder="Enter the user Name" name="uname" required>

                        <input type="email" placeholder="Enter the email" name="email" required>

                        <br>
                        <input type="text" placeholder="Enter the first Name" name="fname" required>


                        <input type="text" placeholder="Enter the last Name" name="lname" required>
                        <br>
                        <input type="password" placeholder="Enter Password" name="psw" required>

                        <input type="password" placeholder="Enter Confirm Password" name="cpsw" required>
                        <br>
                        <label for="gender">Gender</label>
                        <input type="radio" name="gender" value="Male" required><span>Male</span>
                        <input type="radio" name="gender" value="Female" required><span>Female</span>
                        <select name="grade">
                            <option>-Select grade-</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                        <br>
                        <input type="date" placeholder="Enter the date of birth" name="dob" required>
                        <input type="number" placeholder="Enter the phone number" name="pnumber" required>
                        
                        <input type="submit" class="btn" value="Submit" name="btn-save" > 
                        <button type="reset" class="btn cancel">Clear</button>
                    </form>
                </div>

            </div>      
    <?php
        $UserName=$_SESSION['U_Name'];
	    $user_check_parent = "SELECT * FROM parent WHERE User_Name='$UserName'";
        $result_Parent = mysqli_query($conn, $user_check_parent);
        $row_parent= mysqli_fetch_array($result_Parent, MYSQLI_ASSOC);
    
if (isset($_POST['btn-save'])){
$Id= $row_parent['Parent_Id'];
$Username = mysqli_real_escape_string($conn, $_POST['uname']);
$FirstName = mysqli_real_escape_string($conn, $_POST['fname']);
$LastName = mysqli_real_escape_string($conn, $_POST['lname']);
$gender = mysqli_real_escape_string($conn, $_POST['gender']);
$pass = mysqli_real_escape_string($conn, $_POST['psw']);
$cpass = mysqli_real_escape_string($conn, $_POST['cpsw']);
$DOB = mysqli_real_escape_string($conn, $_POST['dob']);
$pnumber = mysqli_real_escape_string($conn, $_POST['pnumber']);
$email = mysqli_real_escape_string($conn, $_POST['email']);  
$grade = mysqli_real_escape_string($conn, $_POST['grade']);  
//echo $grade;
$user_check_grade = "SELECT * FROM grade WHERE Name='$grade' ";
    $result_grade = mysqli_query($conn, $user_check_grade);
    $row_grade= mysqli_fetch_array($result_grade, MYSQLI_ASSOC);

    $g=$row_grade['Grade_Id'];
$pw =md5($pass);
$sql = "INSERT INTO student (User_Name, Email,Password,First_Name, Last_Name, Gender, DOB, Phone,Parent_Id,Grade_Id) VALUES ('$UserName','$email','$pw','$FirstName','$LastName','$gender','$DOB','$pnumber','$Id','$g')";
if ($conn->query($sql) === TRUE) {
    
   echo '<script>  alert("register successfully....!");</script>';
  } 
}
  ?>
    
    </body>
    
<script>

    var modal = document.getElementById("myForm");

    var btn = document.getElementById("openBtn");

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
</html>
<?php 
}else{
    header("Location: http://localhost/First_Project/pages/login.php");
     exit();
}
 ?>