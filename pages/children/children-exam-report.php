<?php
// Initialize the session
session_start();
$conn = mysqli_connect('localhost', 'root', '' , 'wedoclever') or die ('Unable to connect');
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../styles/styles.css?v=<?php echo time(); ?>">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/fe3a67443d.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php include('child_header.php'); ?>
    <div class="exam-report-sec">
        <div class="top-btn-container">
            <a href="#" class="top-btn">My result</a>
            <a href="children-exam-report-all.php" class="top-btn">Class Analysis</a>
        </div>
        <div class="exam-report">
            <div class="heading">
                <h3>Term Report</h3>
            </div>
            <div class="exam-row">
                <form action="" method="post" class="mb-3">
                    <div class="exam-form-container">
                        <label for="grade">Select Grade</label>
                        <select name="report-grade" class="exam-select">
                            <option value="">Select Grade</option>
                            <?php 
                            // require 'db_connection.php';
                            $s_id = $_SESSION['Student_Id'];
                            $stmt = $conn->prepare("SELECT DISTINCT Grade_Name FROM exam_result WHERE Student_Id = ?");
                            $stmt->bind_param("s", $s_id);
                            $stmt->execute();
                            $result = $stmt->get_result();
                            while($data = mysqli_fetch_array($result))
                            {
                            echo "<option value='". $data['Grade_Name'] ."'>" .$data['Grade_Name'] ."</option>";  // displaying data in option menu
                            }
                            ?>
                        </select>
                    </div>
                    <div class="exam-form-container">
                        <label for="year">Select Term</label>
                        <select name="report-term" class="exam-select">
                            <option value="">Select Term</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>
                    <button type="submit" name="report-submit" class="btn-save">submit</button>
                </form>

                <div class="exam-rank">
                    <div class="stat">
                    <?php
                   // require 'db_connection.php';
                    if(isset($_POST['report-submit'])){
                    if(!empty($_POST['report-grade']) && !empty($_POST['report-term'])) {
                           
             
                // Attempt select query execution
                        $s_id = $_SESSION['Student_Id'];
                        $grade = $_POST['report-grade'];
                        $term = $_POST['report-term'];
                        $stmt = $conn->prepare("SELECT * FROM exam_result WHERE Student_Id = ? AND Grade_Name = ? AND Exam_Type = ?");
                        $stmt->bind_param("sss", $s_id, $grade, $term);
                        $stmt->execute();
                        $result=$stmt->get_result();
                        $row = $result->fetch_assoc();

                        if(mysqli_num_rows($result) > 0){?>
                        <label for="Rank">Rank</label>
                        <h6 class="rank">
                            <?php
                   
                            echo "<b>" . $row['Rank'] . "</b>";
                        
                 ?>
                        </h6>
                    </div>
                    <div class="stat">
                        <label for="total">Total</label>
                        <h6 class="rank">
                            <?php
                    

                            echo "<b>" . $row['Total'] . "</b>";
                       
                 ?>
                        </h6>
                    </div>
                    <div class="stat">
                        <label for="avg">Avg</label>
                        <h6 class="rank">
                            <?php
                   

                            echo "<b>" . $row['Avg'] . "</b>";
                        }
                        
                                mysqli_free_result($result);
                            }
                            }
                        

                            
                 ?>
                        </h6>
                    </div>
                </div>



                <div class="report_table1">
                    <?php
                   // require 'db_connection.php';
                    if(isset($_POST['report-submit'])){
                    if(!empty($_POST['report-grade']) && !empty($_POST['report-term'])) {
                           
             
            // Attempt select query execution
                        $s_id = $_SESSION['Student_Id'];
                        $grade = $_POST['report-grade'];
                        $term = $_POST['report-term'];
                        $stmt = $conn->prepare("SELECT * FROM exam_result WHERE Student_Id = ? AND Grade_Name = ? AND Exam_Type = ?");
                        $stmt->bind_param("sss",$s_id, $grade, $term);
                        $stmt->execute();
                        $result=$stmt->get_result();
                        $row = $result->fetch_assoc();
            
            // if($results = mysqli_query($link, $result)){
                if(mysqli_num_rows($result) > 0){

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
                           //  mysqli_close($conn);
                 ?>
                </div>

            </div>

        </div>

    </div>

</body>

</html>