<?php
	session_start();
	include_once('connection.php');

	if(isset($_GET['ID'])){
		$sql = "DELETE FROM city WHERE ID = '".$_GET['ID']."'";

		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['success'] = 'Member deleted successfully';
		}
		
		else{
			$_SESSION['error'] = 'Something went wrong in deleting member';
		}
	}
	else{
		$_SESSION['error'] = 'Select member to delete first';
	}

	header('location: index.php');
?>