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
    <div class="exam-report_student">
        <div class="heading_1">
            <h3>Class Analysis</h3>
        </div>
        <!--select grade student name -->
        <div class="select_data">
            <form action="" method="post" class="mb-3">
                <div class="class-exam-form-container" >
                    <br>
                        <label for="year">&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;Select Name &nbsp; &nbsp; </label> 
                        <select name="class-name" class="class-exam-select">
                            <option value="" disabled selected>--select--</option>
                                <?php 
                                    $bname = $_SESSION['Parent_Id'];
                                     $stmt = $conn->prepare("SELECT DISTINCT User_Name FROM student WHERE Parent_Id= ?");
                                     $stmt->bind_param("s", $bname);
                                     $stmt->execute();
                                     $result = $stmt->get_result();
                                    while($data = mysqli_fetch_array($result))
                                        {
                                            echo "<option value='". $data['User_Name'] ."'>" .$data['User_Name'] ."</option>";  
                                            // displaying data in option menu
                                        }
                                ?>
                        </select>
                        <label for="grade">&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;Select Grade &nbsp; &nbsp;</label>
                        <select name="report-grade" class="exam-select">
                            <option value="">Select Grade</option>
                            <?php 
                           //view all grades
                           $user_check_grade = "SELECT * FROM grade ";
                           $result_IN_grade = mysqli_query($conn, $user_check_grade);
                         
                            while($data = mysqli_fetch_array( $result_IN_grade))
                            {
                                echo "<option value='". $data['Grade_Name'] ."'>" .$data['Grade_Name'] ."</option>";  
                             // displaying data in option menu
                            }
                            ?>
                         </select>
                        <label for="year">&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;Select Term &nbsp; &nbsp;&nbsp; &nbsp;</label>
                        <select name="report-term" class="exam-select">
                            <option value="">Select Term</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                       
                     <button type="submit" name="class-submit" class="btn btn-primary">Submit</button>
                </div>
            </from>
        </div>
        <div class="exam_position">
             <div class="status_student">
                 <br>
             <?php
                   if(isset($_POST['class-submit'])){
                    if(!empty($_POST['report-grade']) && !empty($_POST['report-term'])) {
                           
                        //select student id
                        $bname = $_POST['class-name'];
                        $user_check_student = "SELECT * FROM student WHERE User_Name='$bname' ";
		                 //echo $U_Name, $P_Word;
		                $result_student = mysqli_query($conn, $user_check_student);
		                $row5 = mysqli_fetch_array($result_student, MYSQLI_ASSOC);
                        // Attempt select query execution
                        $id=$row5['Student_Id'];
                        $grade = $_POST['report-grade'];
                        $term = $_POST['report-term'];
                        $stmt = $conn->prepare("SELECT * FROM exam_result WHERE  Student_Id = ? AND Grade_Name = ? AND Exam_Type = ?");
                        $stmt->bind_param("sss",$id, $grade, $term);
                       $stmt->execute();
                       $result=$stmt->get_result();
                       $row = $result->fetch_assoc();
                      
                     
                 ?>
                <label for="Rank"><b>Rank</b></label>
                <label class="Rank_1">
                    <?php
                    if(mysqli_num_rows($result) > 0){

                        echo "<b>" . $row['Rank'] . "</b>";
                    }
                    ?>
                </label>

                <label for="Total"><b>Total</b></label>
                <label class="Total_1">
                    <?php
                    if(mysqli_num_rows($result) > 0){

                        echo "<b>" . $row['Total'] . "</b>";
                    }
                    ?>
                </label>

                <label for="Avg"><b>Average</b></label>
                <label class="Avg_1">
                    <?php
                    if(mysqli_num_rows($result) > 0){

                        echo "<b>" . $row['Avg'] . "</b>";
                    }
                    ?>
                </label>
                <?php
                 }
                }
                ?>
            </div>
        </div>
        <div class="view_result_parent">
            <div class="report_table_student">
                    <?php
                   
                    if(isset($_POST['class-submit'])){
                    if(!empty($_POST['report-grade']) && !empty($_POST['report-term'])) {
                           
                        //select student id
                        $bname = $_POST['class-name'];
                        $user_check_student = "SELECT * FROM student WHERE User_Name='$bname' ";
		                 //echo $U_Name, $P_Word;
		                $result_student = mysqli_query($conn, $user_check_student);
		                $row5 = mysqli_fetch_array($result_student, MYSQLI_ASSOC);
                        // Attempt select query execution
                        $id=$row5['Student_Id'];
                        $grade = $_POST['report-grade'];
                        $term = $_POST['report-term'];
                        $stmt = $conn->prepare("SELECT * FROM exam_result WHERE  Student_Id = ? AND Grade_Name = ? AND Exam_Type = ?");
                        $stmt->bind_param("sss",$id, $grade, $term);
                       $stmt->execute();
                       $result=$stmt->get_result();
                       $row = $result->fetch_assoc();
                       //$user_check_exam = "SELECT * FROM student,exam_result WHERE User_Name = ' $grade' AND Grade_Name = ' $bname' AND Exam_Type = ' $term'";
                        //$result_IN_exam = mysqli_query($conn,$user_check_exam);
                         // $row = mysqli_fetch_array($result_IN_exam, MYSQLI_ASSOC);
                        // $row = mysqli_fetch_assoc($result_IN_exam)
                       //$count = mysqli_num_rows($result_IN_exam);
                     //if($results = mysqli_query($link, $result)){
                if( mysqli_num_rows($result) > 0){

                            echo "<table>";
                            echo "<tr>";
                            echo "<th>Subject</th>";
                            echo "<th>Marks</th>";
                            echo "</tr>";

                            if($grade=='1A' || $grade=='2A' || $grade=='3A' || $grade=='4A' || $grade=='5A'){
                          
                            echo "<tr>";
                            echo "<td>Religion</td>";
                            echo "<td>" . $row['Religion'] . "</td>";
                            echo "</tr>";
        
                            echo "<tr>";
                            echo "<td>Mathematics</td>";
                            echo "<td>" . $row['Maths'] . "</td>";
                            echo "</tr>";

                            
                            echo "<tr>";
                            echo "<td>Tamil</td>";
                            echo "<td>" . $row['Tamil'] . "</td>";
                            echo "</tr>";

                            echo "<tr>";
                            echo "<td>Environment Studies</td>";
                            echo "<td>" . $row['Environment_Studies'] . "</td>";
                            echo "</tr>";

                            echo "<tr>";
                            echo "<td>English</td>";
                            echo "<td>" . $row['English'] . "</td>";
                            echo "</tr>";
                        }
                        else if($grade=='6A' || $grade=='7A' || $grade=='8A' || $grade=='9A'){
                            echo "<tr>";
                            echo "<td>Religion</td>";
                            echo "<td>" . $row['Religion'] . "</td>";
                            echo "</tr>";
        
                            echo "<tr>";
                            echo "<td>Mathematics</td>";
                            echo "<td>" . $row['Maths'] . "</td>";
                            echo "</tr>";

                            
                            echo "<tr>";
                            echo "<td>Tamil</td>";
                            echo "<td>" . $row['Tamil'] . "</td>";
                            echo "</tr>";

                            echo "<tr>";
                            echo "<td>Science</td>";
                            echo "<td>" . $row['Science'] . "</td>";
                            echo "</tr>";

                            echo "<tr>";
                            echo "<td>English</td>";
                            echo "<td>" . $row['English'] . "</td>";
                            echo "</tr>";

                                                        
                            echo "<tr>";
                            echo "<td>History</td>";
                            echo "<td>" . $row['History'] . "</td>";
                            echo "</tr>";
        
                            echo "<tr>";
                            echo "<td>Geography</td>";
                            echo "<td>" . $row['Geography'] . "</td>";
                            echo "</tr>";

                            
                            echo "<tr>";
                            echo "<td>Health & Pysical Education</td>";
                            echo "<td>" . $row['Health'] . "</td>";
                            echo "</tr>";

                            echo "<tr>";
                            echo "<td>Life skills</td>";
                            echo "<td>" . $row['Life_Skill'] . "</td>";
                            echo "</tr>";

                            echo "<tr>";
                            echo "<td>Practical & Technical Studies</td>";
                            echo "<td>" . $row['PT'] . "</td>";
                            echo "</tr>";

                            echo "<tr>";
                            echo "<td>Music/Arts/Dance/Drama</td>";
                            echo "<td>" . $row['Choice_Sub_1'] . "</td>";
                            echo "</tr>";
                        }
                        elseif($grade=='10A' || $grade=='11A' ){

                            echo "<tr>";
                            echo "<td>Religion</td>";
                            echo "<td>" . $row['religion'] . "</td>";
                            echo "</tr>";
        
                            echo "<tr>";
                            echo "<td>Mathematics</td>";
                            echo "<td>" . $row['Maths'] . "</td>";
                            echo "</tr>";

                            
                            echo "<tr>";
                            echo "<td>Tamil</td>";
                            echo "<td>" . $row['Tamil'] . "</td>";
                            echo "</tr>";

                            echo "<tr>";
                            echo "<td>Science</td>";
                            echo "<td>" . $row['Science'] . "</td>";
                            echo "</tr>";

                            echo "<tr>";
                            echo "<td>English</td>";
                            echo "<td>" . $row['English'] . "</td>";
                            echo "</tr>";

                                                        
                            echo "<tr>";
                            echo "<td>History</td>";
                            echo "<td>" . $row['History'] . "</td>";
                            echo "</tr>";
        
                            echo "<tr>";
                            echo "<td>Music/Arts/Dance/Drama</td>";
                            echo "<td>" . $row['Basket_1'] . "</td>";
                            echo "</tr>";

                            
                            echo "<tr>";
                            echo "<td>Commerce/Geogrphy</td>";
                            echo "<td>" . $row['Basket_2'] . "</td>";
                            echo "</tr>";

                            echo "<tr>";
                            echo "<td>ICT/Political/Citizin/Home Science</td>";
                            echo "<td>" . $row['Basket_3'] . "</td>";
                            echo "</tr>";
                        }
                        else{
                            echo"invalid account";
                        }
                
                echo "</table>";

                                mysqli_free_result($result);
             } else{
                                echo "No records matching your query were found.";
                            }
                            } else{
                                echo 'Please select the grade and term.';
                            }
                        }
                         mysqli_close($conn);
                        
            ?> 
                </div>
                
        </div>
    </div>
</body>
</html>
<?php 
}else{
    header("Location: http://localhost/First_Project/pages/login.php");
     exit();
}
 ?>