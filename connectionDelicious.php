<?php
$servername = "172.16.11.22:3306";
$username = "pieg1_1";
$password = "Zxccxzzxc1";
$dbname = "pieg1_15_delicious";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
$conn2 = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>