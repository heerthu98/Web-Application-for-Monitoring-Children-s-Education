<?php
// Initialize the session
session_start();

if (isset($_SESSION['Student_Id']) && isset($_SESSION['U_Name'])) {
    include "../conn.php";
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../styles/styles.css?v=<?php echo time(); ?>">
    <title>Attendance</title>
    <script src="https://kit.fontawesome.com/fe3a67443d.js" crossorigin="anonymous"></script>
    </head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<body>
<?php include('child_header.php'); ?> 

    <div class="sec_attendance">
        <div class="attendance_card">
            
                <div class="title">
                    <h3>Attendance Analysis</h3>
                </div>
                <div>
                    <canvas class="chart" id="myChart" ></canvas>
                </div> 
                <div class="css-rainbow-text"><i> Attend Today.... <br> Achieve Tomorrow....</i><br>
                <img src="../../img/edu1.png" ></div>  
        </div>

        <div class="attendance-report">
                    <div class="heading">
                        <h3>Student Attendence</h3>
                    </div>
                    <div class="std-row">
                    <form action="" method="post" class="mb-3">
                        <div class="std-form-container">      
                            <label for="year">Select Grade</label>
                            <select name="attent-grade" class="exam-select">
                            <option value="">Select Grade</option>
                            <?php 
                             require 'db_connection.php';
                            $bname = $_SESSION["username"];
                            $stmt = $conn->prepare("SELECT DISTINCT grade FROM attendance WHERE name = ?");
                            $stmt->bind_param("s", $bname);
                            $stmt->execute();
                            $result = $stmt->get_result();
                            while($data = mysqli_fetch_array($result))
                            {
                            echo "<option value='". $data['grade'] ."'>" .$data['grade'] ."</option>";  // displaying data in option menu
                            }
                            ?>
                        </select>
                        </div>
                            <div class="std-form-container">
                                <label>Select Month</label>
                                <select class="std-select">
                                    <option value="">Select Month</option>
                                    <option value="1">January</option>
                                    <option value="2">February</option>
                                    <option value="3">March</option>
                                    <option value="4">April</option>
                                    <option value="5">May</option>
                                    <option value="6">June</option>
                                    <option value="7">July</option>
                                    <option value="8">August</option>
                                    <option value="9">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select>
                            </div>
                      
                            <div class="std-button">
                                <button type="submit" class="btn-save">submit</button>
                            </div>   
                    </div>  
         </div>
    </div>
    <script>

            var xValues = [" Attendance(80%)", "Absent(40%)"];
            var yValues = [80, 40];
            var barColors = [
            "#00aba9",
            "#b91d47",
            ];
              new Chart("myChart", {
              type: "doughnut",
              data: {
              labels: xValues,
              datasets: [{
              backgroundColor: barColors,
              data: yValues
            }]
        },
      
        });
 
            </script>
            
            
    </body>
</html>
<?php 
}else{
    header("Location: http://localhost/First_Project/pages/login.php");
     exit();
}
 ?>