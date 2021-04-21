<?php
	session_start();
	include_once('connection.php');

	if(isset($_POST['add'])){
		$Name = $_POST['Name'];
		$CountryCode = $_POST['CountryCode'];
		$Population = $_POST['Population'];
		$sql = "INSERT INTO city (Name, CountryCode, Population) VALUES ('$Name', '$CountryCode', '$Population')";

		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['success'] = 'Member added successfully';
		}
		
		else{
			$_SESSION['error'] = 'Something went wrong while adding';
		}
	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: index.php');
?>