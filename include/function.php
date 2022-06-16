<?php
	class Dbh {

		private function connect()
		{
			try
			{
				#connect to db example
				$servername = 'localhost';
				$user = 'root';
				$pass = 'boboygwapo';
				//$dbname = 'bahs';
				$message = "";
				//create connection
				//$con = mysqli_connect($servername, $user, $pass, $dbname);
				$connection = new PDO("mysql:host=$servername;dbname=bahs", $user, $pass);
			
				return $connection;
			}

			catch(PDOException $error)
			{
				$message = $error->getMessage();
				die();
			}
			
		}
	}