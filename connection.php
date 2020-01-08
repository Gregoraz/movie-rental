<?php
$servername = "localhost:3306";
$username = "movieuser";
$password = "zxccxzzxc1";
$dbname = "movies_";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>