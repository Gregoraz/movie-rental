<?php
require('../connection.php');

if(isset($_GET["id"])) {
$sql = "DELETE FROM stagedirector WHERE directorID=" . $_GET["id"];
if($conn->query($sql) === TRUE) echo 'Record has been deleted. Redirecting in 5 seconds...<br>Click <a href="directors.php">here</a> if nothing happens.';
else echo 'sql is not done';


}
else echo 'Something went wrong (ID of movie to be deleted has been not set!). Redirecting in 5 seconds...<br>Click <a href="directors.php">here</a> if nothing happens.';

header( "refresh:5;url=directors.php" );

?>