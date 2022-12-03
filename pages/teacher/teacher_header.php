
<!DOCTYPE html>
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
<script>
    function handleSignout() {

        window.location.replace("http://localhost/First_Project/pages/login.php");
    }
</script>
<body>
   
    <!--Top Menu-->    
        <div class="top">
            <div class="logo">
                <img src="../img/3D.png" style="border-radius: 50px;width:50px;">
                <span><b>WeDoClever</b></span>
            </div>
            <div class="social-icons">
                <button class="btn btn-primary" onclick="handleSignout()">Logout</button>
                </div>
            </div>                                                                                                                                      
        </div>
    <!--Side Menu-->
        <div class="side">
            <ul>
                <li>
                    <a href="teacher-dashboard.php">
                        <span class="fa fa-dashboard fa-lg"></span>
                        <span>Dashboard</span> 
                    </a>
                </li>
                <li>
                    <a href="teacher-student.php">
                        <span class="fa fa-child fa-lg"></span>
                        <span>Students</span> 
                    </a>
                </li>
                <li>
                    <a href="teacher-attendance.php">
                        <span class="fa fa-check-square-o fa-lg"></span>
                        <span>Attendance</span> 
                    </a>
                </li>
                <li>
                    <a href="teacher-exam.php">
                        <span class="fa fa-check-square-o fa-lg"></span>
                        <span>Exam</span> 
                    </a>
                </li>
                <li>
                    <a href="teacher-settings.php">
                        <span class="fa fa-cog fa-lg"></span>
                        <span>Settings</span> 
                    </a>
                </li>
            </ul>
    </div>  

    <!--attendence main section end here-->
</body>
</html>