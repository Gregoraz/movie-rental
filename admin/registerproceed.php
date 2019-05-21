<?php
require('../connection.php');

if(isset($_POST["firstname"])) $firstname = $_POST["firstname"];
else echo 'You need to write firstname first!';

if(isset($_POST["lastname"])) $lastname = $_POST["lastname"];
else echo 'You need to write lastname first!';

if(isset($_POST["email"])) $email = $_POST["email"];
else echo 'You need to write email first!';

if(isset($_POST["password"])) $password = sha1($_POST["password"]);
else echo 'You need to write password first!';

/*
var_dump($firstname);
var_dump($lastname);
var_dump($email);
var_dump($password);
*/



$sql = 'SELECT * from employee WHERE email ="'.$_POST["email"]. '";';
$result = $conn->query($sql);
if((mysqli_num_rows($result)) == 0) {

$sql = '
INSERT INTO employee (firstname, lastname, password, email)
VALUES ("'.$firstname.'", "'.$lastname.'", "'.$password.'", "'.$email.'");';
$result = $conn->query($sql);


if($result === TRUE) {
    echo 'New user has been added, you can now log in';
    header ("refresh:2;url=index.php");
}
else {
    echo 'Error while adding new user';
    header ("refresh:2;url=register.php");
} 
}
else {
    echo 'Email you have entered is already in use, please provide another email address';
    header ("refresh:2;url=register.php");
}

?>