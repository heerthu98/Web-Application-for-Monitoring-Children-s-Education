
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<script>
    function handleSignout() {

        window.location.replace("http://localhost/project-structure/ProjectSMS/pages/login.php");
    }
</script>

<body>
<div class="cont">
<div class="top">
    <div class="logo">
        <img src="../img/logo.png" style="border-radius: 50px;width:50px;">
        <span><b>WeDoClever</b></span>
    </div>
    
    <button class="btn btn-primary" onclick="handleSignout()">Logout</button>
</div>
</div>
<div class="side">
        <ul>
            <li>
                <a href="../children/children-dashboard.php">
                    <span class="fa fa-dashboard fa-lg"></span>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="../children/children-attendance.php">
                    <span class="fas fa-user-check fa-lg"></span>
                    <span>Attendance</span>
                </a>
            </li>
            <li>
                <a href="../children/children-exam-report.php">
                    <span class="fas fa-poll-h fas-lg"></span>
                    <span>Exam Report</span>
                </a>
            </li>
            <li>
                <a href="../children/children-send-message.php">
                    <span class="fas fa-comment fa-lg"></span>
                    <span>Send Message</span>
                </a>
            </li>
            <li>
                <a href="../children/children-fees-payment.php">
                    <span class="fa fa-money fa-lg"></span>
                    <span>Fees Payment</span>
                </a>
            </li>
            <li>
                <a href="../children/children-setting.php">
                    <span class="fa fa-cog fa-lg"></span>
                    <span>Setting</span>
                </a>
            </li>
        </ul>
    </div>
</html>