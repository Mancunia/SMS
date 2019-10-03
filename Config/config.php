<?php
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName   = "hellophones";

// Create connection
$conn = new mysqli('localhost', 'root', '', 'hellophones');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<?Php

//session_start();
$dbhost_name = "localhost";
$database = "hellophones";// database name
$username = "root"; // user name
$password = ""; // password 

//////// Do not Edit below /////////
try {
$dbo = new PDO('mysql:host=localhost;dbname='.$database, $username, $password);
} catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
}

?>

