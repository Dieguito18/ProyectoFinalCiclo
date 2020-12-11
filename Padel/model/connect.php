<?php
	$host = 'padel-aws.coooqvbimmpc.us-east-2.rds.amazonaws.com';
	$user = 'admin';
	$pass = 'adminpsw';
	$db_name = 'awspadel';
	
	$conn = new mysqli($host,$user,$pass,$db_name);
	if($conn -> connect_error){
		die('Connect error: '. $conn->connect_error);
	}
?>
