<?php
require('../connection.php');
session_start();

if(isset($_SESSION["logged"])) {
if(isset($_POST["dfirstname"]) and isset($_POST["dlastname"]) and isset($_POST["dcountry"]) and isset($_POST["dmovies"])) {

             
    
    
$sql = 'INSERT INTO stagedirector (firstname, lastname, country, moviesCount)
VALUES ("' .$_POST["dfirstname"].'", "' .$_POST["dlastname"]. '", "' .$_POST["dcountry"]. '", "'.$_POST["dmovies"].'");';
    
$result = $conn->query($sql);
    
if ($result === TRUE) {
    echo "New stage director has been added successfully. Redirecting in 5 seconds...";
    header( "refresh:5;url=directors.php" );
    echo '<br>Click <a href="directors.php">here</a> if nothing happens';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    header( "refresh:5;url=directors.php" );
}
    

}
else echo "Post has been not sent.";
}
else header("Location: index.php");
?>