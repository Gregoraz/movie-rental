<?php
require('../connection.php');
session_start();

if(isset($_SESSION["logged"])) {
if(isset($_GET["orderID"])) {
    
    
$sql = '
SELECT orders.orderID, customer.firstname AS cfirstname, customer.lastname AS clastname, customer.email AS cemail, customer.address AS caddress, employee.firstname AS efirstname, employee.lastname AS elastname, employee.email AS eemail, movie.name AS moviename, movie.priceperday, movie.rentedtill, orders.orderdate, orders.rentDuration, orders.price FROM orders
INNER JOIN customer ON orders.customerID = customer.customerID
INNER JOIN employee ON orders.employeeID = employee.employeeID
INNER JOIN movie ON orders.movieID = movie.movieID
WHERE orders.orderID = '.$_GET["orderID"].'
;';
    
$result = $conn->query($sql);   
    
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    
    echo '
        Receipt<br><br>
        Order ID: '.$row["orderID"].' <br><br>
        
        Rented movie: '.$row["moviename"].' <br><br>
        
        Customer<br>Firstname: '.$row["cfirstname"].' <br>
        Lastname: '.$row["clastname"].' <br>
        Email: '.$row["cemail"].' <br>
        Address: '.$row["caddress"].' <br><br>
        
        Employee<br>
        Firstname: '.$row["efirstname"].' <br>
        Lastname: '.$row["elastname"].' <br>
        Email: '.$row["eemail"].' <br><br>
        
        Order date: '.$row["orderdate"].' <br>
        Rent duration: '.$row["rentDuration"].' days<br>
        Return date: '.$row["rentedtill"].' <br>
        
        Price per one day: £'.$row["priceperday"].' <br>
        Price at all: £'.$row["price"].' <br><br>
        
        Please ensure that you will return the movie on the time!
    ';
    
    
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
    

}
else echo "GET has been not sent.";
}
else header("Location: index.php");
?>