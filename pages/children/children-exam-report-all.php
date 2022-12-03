<?php
//Initialize the session
session_start();

if (isset($_SESSION['Student_Id']) && isset($_SESSION['U_Name'])) {
    include "../conn.php";
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
    <div class="exam-report-sec-all">
        <div class="top-btn-container">
            <a href="children-exam-report.php" class="top-btn">My result</a>
            <a href="#" class="top-btn">Class Analysis</a>
        </div>
        <div class="class-report">
            <div class="heading">
                <h3>Class Analysis</h3>
            </div>

            <div class="class-exam-row">
                <form action="" method="post" class="mb-3">
                    <div class="class-exam-form-container">
                        <label for="year">Select Year</label>
                        <select name="class-grade" class="class-exam-select">
                            <option value="">Select Year</option>
                            <?php 
                            

                            $s_id = $_SESSION["Student_Id"];
                            $stmt = $conn->prepare("SELECT DISTINCT Grade_Name FROM exam_result WHERE Student_Id = ?");
                            $stmt->bind_param("s", $s_id);
                            $stmt->execute();
                            $result = $stmt->get_result();
                            // $row = $result->fetch_assoc();
                            while($data = mysqli_fetch_array($result))
                            {
                            echo "<option value='". $data['Grade_Name'] ."'>" .$data['Grade_Name'] ."</option>";  // displaying data in option menu
                            }
                            ?>
                        </select>
                    </div>
                    <div class="class-exam-form-container">
                        <label for="year">Select Term</label>
                        <select name="class-term" class="class-exam-select">
                            <option value="">Select Term</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>
                    <div class="class-report-button">
                        <button type="submit" name="class-submit" class="btn-save">submit</button>
                    </div>
                </form>
            </div>
            <?php
               
               // require 'db_connection.php';

                if(isset($_POST['class-submit'])){
                    if(!empty($_POST['class-grade']) && !empty($_POST['class-term'])) {
                    
                        $grade = $_POST['class-grade'];
                        $term = $_POST['class-term'];
                        $stmt = $conn->prepare("SELECT * FROM exam_result WHERE  Grade_Name = ? AND Exam_Type = ?");
                        $stmt->bind_param("ss", $grade, $term);
                        $stmt->execute();
                        $result=$stmt->get_result();
                     
      
                        if(mysqli_num_rows($result) > 0){

                            echo "<table>";
                                if($grade=='1A' || $grade=='2A' || $grade=='3A' || $grade=='4A' || $grade=='5A'){
                                    echo "<tr>";
                                    echo "<th>Full_name</th>";
                                    echo "<th>Religion</th>";
                                    echo "<th>Mathematics</th>";
                                    echo "<th>Environmental Studies</th>";
                                    echo "<th>Tamil</th>";
                                    echo "<th>English</th>";
                                    echo "</tr>";
                                    while($row = mysqli_fetch_array($result)){
                                        echo "<tr>";
                                        echo "<td>" . $row['Student_Id'] . "</td>";
                                        echo "<td>" . $row['Religion'] . "</td>";
                                        echo "<td>" . $row['Maths'] . "</td>";
                                        echo "<td>" . $row['Environment_Studies'] . "</td>";
                                        echo "<td>" . $row['Tamil'] . "</td>";
                                        echo "<td>" . $row['English'] . "</td>";
                                        echo "</tr>";
                                    }
                                }
                                elseif($grade=='6A' || $grade=='7A' || $grade=='8A' || $grade=='9A'){
                                    echo "<tr>";
                                    echo "<th>Full_name</th>";
                                    echo "<th>Religion</th>";
                                    echo "<th>Mathematics</th>";
                                    echo "<th>Science</th>";
                                    echo "<th>Tamil</th>";
                                    echo "<th>English</th>";
                                    echo "<th>History</th>";
                                    echo "<th>Geography</th>";
                                    echo "<th>Health & Pysical Education</th>";
                                    echo "<th>Life skills</th>";
                                    echo "<th>Practical Studies</th>";
                                    echo "<th>Aesthetic</th>";
                                    echo "</tr>";

                                    while($row = mysqli_fetch_array($result)){
                                         echo "<tr>";
                                         echo "<td>" . $row['Student_Id'] . "</td>";
                                        echo "<td>" . $row['Religion'] . "</td>";
                                        echo "<td>" . $row['Maths'] . "</td>";
                                        echo "<td>" . $row['Science'] . "</td>";
                                        echo "<td>" . $row['Tamil'] . "</td>";
                                        echo "<td>" . $row['English'] . "</td>";
                                        echo "<td>" . $row['History'] . "</td>";
                                        echo "<td>" . $row['Geography'] . "</td>";
                                        echo "<td>" . $row['Health'] . "</td>";
                                        echo "<td>" . $row['Life_Skil'] . "</td>";
                                        echo "<td>" . $row['PT'] . "</td>";
                                        echo "<td>" . $row['Choice_Sub_1'] . "</td>";
                                        echo "</tr>";
                                    }
                                }
                                else{
                                    echo "<tr>";
                                    echo "<th>Full_name</th>";
                                    echo "<th>Religion</th>";
                                    echo "<th>Mathematics</th>";
                                    echo "<th>Science</th>";
                                    echo "<th>Tamil</th>";
                                    echo "<th>English</th>";
                                    echo "<th>History</th>";
                                    echo "<th>Basket 1 </th>";
                                    echo "<th>Basket 2 </th>";
                                    echo "<th>Basket 3 </th>";
                                    echo "</tr>";

                                    while($row = mysqli_fetch_array($result)){
                                        echo "<tr>";
                                        echo "<td>" . $row['Student_Id'] . "</td>";
                                        echo "<td>" . $row['Religion'] . "</td>";
                                        echo "<td>" . $row['Maths'] . "</td>";
                                        echo "<td>" . $row['Science'] . "</td>";
                                        echo "<td>" . $row['Tamil'] . "</td>";
                                        echo "<td>" . $row['English'] . "</td>";
                                        echo "<td>" . $row['History'] . "</td>";
                                        echo "<td>" . $row['Basket_1'] . "</td>";
                                        echo "<td>" . $row['Basket_2'] . "</td>";
                                        echo "<td>" . $row['Basket_3'] . "</td>";
                                        echo "</tr>";
    
                                    }
                                }

                                     echo "</table>";

                                    mysqli_free_result($result);
                            } else{
                                echo "No records matching your query were found.";
                            }
                        } else{
                            //echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                            echo 'Please select the grade and term.';
                        }
                    }

                            mysqli_close($conn);
                    ?>
        </div>
    </div>

</body>

</html>
<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>