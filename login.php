<?php      
    include('db.php');  
    $username = $_POST['user1'];
    $password = $_POST['pass'];
      
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  // stripclashes remove backslashes if it has
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password);  
      
        $sql = "SELECT * FROM user WHERE user_username = '$username' OR user_email = '$username' AND user_password = '$password'";
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
			$_SESSION['user_username'] = $email;
				header("location:index.php");
        }  
        else{  
            echo "<h1> Login failed. Invalid username or password.</h1>";  
        }     
	
		/**include("db.php");
		if(isset($_POST['submit']))
		{
			$email = $_POST['user1'];
			$password = $_POST['pass'];
	
			$sql = "SELECT count(*) as total FROM user WHERE user_username = '".$email."' AND user_password = '".$password."' ";
			$result = $con->query($sql);
		
			
			if($result->num_rows > 0)
			{
				$_SESSION['user_username'] = $email;
				header("location:index.html");
				
			}
		} */
?>  
