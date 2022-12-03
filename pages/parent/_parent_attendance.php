<?php
// Initialize the session
session_start();

if (isset($_SESSION['Parent_Id']) && isset($_SESSION['U_Name'])) {
    include "../conn.php";

$query = "SELECT count(*) as present_absent_count, Status,
     case
         when Status = 1 then 'Present'
         when Status = 0 then 'Absent'
       end as attendance FROM attendance WHERE Student_Id='8' GROUP BY attendance ;";
$result = mysqli_query($conn, $query);
$i=0;
while ($row = mysqli_fetch_array($result)) {
    $label[$i] = $row["Status"];
    $count[$i] = $row["present_absent_count"];
    $i++;
}
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
   

    <style>
    .meg{
    padding:40px 20px;
    background-color: #f1f1f1;
}

.meg select{
  width: 100%;
  padding: 14px 100px;
  border: 1px solid rgb(250, 250, 250);
  border-radius: 4px;
  resize: vertical;
  cursor: pointer;
}
    </style>
<script type="text/javascript"src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">  
// API initialization to create Google chart 
google.charts.load('current', {'packages':['corechart']});  
google.charts.setOnLoadCallback(drawPieChart);  

function drawPieChart()  
{  
    var pie = google.visualization.arrayToDataTable([  
              ['attendancede', 'Numbder'],
              ['<?php echo $label[0]; ?>', <?php echo $count[0]; ?>],
              ['<?php echo $label[1]; ?>', <?php echo $count[1]; ?>],
                    
         ]);  
    var header = {  
          title: '',
          slices: {0: {color: '#666666'}, 1:{color: '#34a0a4'}}
         };  
    var piechart = new google.visualization.PieChart(document.getElementById('piechart'));  
    piechart.draw(pie, header);  
} 
</script>
</head>
<body>
<?php include('header.php'); ?>
<div class="flex_attendance">
    <div class="attendance">
        <div class="attendance_data">
            <h3 style="color: #1a659e;"><b>Attendance Analysis</b></h3>
              <?php
             //Select student 
             //
              $result = mysqli_query($conn,"SELECT * FROM student WHERE Parent_Id = '".$_SESSION['Parent_Id']."'");
             // $row = mysqli_fetch_array($result);
             // $id=$row['Student_Id'];
             // echo $id;
             // $result1 = mysqli_query($conn,"SELECT * FROM attendance WHERE Student_Id = '$id'");
            //  $row1 = mysqli_fetch_array($result1);
              //echo $row1['Date'];
              $result2 = mysqli_query($conn,"SELECT * FROM student,attendance WHERE  student.Student_Id=attendance.Student_Id AND  Parent_Id = '".$_SESSION['Parent_Id']."'  ");
              $row2 = mysqli_fetch_array($result2);
             // echo $row2['Date'];

              echo  "<table class='table table-info table-success table-hover'>
              <tr>
              <th scope='col'>User Name</th>
              <th scope='col'>Date</th>
              <th scope='col'>Status</th>
              </tr>";
              

              while($row2 = mysqli_fetch_assoc($result2))
              {
              echo "<tr>";
              echo "<td>" . $row2['User_Name'] . "</td>";
              echo "<td>" . $row2['Date'] . "</td>";
              echo "<td>" . $row2['Status'] . "</td>";
              echo "</tr>";
              }
              echo "</table>";
        ?>
        </div>
        <div class="img1">
        <img src="../img/attendance.jpg" height="300px" width="400px">
        </div>
        </div>
    </div>
    <div class="chart">
        <h3><b>Percentage of student attendance</b></h3>
    <div id="piechart">

    </div> 
    </div>  
</div>  

</body>

</html>
<?php 
}else{
    header("Location: http://localhost/First_Project/pages/login.php");
}
 ?>