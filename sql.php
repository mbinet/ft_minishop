<?php
include_once('head.php');
include_once('install.php');


$servername = "127.0.0.1";
$username = "mbinet";
$password = "";
$db_name = "mdr ";
$port = "3306";

// Create connection
// $conn = mysqli_connect($servername, $username, $password, $db_name, $port);
$conn = mysqli_connect($servername, $username, $password);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if db is created
$exists = false;
$result = mysqli_query($conn, "SHOW DATABASES");
while ($row = mysqli_fetch_array($result)) {
	if ($row['Database'] == $db_name) {
		$exists = true;
	}
}



if ($exists == false) {
	// Create database
	$sql = "CREATE DATABASE " . $db_name;
	mysqli_query($conn, $sql);
}




if (!($conn = mysqli_connect($servername, $username, $password, $db_name, $port)))
	echo mysqli_connect_error();
else {
	// echo "Connected to db " . $db_name;
// if ($exists == false) {
	// pr($query_create_sql);
	// echo mysqli_query($conn, $query_create_sql);
// }
}
// mysqli_select_db($conn, $db_name);
?>
