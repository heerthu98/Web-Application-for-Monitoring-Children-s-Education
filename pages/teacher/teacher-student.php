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
<body>
<?php include('teacher_header.php'); ?>
    <!--student section start here-->
    <!--studends details add section-->
    <div class="sec_2">
    <!--attendence search area start here-->
        <div class="std-card">
            <div class="std-card-inner">
                <div class="heading">
                    <h3>Students Add Table</h3>
                </div>
                <form action="/action_page.php" class="std-form">
                    <div class="std-row">
                        <div class="std-form-container">
                            <label>Enter Name</label>
                            <input type="text" class="std-select" name="name">          
                        </div>
                        <div class="std-form-container">
                            <label>Grade</label>
                            <select class="std-select">
                                <option value="">Select Grade</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                            </select>
                        </div>
                        <div class="std-form-container">
                            <label>Section</label>
                            <select class="std-select">
                                <option value="">Select section</option>
                                <option value="1">A</option>
                                <option value="2">B</option>
                            </select>
                        </div>
                        <div class="std-form-container">      
                        <label for="year">Select Year</label>
                        <select class="std-select"></select>
                        </div>
                    </div>  
                    <div class="std-button">
                        <button type="submit" class="btn-save">Add</button>
                        <button type="reset" class="btn-reset">Reset</button>
                    </div>   
                </form>
            </div>     
        </div>
    <!--sudend add area end here-->   
    <!--student area-start here-->
        <div class="student">
            <div class="heading-layout1">
                <h3>My Students</h3>
            </div>
            <div class="std-table">
                <table>
                    <tr class="head bg-darkgreen">
                        <th>Name</th>
                        <th>Grade</th>
                        <th>Column</th>
                        <th>Column</th>
                        <th>Column</th>
                        <th>Chat</th>
                    </tr>
                    <tr>
                        <td class="first">xxx</td>
                        <td>xxx</td>
                        <td>xxx</td>
                        <td>xxx</td>
                        <td>xxx</td>
                        <td><span class="fa material-icons"></span></td>
                    </tr>
                    <tr>
                        <td class="first">xxx</td>
                        <td>xxx</td>
                        <td>xxx</td>
                        <td>xxx</td>
                        <td>xxx</td>
                        <td>xxx</td>
                    </tr>
                    <tr>
                    <td class="first">xxx</td>
                        <td>xxx</td>
                        <td>xxx</td>
                        <td>xxx</td>
                        <td>xxx</td>
                        <td>xxx</td>
                    </tr> 
                    <tr>
                        <td class="first">xxx</td>
                        <td>xxx</td>
                        <td>xxx</td>
                        <td>xxx</td>
                        <td>xxx</td>
                        <td>xxx</td>
                    </tr>
                    <tr>
                        <td class="first">xxx</td>
                        <td>xxx</td>
                        <td>xxx</td>
                        <td>xxx</td>
                        <td>xxx</td>
                        <td>xxx</td>
                    </tr>
                    <tr>
                        <td class="first">xxx</td>
                        <td>xxx</td>
                        <td>xxx</td>
                        <td>xxx</td>
                        <td>xxx</td>
                        <td>xxx</td>
                    </tr>
                </table>
            </div>
        </div>
        </div>  
    <!--sudent area-end here-->     
    </div>
    <!--student section end here-->        
    
    <script>
            window.onscroll = function() {scrollFunction()};

            function openForm() {
              document.getElementById("myForm").style.display = "block";
            }
            
            function closeForm() {
              document.getElementById("myForm").style.display = "none";
            }
    </script>
</body>
</html>