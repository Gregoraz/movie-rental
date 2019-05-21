<?php
require('../connection.php');
session_start();


if(isset($_SESSION["logged"])) {
if(isset($_POST["customerorder"]) and isset($_POST["employeeorder"]) and isset($_POST["movieorder"])) {             

$price = 0;
    
$sql = 'SELECT priceperday FROM movie WHERE movieID='.$_POST["movieorder"].';';
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$price = $row["priceperday"]*$_POST["rentduration"];

$sql1 = '

INSERT INTO orders (customerID, employeeID, movieID, rentDuration, price, orderdate)
VALUES ('.$_POST["customerorder"].', '.$_POST["employeeorder"].', '.$_POST["movieorder"].', "'.$_POST["rentduration"].'", '.$price.', CURDATE());


;';
    
$sql2 = '
UPDATE movie
SET rentedtill = DATE_ADD(CURDATE(), INTERVAL '.$_POST["rentduration"].' DAY)
WHERE movieID = '.$_POST["movieorder"].'
;';
    
$sql3 = '
UPDATE customer
SET rentedmovieID = '.$_POST["movieorder"].'
SET rentedtill = DATE_ADD(CURDATE(), INTERVAL '.$_POST["rentduration"].' DAY)
WHERE customerID = '.$_POST["customerorder"].'
;';
    
    
$result = $conn->query($sql1);
    
if ($result === TRUE) {
    echo "New order has been added successfully.<br>";
   
} else {
    echo "New order has been NOT added<br>";
}
    
$result = $conn->query($sql2);
    
    if($result === TRUE) {
        echo "Movie rentedtill has been updated<br>"; 
    }
    else echo "Movie rented till has been NOT updated!<br>";
    
$result = $conn->query($sql3);
    
    if($result === TRUE) {
        echo "Customer rentedmovieID has been updated<br>"; 
    }
    else echo "Customer rentedmovieID has been NOT updated!<br>";
    
    header( "refresh:5;url=orders.php" );
    echo '<br>Click <a href="orders.php">here</a> if nothing happens';
    

}
else echo "Post has been not sent.";
}
else header("Location: index.php");
?>