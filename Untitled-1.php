<<?php 
	session_start();
	include("db.php");
	if(isset($_POST['submit']))
	{
		$email = $_POST['user1'];
		$password = $_POST['pass'];

		$sql = "SELECT count(*) as total FROM 'user' WHERE user_username = '".$email."' AND user_password = '".$password."' ";
		$result = $con->query($sql);
	

		if($result->num_rows > 0)
		{
			$_SESSION['user_username'] = $email;
			header("location:index.php");
			die;
		}
	}
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="mycss/login.css">
	<script src="./js/login.js" type="text/javascript"></script>
	<script src="./js/bootstrap.js" type="text/javascript"></script>
	<title>BAHS Login</title>
</head>
<body class="bodylogin">
	<div id="body">
		<div id="imgbg">
			<img src="./image/without.png">
		</div>
		

		<div class="formlog" id="myForm">
  			<form method="POST" class="form-container"> <!--action="/action_page.php"-->
    			<img class="user-icon" src="./image/userlog.png">
    			<!-- <h1>Login</h1> -->

    			<label for="email"><b>Username</b></label>
    			  	<div id="icons">
    					<img class="icon user1" src="./image/usericon.png">
    				</div>
    					<input type="text" placeholder="Enter your Email" name="user1" required>
    			<hr class="hr 1">

    			<label for="psw"><b>Password</b></label>
    			    <div id="icons2">
    					<img class="icon pass1" src="./image/password.png">
    				</div>
    					<input type="password" placeholder="Enter your Password" name="pass" required>
    			<hr class="hr 2">

    			<a href="#"> Forgot Password?</a>
				
    			<button type="submit" class="btn" name="submit" >Login</button>
  			</form>
		</div>
		
	</div>
</body>
</html>