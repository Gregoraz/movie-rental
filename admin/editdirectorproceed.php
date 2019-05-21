<?php
require('../connection.php');

if(isset($_POST["dfirstname"]) and isset($_POST["dlastname"]) and isset($_POST["dcountry"]) and isset($_POST["dmovies"])) {

             
    
    
$sql = '
UPDATE stagedirector
SET firstname="'.$_POST["dfirstname"].'", lastname="'.$_POST["dlastname"].'", country="'.$_POST["dcountry"].'", moviesCount='.$_POST["dmovies"].'
WHERE directorID = '.$_GET["id"]. ';';
    
$result = $conn->query($sql);
    
if ($result === TRUE) {
    echo "Stage director data has been updated. Redirecting in 5 seconds...";
    header( "refresh:5;url=directors.php" );
    echo '<br>Click <a href="directors.php">here</a> if nothing happens';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    header( "refresh:5;url=directors.php" );
}
    

}
else echo "Post has been not sent.";

?>