<?php
// Initialize the session
session_start();
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../styles/styles.css?v=<?php echo time(); ?>">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/fe3a67443d.js" crossorigin="anonymous"></script>
    </head>
<body>
<?php include('child_header.php'); ?>
        <div class="sec1">

        </div>
        
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