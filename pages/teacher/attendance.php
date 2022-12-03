<?php
 session_start();
 include "z_db.php";
	if(isset($_POST["btnsubmit"]))
	{
		
		
		$date = $_POST["cyear"]."-".$_POST["cmonth"]."-".$_POST["cdate"];
    $query = "SELECT * FROM teacher WHERE Teacher_Id = '".$_SESSION['Teacher_Id']."'";
    $grade = mysqli_query($con, $query);
    $row = mysqli_fetch_array($grade, MYSQLI_ASSOC);

    $sql = "SELECT * FROM grade WHERE Grade_Id='".$row["Grade_Id"]."'";
    $result2 = $con->query($sql);
    $row1 = mysqli_fetch_array($result2);

    $query = "SELECT * FROM student WHERE Grade_Id='".$row1["Grade_Id"]."'";         		
		//$query = "select *from `student`  ";
		$result = mysqli_query($con,$query)or die("select error");
		while($rec = mysqli_fetch_array($result))
		{
			$mno = $rec["Student_Id"];
      $tea=$_SESSION['Teacher_Id'];
      echo $tea,$date;
			if(isset($_POST[$mno]))
			{
				$query1 = "INSERT INTO  attendance (Student_Id ,  Status ,  Date,Teacher_Id) VALUES('$mno','1','$date','$tea')";
			}
			else
			{
        $query1 = "INSERT INTO  attendance (Student_Id ,  Status ,  Date,Teacher_Id) VALUES('$mno','0','$date','$tea')";
			}
			mysqli_query($con,$query1)or die("insert error".$mno);
			print "<script>";
			print "alert('Attendance get successfully....');";
			print "self.location='getattendance.php';";
			print "</script>";
		}
		
		
			
		
	}
	else
	{
		header("Location:index.php");
	}
?>

   

