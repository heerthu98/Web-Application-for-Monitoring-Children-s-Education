<?php
// Initialize the session
session_start();
include "z_db.php";
//$conn = mysqli_connect('localhost', 'root', '' , 'wedoclever') or die ('Unable to connect');  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../styles/styles.css">
    <title>Document</title>
</head>
<script type="text/javascript">
    function getatt(value)
    {
        if(value == true)
        {
            document.getElementById("txtAbsent").value = parseInt(document.getElementById("txtAbsent").value) - 1;
            document.getElementById("txtPresent").value = parseInt(document.getElementById("txtPresent").value) + 1;
        }
        else
        {
            document.getElementById("txtAbsent").value = parseInt(document.getElementById("txtAbsent").value) + 1;
            document.getElementById("txtPresent").value = parseInt(document.getElementById("txtPresent").value) - 1;
        }
    }
</script>
<body>

<h1><strong><span class="style1">Attendance System</span></strong></h1>
<div class="flex_con">
<div class="attend_get">
<form action="attendance.php" method="post">
        <table width="180px">
                <tr>
                    <td> Select date : <br />
                   <?php 
                            $dt = getdate();
                            $day = $dt["mday"];
                            $month = date("m");
                            $year = $dt["year"];
                            
                            echo "<select name='cdate'>";
                            for($a=1;$a<=31;$a++)
                            {
                                if($day == $a)
                                    echo "<option value='$a' selected='selected'>$a</option>";
                                else
                                    echo "<option value='$a' >$a</option>";
                            }
                            echo "</select><select name='cmonth'>";
                            for($a=1;$a<=12;$a++)
                            {
                                if($month == $a)
                                    echo "<option value='$a' selected='selected'>$a</option>";
                                else
                                    echo "<option value='$a' >$a</option>";
                            }
                            echo "</select><select name='cyear'>";
                            for($a=2010;$a<=$year;$a++)
                            {
                                if($year == $a)
                                    echo "<option value='$a' selected='selected'>$a</option>";
                                else
                                    echo "<option value='$a' >$a</option>";
                            }
                            echo "</select>";
                        ?>                    
                    </td>
                </tr>
             </table>   
        
          <table width="50%">
            <tr>
              <td colspan="3" ><div ><strong><span class="style2">Get Attendance</span></strong></div></td>
            </tr>
            <tr>
              <td width="114"><span class="style7">Student_Id</span></td>
              <td width="152"><span class="style7">Name</span></td>
              <td width="110"><span class="style7">Attend</span></td>
            </tr>
            <?php
                include "z_db.php";
                extract($_POST);
                $query = "SELECT * FROM teacher WHERE Teacher_Id = '".$_SESSION['Teacher_Id']."'";
            $grade = mysqli_query($con, $query);
            $row = mysqli_fetch_array($grade, MYSQLI_ASSOC);

            $sql = "SELECT * FROM grade WHERE Grade_Id='".$row["Grade_Id"]."'";
            $result = $con->query($sql);
            $row1 = mysqli_fetch_array($result);

            $query = "SELECT * FROM student WHERE Grade_Id='".$row1["Grade_Id"]."'";
            //$results = mysqli_query($conn,$sql);
            
               // $query = "select *from `member` order by `member_id`";
                $s = 0;
                $result = mysqli_query($con,$query)or die("select error");
                while($rec = mysqli_fetch_array($result))
                {
                    $s = $s + 1;
                    echo ' <tr>
                              <td width="114">'.$rec["Student_Id"].'</td>
                              <td width="152">'.$rec["User_Name"].'</td>
                              <td width="110"><input type=checkbox name='.$rec["Student_Id"].' onclick="getatt(this.checked);"/></td>
                            </tr>';
                }
            ?>          
            <tr>
              <td colspan="3"><div >
                <input type="submit" value="Get Attendance" name="btnsubmit"/>
                &nbsp;&nbsp;</div></td>
            </tr>
          </table>
          </form>
              </div>
          <div class="attend_total">
          <table width="100px" style="margin-left:35px">
                <tr>
                    <td> Total Absent : <input type="text" id="txtAbsent" value="<?php print $s; ?>" size="10" disabled="disabled"/></td>
                </tr>
                <tr>
                    <td> Total Present : <input type="text" id="txtPresent" value="0" size="10"  disabled="disabled"/></td>
                </tr>
                <tr>
                    <td> Total Strength : <input type="text" id="txtStrength" value="<?php print $s; ?>" size="10" disabled="disabled"/></td>
                </tr>
             </table>
              </div>
              </div>

</body>
</html>