<?php
require('../connection.php');
session_start();

if(isset($_SESSION["logged"])) {
if(isset($_POST["cfirstname"]) and isset($_POST["clastname"]) and isset($_POST["cemail"]) and isset($_POST["caddress"])) {

             
    
    
$sql = 'INSERT INTO customer (firstname, lastname, email, address)
VALUES ("' .$_POST["cfirstname"].'", "' .$_POST["clastname"]. '", "' .$_POST["cemail"]. '", "'.$_POST["caddress"].'");';
    
$result = $conn->query($sql);
    
if ($result === TRUE) {
    echo "New customer has been added successfully. Redirecting in 5 seconds...";
    header( "refresh:5;url=customers.php" );
    echo '<br>Click <a href="customers.php">here</a> if nothing happens';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    header( "refresh:5;url=customers.php" );
}
    

}
else echo "Post has been not sent.";
}
?>