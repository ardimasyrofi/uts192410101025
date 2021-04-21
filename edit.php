<?php
	session_start();
	include_once('connection.php');

	if(isset($_POST['edit'])){
		$ID = $_POST['ID'];
		$Name = $_POST['Name'];
		$CountryCode = $_POST['CountryCode'];
		$Population = $_POST['Population'];
		$sql = "UPDATE city SET Name = '$Name', CountryCode = '$CountryCode', Population = '$Population' WHERE ID = '$ID'";

		//use for MySQLi OOP
		if($conn->query($sql)){
			$_SESSION['success'] = 'Member updated successfully';
		}
		
		else{
			$_SESSION['error'] = 'Something went wrong in updating member';
		}
	}
	else{
		$_SESSION['error'] = 'Select member to edit first';
	}

	header('location: index.php');

?>