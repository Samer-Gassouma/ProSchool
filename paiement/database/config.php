<?php

$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "std_db";

// Create connection
$conn1 = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn1 ) {
	
die("Connection failed: " . mysqli_connect_error());

}

?>