<?php
// Initialize the session
session_start();

if (isset($_SESSION['Student_Id']) && isset($_SESSION['U_Name'])) {
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css"
        integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/fe3a67443d.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php include('child_header.php'); ?>

    <div class="container">
        <div class="flex-item">
            <div class="flex-item-inner">
                <div class="card-front bg-violet">
                    <i class="fa fa-book fa-3x tile-icon icon-white"></i>
                    <h4>No Of Subjects</h4>
                    <p class="detail">XX</p>
                </div>
            </div>
        </div>

        <div class="flex-item">
            <div class="flex-item-inner">
                <div class="card-front bg-magenta">
                    <i class="fas fa-school fa-3x tile-icon icon-white"></i>
                    <h4>No Of School Days</h4>
                    <p class="detail">XXXX</p>
                </div>
            </div>
        </div>

        <div class="flex-item">
            <div class="flex-item-inner">
                <div class="card-front bg-blue">
                    <i class="fas fa-user-check fa-3x tile-icon icon-white"></i>
                    <h4>No Of Attendance</h4>
                    <p class="detail">XXXX</p>
                </div>
            </div>
        </div>

        <div class="flex-item">
            <div class="flex-item-inner">
                <div class="card-front bg-green">
                    <i class="fas fa-id-badge fa-3x tile-icon icon-white"></i>
                    <h4>Last Term Rank</h4>
                    <p class="detail">XX</p>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="sec_2">

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
                           //require 'db_connection.php';
                           $s_id =$_SESSION['Student_Id'];
                           $results = mysqli_query($conn,"SELECT * FROM student WHERE Student_Id = '".$_SESSION['Student_Id']."'");
                            $row_grade = mysqli_fetch_array($results);
                            $g_id=$row_grade['Grade_Name'];
                          
                           $query =  $conn->prepare("SELECT * FROM notice_board WHERE Position='student' AND Grade_Name='$g_id'");
                           //$query->bind_param("s",  $bname ); 
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
    <!--- rating--->
    <div class="container-rating">
        <div class="row">
            <form action="children-dashboard.php" method="post">
                <div class="rating-col">
                    <h3>Student Rating</h3>
                    <label>Name</label>
                    <input type="text" name="name" required>
                    <div class="rateyo" id="rating" data-rateyo-rating="4" data-rateyo-num-stars="5"
                        data-rateyo-score="3">
                    </div>

                    <span class='result'>0</span>
                    <input type="hidden" name="rating"><br>

                    <textarea name="review" id="" cols="30" rows="5"
                        placeholder=" How was your overall experince with our application"></textarea><br>
                    <b><input id="submit" type="submit" name="add"></b>
                </div>
            </form>
        </div>
    </div>




    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>

    <script>
    $(function() {
        $(".rateyo").rateYo().on("rateyo.change", function(e, data) {
            var rating = data.rating;
            $(this).parent().find('.score').text('score :' + $(this).attr('data-rateyo-score'));
            $(this).parent().find('.result').text('rating :' + rating);
            $(this).parent().find('input[name=rating]').val(rating); //add rating value to input field
        });
    });
    </script>
</body>

</html>
<?php
//require 'db_connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
$name = $_POST["name"];
$rating = $_POST["rating"];
$review = $_POST["review"];

$sql = "INSERT INTO ratee (name,rate,review) VALUES ('$name','$rating','$review')";
if (mysqli_query($conn, $sql))
{
    echo "<font color=green>New rate added successfully</font>";
}
else
{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
}

}else{
    header("Location: http://localhost/First_Project/pages/login.php");
     exit();
}
 ?>
