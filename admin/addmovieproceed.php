<?php
require('../connection.php');
session_start();

if(isset($_SESSION["logged"])) {
if(isset($_POST["moviename"])) {
    $priceperday = $_POST["moviename"];

             
    
    
$sql = 'INSERT INTO movie (priceperday, name, stagedirectorID, releasedate, description, genreID, rentedtill, available, youtubeID)
VALUES (' .$_POST["movieprice"].', "' .$_POST["moviename"]. '" , 5, "' .$_POST["moviedate"]. '", "'.$_POST["moviedescription"].'", '.$_POST["moviegenre"].', NULL, 1, "'.$_POST["ytID"].'");';
    
$result = $conn->query($sql);
    
if ($result === TRUE) {
    echo "New movie has been added successfully. Redirecting in 5 seconds...";
    header( "refresh:5;url=movies.php" );
    echo '<br>Click <a href="movies.php">here</a> if nothing happens';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    header( "refresh:5;url=movies.php" );
}
    

}
else echo "Post has been not sent.";
}
else header("Location: index.php");
?>