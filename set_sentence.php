<?php
	ini_set('error_reporting', E_ALL);
	ini_set('display_errors', 'On');

	$content = $_GET['content'];
	$uid = $_GET['tt'];

	##DB management

	##connect to DB
	$servername = "localhost";
	$username = "root";
	$password = "bweb";

	// Create connection
	$conn = new mysqli($servername, $username, $password);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	##select database
	$conn->select_db("emailusa");

	##get greeting
	$query = "INSERT INTO mytext (texttype,text) VALUES ('".$uid."','".$content."')";
	$result = $conn->query($query);

	$conn->close();
?>
