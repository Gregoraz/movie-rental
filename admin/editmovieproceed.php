<?php
require('../connection.php');

if(isset($_POST["moviename"])) {

             
    
    
$sql = '
UPDATE movie
SET priceperday='.$_POST["movieprice"].', name="'.$_POST["moviename"].'", stagedirectorID='.$_POST["moviedirector"].', releasedate="'.$_POST["moviedate"].'", description="'.$_POST["moviedescription"].'", genreID='.$_POST["moviegenre"].', youtubeID="'.$_POST["ytID"].'"
WHERE movieID = '.$_GET["id"]. ';';
    
$result = $conn->query($sql);
    
if ($result === TRUE) {
    echo "Movie data has been updated. Redirecting in 5 seconds...";
    header( "refresh:5;url=movies.php" );
    echo '<br>Click <a href="movies.php">here</a> if nothing happens';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    header( "refresh:5;url=movies.php" );
}
    

}
else echo "Post has been not sent.";

?>