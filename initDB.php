
<?php
#turn error reporting on
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//pull in config.php so we can access the variables from it
require('config.php');
echo $host;
$conn_string = "mysql:host=$host;dbname=$database;database=$username;password=$password;charset=utf8mb4";
try{
        $db = new PDO($conn_string, $username, $password);
        echo "Connected";
        $query="create table if not exists `TestUsers`(
               `id` int auto_increment not null,
               `username` varchar(30) not null unique,
               `pin` int default 0,
               PRIMARY KEY (`id`)
               ) CHARACTER SET utf8 COLLATE utf8_general_ci";
        $stmt = $db->prepare($query);
        $r = $stmt->execute();
        //just to see the value (should be 1)
        echo "<br>" . $r . "<br>";
        $user = "Neel";
        $pin = 2398 ;
        $insert_query = "INSERT INTO `TestUsers`(`username`, `pin`) VALUES ($user, $pin)";
        $stmt = $db->prepare($insert_query);
        $r = $stmt->execute();

}
catch(Exception $e){
        echo $e->getMessage();
        exit("Something went wrong");
}
?>
<?php
#turn error reporting on
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//pull in config.php so we can access the variables from it
require('config.php');
echo $host;
$conn_string = "mysql:host=$host;dbname=$database;database=$username;password=$password;charset=utf8mb4";
try{
	$db = new PDO($conn_string, $username, $password);
	echo "Connected";
	$query="create table if not exists `TestUsers`(
	       `id` int auto_increment not null,
	       `username` varchar(30) not null unique,
	       `pin` int default 0,
	       PRIMARY KEY (`id`)
	       ) CHARACTER SET utf8 COLLATE utf8_general_ci";
	$stmt = $db->prepare($query);
	$r = $stmt->execute();
        //just to see the value (should be 1)
        echo "<br>" . $r . "<br>";
	$user = "Neel";
        $pin = 2398 ;
        $insert_query = "INSERT INTO `TestUsers`(`username`, `pin`) VALUES ($user, $pin)";
	$stmt = $db->prepare($insert_query);
	$r = $stmt->execute();
	
}
catch(Exception $e){
	echo $e->getMessage();
	exit("Something went wrong");
}
?>
