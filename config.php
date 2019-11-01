
<?php

session_start();

$host = "sql1.njit.edu"; 
$user = "nkp48"; 
$password = "57t9doD1"; 
$dbname = "nkp48"; 
$con = mysqli_connect($host, $user, $password,$dbname);
if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
} 
?>


