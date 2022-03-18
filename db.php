<?php 
	#connect to db example
	$servername = 'localhost';
	$user = 'root';
	$pass = 'boboygwapo';
	//$dbname = 'bahs';

	//create connection
	//$con = mysqli_connect($servername, $user, $pass, $dbname);
	$connection = new PDO("mysql:host=$servername;dbname=bahs", $user, $pass);
 
	//check connection
	if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    } 

?>