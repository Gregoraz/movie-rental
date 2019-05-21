<?php
$servername = "172.16.11.22:3306";
$username = "pieg1_15";
$password = "zxccxzzxc1";
$dbname = "pieg1_15_movies";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>