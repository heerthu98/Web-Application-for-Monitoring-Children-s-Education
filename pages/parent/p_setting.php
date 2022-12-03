<?php
// Initialize the session
session_start();
$conn = mysqli_connect('localhost', 'root', '' , 'wedoclever') or die ('Unable to connect');
if (isset($_POST['op']) && isset($_POST['np']) && isset($_POST['c_np'])) {
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
     }
 
    $op =validate($_POST['op']);
	$np = validate($_POST['np']);
	$c_np = validate($_POST['c_np']);
    $op = md5($op);
    $np = md5($np);
    $id = $_SESSION['Parent_Id'];
    if(empty($op)){
        header("Location:error=Old Password is required");
        exit();
      }else if(empty($np)){
        header("error=New Password is required");
        exit();
      }else if($np !== $c_np){
        header("Location: parent-setting.php?error=The confirmation password  does not match");
        exit();
      }else {
    $sql = "SELECT password
            FROM parent WHERE 
            Parent_Id='$id' AND Password='$op'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) === 1){
        
        $sql_2 = "UPDATE parent
                  SET Password='$np'
                  WHERE Parent_Id='$id'";
        mysqli_query($conn, $sql_2);
        
        $sql_3 = "UPDATE user
                  SET Password='$np'
                  WHERE Parent_Id='$id'";
        mysqli_query($conn, $sql_3);  
    }
else {
    header("Location: parent-setting.php?error=Incorrect password");
    exit();
}
    
}


}else{
header("Location: parent-setting.php");
exit();
}


?>