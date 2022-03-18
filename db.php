<?php 

	#connect to db example
	$servername = 'localhost';
	$user = 'root';
	$pass = 'boboygwapo';
	//$dbname = 'bahs';
	$message = "";

	try
	{
		//create connection
		//$con = mysqli_connect($servername, $user, $pass, $dbname);
		$connection = new PDO("mysql:host=$servername;dbname=bahs", $user, $pass);
		$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
	}
	catch(PDOException $error)
	{
		$message = $error->getMessage();
	}


?>