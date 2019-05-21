<?php
require('../connection.php');

if(isset($_POST["emaillogin"])) $login = $_POST["emaillogin"];
else echo 'You need to write email first!';

if(isset($_POST["passwordlogin"]))  $password = sha1($_POST["passwordlogin"]);

else echo 'You need to write password first!';

//var_dump($_POST["emaillogin"]);
//var_dump($password);


session_start();


$sql = "SELECT * FROM employee where email = '$login' AND password = '$password'";
$result = $conn->query($sql);
$row = mysqli_fetch_array($result);
if (!empty($row["email"]) and !empty($row["password"])) {
    $_SESSION["logged"] = $row["employeeID"];
    $_SESSION["employee"] = ''.$row["firstname"] . ' ' .$row["lastname"];
    header ("Location: index.php");
}

else {
    echo 'Password or login incorrect!';
    header ("refresh:2;url=index.php");
}


?>