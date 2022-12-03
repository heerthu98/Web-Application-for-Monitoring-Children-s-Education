<?php
// Initialize the session
session_start(); 
include "./conn.php";
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat:400,800">
	<style>
		* {
			box-sizing: border-box;
		}

		body {
			background: #f6f5f7;
			display: flex;
			justify-content: center;
			align-items: center;
			flex-direction: column;
			font-family: 'Montserrat', sans-serif;
			height: 100vh;
			margin: -20px 0 50px;
		}

		h1 {
			font-weight: bold;
			margin: 0;
		}

		h2 {
			text-align: center;
		}

		p {
			font-size: 14px;
			font-weight: 100;
			line-height: 20px;
			letter-spacing: 0.5px;
			margin: 20px 0 30px;
		}

		span {
			font-size: 12px;
		}

		a {
			color: #333;
			font-size: 14px;
			text-decoration: none;
			margin: 15px 0;
		}

		button {
			border-radius: 20px;
			border: 1px solid #4AA899;
			background-color: #4AA899;
			color: #FFFFFF;
			font-size: 12px;
			font-weight: bold;
			padding: 12px 45px;
			letter-spacing: 1px;
			text-transform: uppercase;
			transition: transform 80ms ease-in;
		}

		button:active {
			transform: scale(0.95);
		}

		button:focus {
			outline: none;
		}

		button.ghost {
			background-color: transparent;
			border-color: #FFFFFF;
		}

		form {
			background-color: #FFFFFF;
			display: flex;
			align-items: center;
			justify-content: center;
			flex-direction: column;
			padding: 0 50px;
			height: 100%;
			text-align: center;
		}

		input,
		select {
			background-color: #eee;
			border: none;
			padding: 12px 15px;
			margin: 8px 0;
			width: 100%;
		}

		.container {
			background-color: #fff;
			border-radius: 10px;
			box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25),
				0 10px 10px rgba(0, 0, 0, 0.22);
			position: relative;
			overflow: hidden;
			width: 768px;
			max-width: 100%;
			min-height: 480px;
		}

		.form-container {
			position: absolute;
			top: 0;
			height: 100%;
			transition: all 0.6s ease-in-out;
		}

		.sign-in-container {
			left: 0;
			width: 50%;
			z-index: 2;
		}

		.container.right-panel-active .sign-in-container {
			transform: translateX(100%);
		}

		.sign-up-container {
			left: 0;
			width: 50%;
			opacity: 0;
			z-index: 1;
		}

		.container.right-panel-active .sign-up-container {
			transform: translateX(100%);
			opacity: 1;
			z-index: 5;
			animation: show 0.6s;
		}

		@keyframes show {

			0%,
			49.99% {
				opacity: 0;
				z-index: 1;
			}

			50%,
			100% {
				opacity: 1;
				z-index: 5;
			}
		}

		.overlay-container {
			position: absolute;
			top: 0;
			left: 50%;
			width: 50%;
			height: 100%;
			overflow: hidden;
			transition: transform 0.6s ease-in-out;
			z-index: 100;
		}

		.container.right-panel-active .overlay-container {
			transform: translateX(-100%);
		}

		.overlay {
			background: #4AA899;
			background: -webkit-linear-gradient(to right, #68a1bd, #4AA899);
			background: linear-gradient(to right, #4AA899, #68a1bd);
			background-repeat: no-repeat;
			background-size: cover;
			background-position: 0 0;
			color: #FFFFFF;
			position: relative;
			left: -100%;
			height: 100%;
			width: 200%;
			transform: translateX(0);
			transition: transform 0.6s ease-in-out;
		}

		.container.right-panel-active .overlay {
			transform: translateX(50%);
		}

		.overlay-panel {
			position: absolute;
			display: flex;
			align-items: center;
			justify-content: center;
			flex-direction: column;
			padding: 0 40px;
			text-align: center;
			top: 0;
			height: 100%;
			width: 50%;
			transform: translateX(0);
			transition: transform 0.6s ease-in-out;
		}

		.overlay-left {
			transform: translateX(-20%);
		}

		.container.right-panel-active .overlay-left {
			transform: translateX(0);
		}

		.overlay-right {
			right: 0;
			transform: translateX(0);
		}

		.container.right-panel-active .overlay-right {
			transform: translateX(20%);
		}
	</style>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
	<div class="container" id="container">
		<div class="form-container sign-up-container">
			<form method="POST" name="myForm">
				<h1>Create an Account</h1>
				<label name="error" style="color: red;" value="jjlkj"></label>
				<input type="text" placeholder="Username" name="username" />
				<input type="email" placeholder="Email" name="email" />
				<select name="User" id="user">
					<option value="0" name="user_role">Selected one</option>
					<option value="1" name="user_role">Parent</option>
					<option value="2" name="user_role">Teacher</option>
				</select>
				<input type="password" placeholder="Password" name="password" />
				<input type="password" placeholder="Confirm Password" name="cpassword" />
				<button type="submit" name="reg_user">Sign Up</button>
			</form>
		</div>

		<!--login user-->
		<div class="form-container sign-in-container">
			<form method="POST" name="login" onsubmit="return(validate_login());">
				<h1>Sign in</h1>
				<span>or use your account</span>
				<input type="text" placeholder="Username" name="U_Name" />
				<input type="password" placeholder="Password" name="P_Word" />
				<button type="submit" name="sign_user">Sign In</button>
			</form>
		</div>
		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-left">
					<h1>Welcome Back!</h1>
					<p>To keep connected with us please login with your personal info</p>
					<button class="ghost" id="signIn">Sign In</button>
				</div>
				<div class="overlay-panel overlay-right">
					<h1>Hello...!</h1>
					<p>Enter your personal details and start journey with us</p>
					<button class="ghost" id="signUp">Sign Up</button>
				</div>
			</div>
		</div>
	</div>
	<?php

	if (isset($_POST['reg_user'])) {

		$username = mysqli_real_escape_string($conn, $_POST['username']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$password = mysqli_real_escape_string($conn, $_POST['password']);
		$cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
		$userrole =mysqli_real_escape_string($conn, $_POST['User']);

		
		if ($password === $cpassword) {
			if($userrole =='1'){
			$PW = md5($password); //encrypt the password before saving in the databas
			$query = "INSERT INTO parent (User_Name, Email, Password) VALUES('$username', '$email', '$PW')";
			mysqli_query($conn, $query);

			$parent_check_query = "SELECT * FROM parent WHERE User_Name='$username'";
			$result_IN_Parent = mysqli_query($conn, $parent_check_query);
			//$row =mysqli_fetch_object($result_IN_Parent);
			$row = mysqli_fetch_array($result_IN_Parent);
			//$num_row 	= mysqli_num_rows($result_IN_Parent);
			$Id= $row['Parent_Id'];
				echo $row['User_Name'];
			$insert_query_user_parent="INSERT INTO user (User_Name,Password,Type,Parent_Id,Student_Id,Teacher_Id) VALUES('$username', '$PW', '$userrole','$Id',NULL,NULL)";
			mysqli_query($conn, $insert_query_user_parent);
			echo '<script>  
			 alert("register successfully....!");
			</script>';

			//echo "sucess";
		}
		else if($userrole =='2'){

			$PW = md5($password); //encrypt the password before saving in the databas
			$query_t = "INSERT INTO teacher (User_Name, Email, Password) VALUES('$username', '$email', '$PW')";
			mysqli_query($conn, $query_t);

			$tea_check_query = "SELECT * FROM teacher WHERE User_Name='$username'";
			$result_IN_tea = mysqli_query($conn, $tea_check_query);
			
			$row_tea = mysqli_fetch_array($result_IN_tea);
	
			echo $row_tea['Teacher_Id'];
				//echo $row['User_Name'];
			
			$insert_query_user_t="INSERT INTO user (User_Name,Password,Type,Parent_Id,Student_Id,Teacher_Id) VALUES('$username', '$PW', '$userrole',NULL,NULL,'$tea_Id')";
			mysqli_query($conn, $insert_query_user_t);
			echo '<script>  
			 alert("register successfully....!");
			</script>';
		}
	}
		else {
			echo ' bnbnv';
		}
	}
	
	//sign in user
	if (isset($_POST['U_Name']) && isset($_POST['P_Word'])){
		$U_Name = mysqli_real_escape_string($conn, $_POST['U_Name']);
		$P_Word = mysqli_real_escape_string($conn, $_POST['P_Word']);
		$user_check = "SELECT * FROM user WHERE User_Name='$U_Name' ";
		//echo $U_Name, $P_Word;
		$result_IN_user = mysqli_query($conn, $user_check);
		$row = mysqli_fetch_array($result_IN_user, MYSQLI_ASSOC);
		$count = mysqli_num_rows($result_IN_user);
		echo $row['Type'];
		$_SESSION["U_Name"] = $row['User_Name'];
      	$_SESSION["P_Word"] = $row['Password'];
		   
		//echo $_SESSION['Teacher_Id'];

		if ($row['Type'] == '1') {
			$user_check_parent = "SELECT * FROM parent WHERE User_Name='$U_Name' ";
		//echo $U_Name, $P_Word;
		$result_Parent = mysqli_query($conn, $user_check_parent);
		$row5 = mysqli_fetch_array($result_Parent, MYSQLI_ASSOC);
		$count_parent = mysqli_num_rows($result_Parent);
		if($count_parent=1){
			if(isset($_SESSION["U_Name"])){
				//header("Location:login.php");	
				$_SESSION['Parent_Id']=$row5['Parent_Id'];	
   	
			echo ('<script>window.location.replace("http://localhost/First_Project/pages/parent/parent-dashboard.php");</script>');
			}
			}
		}
		if ($row['Type'] == '2') {
			$user_check_teacher = "SELECT * FROM teacher WHERE User_Name='$U_Name' ";
		//echo $U_Name, $P_Word;
		$result_IN_teacher = mysqli_query($conn, $user_check_teacher);
		$row2 = mysqli_fetch_array($result_IN_teacher, MYSQLI_ASSOC);
		$count_teacher = mysqli_num_rows($result_IN_teacher);
		$_SESSION['Teacher_Id']=$row2['Teacher_Id'];
		echo $_SESSION['Teacher_Id'];
		if($count_teacher=1){
			if(isset($_SESSION["U_Name"])){
				//header("Location:login.php");	
			echo ('<script>window.location.replace("http://localhost/kuruji/pages/teacher/teacher-dashboard.php");</script>');
			}
			}
		}
		else if ($row['Type'] == '3') {
			$user_check_student = "SELECT * FROM student WHERE User_Name='$U_Name' ";
		//echo $U_Name, $P_Word;
		$result_student = mysqli_query($conn, $user_check_student);
		$row6 = mysqli_fetch_array($result_student, MYSQLI_ASSOC);
		$count_student = mysqli_num_rows($result_student);
		if($count_student =1){
			if(isset($_SESSION["U_Name"])){
				//header("Location:login.php");	
				$_SESSION['Student_Id']=$row6['Student_Id'];		
			echo ('<script>window.location.replace("http://localhost/First_Project/pages/children/children-dashboard.php");</script>');
			}
			}
		}
		 else {
			echo '<script>  alert("Incorrect password or username");   </script>';
					
		}

		
	
	}
	else{
		echo ('<script>window.location.replace("http://localhost/First_Project/pages/login.php");</script>');
		exit();
	}
	
	?>
</body>
<script type="text/javascript">
	const signUpButton = document.getElementById('signUp');
	const signInButton = document.getElementById('signIn');
	const container = document.getElementById('container');

	signUpButton.addEventListener('click', () => {
		container.classList.add("right-panel-active");
	});

	signInButton.addEventListener('click', () => {
		container.classList.remove("right-panel-active");
	});

	function validate() {
		var c = document.getElementsByName("password").value;
		var p = document.getElementsByName("cpassword").value;


		if (document.myForm.username.value == " ") {
			alert("Please provide your name!");
			// document.getElementsByName("error").innerHTML="PLEeee";
			document.myForm.username.focus();
			return false;
		}
		if (document.myForm.eMail.value == " ") {
			alert("Please provide your Email!");
			document.myForm.eMail.focus();
			return false;
		}
		if (document.myForm.password.value == " ") {
			alert("Please provide password!");
			return false;
		}
		if (document.myForm.cpassword.value == " ") {
			alert("Please provide confirm password!");
			return false;
		}

		if (c != p) {
			alert("Please provide djcxckj confirm password!");
		}

		return (true);
	}

	function validate_login() {

		if (document.login.U_Name.value == " ") {
			alert("Please provide your  user name!");
			document.login.U_Name.focus();
			return false;
		}
		if (document.login.P_Word.value == " ") {
			alert("Please provide your password");
			document.login.P_Word.focus();
			return false;
		}
		return (true);
	}
</script>

</html>