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
<div class="chatbox-container">
        <div class="parent_chatbox">
            <div class="heading">
                <h3>Chat with teacher to clear your doubt</h3>
            </div>

            <form action="" method="post" class="mb-3">
                <div class="content-teacher">
                    <div class="select-teacher">
                        <label for="teacher">Select Teacher</label>
                        <select id="teacher" name="selected-teacher" onchange="showUser(this.value)" required>
                        <option value="" disabled selected>Select Teacher</option>
                        <?php
			                
                            $query = "SELECT name FROM teacher";
			                $result = mysqli_query($conn,$query);
					        while($row = mysqli_fetch_array($result)){
							// echo "<option value='". $row['name'] ."'>" .$row['name'] ."</option>";
                            echo "<option ".(($_POST['selected-teacher']==$row['name'])?'selected="selected"':"")." value='". $row['name'] ."'>" .$row['name'] ."</option>";
						    }
                           
			            ?>
                        </select>
                    </div>

                        <div class="type-msg">
                            <textarea name="content" id="" placeholder=" Type your message....." required></textarea> <br>
                            <input id="submit" type="submit" name="msg-send" value="send" >
                        </div>
                    <!-- onclick="showUser('<?php echo $_POST['selected-teacher'];?>')" -->
                
                </div> 
            </form>
            <div class="chat-box-wrap">
                <div class="view-msg"id="txtHint"><b>Your chat will be listed here...</b>  
                </div>
        

            <?php
                    if(isset($_POST['msg-send'])){
                        if(!empty($_POST['selected-teacher']) && !empty($_POST['content'])) {
                            // Attempt insert query execution
                            $bname = $_SESSION["username"];
                            $receiver = $_POST['selected-teacher'];
                            $content = $_POST['content'];
                            $type = "send";
                            $stmt = $conn->prepare("INSERT INTO chatbox (content, type, sender, receiver_1) VALUES (?, ?, ?, ?)");
                            $stmt->bind_param("ssss", $content, $type, $bname, $receiver );
                            $stmt->execute();
                            echo "<script> showUser('$receiver'); </script>";
                            } else{
                                echo 'Please select teacher and input message.';
                            }
                     } 
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