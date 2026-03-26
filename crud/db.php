<?php
// db.php - atabase connection setup

$host = "localhost";
$user = "root";
$pass = "Gorediih70"; 
$dbname = "kucsa";

//  reate connection using MySQLi object-oriented approach
$conn = new mysqli($host, $user, $pass, $dbname);

//checking if connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
