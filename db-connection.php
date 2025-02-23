<?php

$database_server = 'localhost';
$database_username = 'root';
$database_password = 'B@dfencer2020';
$database_name = 'training_helper';
// Create connection using mysqli_connect()
$conn = mysqli_connect($database_server, $database_username,
$database_password, $database_name);
// If $conn is false, connection is failed
if (!$conn ) {
 die("Failed to connect to MySQL: " . mysqli_connect_error());
}
echo "Database Connected Successfully. <br />";
?>