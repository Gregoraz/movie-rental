<?php
require('../connection.php');

if(isset($_POST["cfirstname"]) and isset($_POST["clastname"]) and isset($_POST["cemail"]) and isset($_POST["caddress"])) {

             
    
    
$sql = '
UPDATE customer
SET firstname="'.$_POST["cfirstname"].'", lastname="'.$_POST["clastname"].'", email="'.$_POST["cemail"].'", address="'.$_POST["caddress"].'"
WHERE customerID = '.$_GET["id"]. ';';
    
$result = $conn->query($sql);
    
if ($result === TRUE) {
    echo "Customer data has been updated. Redirecting in 5 seconds...";
    header( "refresh:5;url=customers.php" );
    echo '<br>Click <a href="customers.php">here</a> if nothing happens';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    header( "refresh:5;url=customers.php" );
}
    

}
else echo "Post has been not sent.";

?>