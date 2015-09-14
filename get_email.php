<?php
	ini_set('error_reporting', E_ALL);
	ini_set('display_errors', 'On');

	$content = $_GET['content'];

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
	$query = "SELECT * FROM mytext WHERE texttype = '1' ORDER BY RAND() LIMIT 1";
	$result = $conn->query($query);

	if($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		echo $row["text"].",\n";
	} else {
		echo "missing greeting,\n";
	}

	##get welcome sentence
	$query = "SELECT * FROM mytext WHERE texttype = '2' ORDER BY RAND() LIMIT 1";
	$result = $conn->query($query);

	if($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		echo $row["text"]."\n";
	} else {
		echo "missing welcome\n";
	}

	##print personal sentence
	echo $content."\n";

	##get final sentence
	$query = "SELECT * FROM mytext WHERE texttype = '3' ORDER BY RAND() LIMIT 1";
	$result = $conn->query($query);

	if($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		echo $row["text"]."\n";
	} else {
		echo "missing goodbye sentence.\n";
	}

	##get final greeting
	$query = "SELECT * FROM mytext WHERE texttype = '4' ORDER BY RAND() LIMIT 1";
	$result = $conn->query($query);

	if($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		echo $row["text"]."!\n";
	} else {
		echo "missing goodbye.\n";
	}

	##select database
	$conn->select_db("emailtext");

	##get greeting
	$query = "INSERT INTO mytext (text) VALUES ('".$content."')";
	$result = $conn->query($query);

	$conn->close();
?>
