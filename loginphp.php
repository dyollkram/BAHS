<?php 
	$username =$_POST['user'];
	$password =$_POST['pass'];

	$username =stripcslashes($username);
	$password =stripcslashes($password);
	$username =mysqli_real_escape_string($username);
	$password =mysqli_real_escape_string($password);

	mysql_connect("localhost", "root", "boboygwapo");
	mysql_select_db("bahs");

	$result = mysqli_query("SELECT * FROM user where user_username = '$username' AND user_password = '$password'")
			or die ("Failed to query database".mysql_errno());

			$row = mysqli_fetch_array($result);
			if ($row['user_username'] == $username && $row['user_password'] == $password ){
				echo "Login Success ! ! ! Welcome ".$row['user_firstname'];
			}
			else
			{
				echo "Failed to login";
			}
?>