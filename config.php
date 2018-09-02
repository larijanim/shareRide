<?php
 
$dbhost="localhost";  // hostname
$dbuser="root"; // mysql username
$dbpass="Arian!59"; // mysql password
$db="shareride"; // database you want to use
 
$conn=mysqli_connect( $dbhost, $dbuser, $dbpass, $db ) or die("Could not connect: " .mysqli_error($conn) );
 
//you can also directly write values in mysqli_connect():
 
// $conn=mysqli_connect("localhost", "root", "", "test");
 
?>