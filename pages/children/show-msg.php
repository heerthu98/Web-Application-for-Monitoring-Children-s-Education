<?php
// Initialize the session
session_start();
?>
<!DOCTYPE html>
<html>

<head>


</head>

<body>

    <?php


$con = mysqli_connect('localhost','root','','billdb');
if (!$con) {
  die('Could not connect: ' . mysqli_error($conn));
}

mysqli_select_db($con,"ajax_demo");
$bname = $_SESSION["username"];
$receiver2 = $_GET['q'];

$stmt = $con->prepare("SELECT content , type FROM chatbox WHERE sender = ? AND receiver_1 = ?");
$stmt->bind_param("ss", $bname, $receiver2);
$stmt->execute();
$result=$stmt->get_result();

echo "<table>";
            
                            while($data = mysqli_fetch_array($result))
                            {
                                if($data['type'] == 'send'){
                                echo "<tr>";
                                echo "<td>";
                                echo "</td>";
                                echo "<td>" .$data['content'] ."</td>";  // displaying data in option menu
                                echo "</tr>";
                            }else{
                                echo "<tr>";
                                
                                echo "<td>" .$data['content'] ."</td>";  // displaying data in option menu
                                echo "</tr>";
                            }
                        }
        
                         echo "</table>";

?>
</body>

</html>