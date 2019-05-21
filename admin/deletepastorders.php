<?php
require('../connection.php');

$sql = "DELETE FROM orders WHERE orderdate < NOW()";
if($conn->query($sql) === TRUE) echo 'Past orders has been deleted. Redirecting in 5 seconds...<br>Click <a href="orders.php">here</a> if nothing happens.';
else echo 'There are no past orders! Redirecting in 5 seconds...<br>Click <a href="orders.php">here</a> if nothing happens.';



header( "refresh:5;url=orders.php" );

?>