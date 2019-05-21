<?php
session_start();

if(isset($_SESSION["logged"])) session_destroy();
echo 'You have been logged out. Redirecting...';
header("Location: index.php");
?>