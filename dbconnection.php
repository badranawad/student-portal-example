<?php
	$server_name = "localhost";
	$user_name = "root";
	$password = "";
	
	try{
		$conn = new PDO("mysql:host=$server_name;port=3306;dbname=mydb",$user_name, $password);
		//set PDO Exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//echo "database successfully connected";
	}
	catch(PDOException $e){
		echo "connection fails: " . $e->getMessage();
	}
?>