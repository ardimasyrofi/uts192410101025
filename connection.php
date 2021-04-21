<?php
	//for MySQLi OOP
	$conn = new mysqli('127.0.0.1', '192410101025', 'secret', 'uts192410101025');
	if($conn->connect_error){
	   die("Connection failed: " . $conn->connect_error);
	}
	
?>