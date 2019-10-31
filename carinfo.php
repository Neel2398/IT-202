<?php
#turn error reporting on
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require('config.php');
echo "Loaded Host: " . $host;
$conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
try{
	$db = new PDO($conn_string, $username, $password);
	echo "Connected";
	
	$insert_query = "INSERT INTO `TestUsers`( `username`, `pin`) 
		VALUES (:username, :pin)";
	$stmt = $db->prepare($insert_query);
	$newUser = "NewUser";
	$newPin = 1234;
	$stmt= 
	$r = $stmt->execute(array(":username"=> $newUser, ":pin"=>$newPin));
	
	
	$select_query = "select * from `TestUsers` where username = :username";
	$stmt = $db->prepare($select_query);
	$r = $stmt->execute(array(":username"=> "NewUser"));
	$results = $stmt->fetch(PDO::FETCH_ASSOC);
	echo "<pre>" . var_export($results, true) . "</pre>"; 
}
catch(Exception $e){
	echo $e->getMessage();
	exit("Something went wrong");
}
 

function checkPasswords(){
	if($_POST['password'] == $_POST['newPin']){
		echo "<br>Passwords Matched!<br>";
	}
	else{
		echo "<br>Passwords didn't match!<br>";
	}
	
}
?>
<html>
<head>
<script>
function validate(){
	var form = document.forms[0];
	var password = form.password.value;
	var conf = 1234;
	console.log(password);
	console.log(conf);
	let pv = document.getElementById("validation.password");
	let succeeded = true;
	if(password == conf){
		
		pv.style.display = "none";
		form.confirm.className= "noerror";	
	}
	else{
		pv.style.display = "block";
		pv.innerText = "Passwords don't match";
		//form.confirm.focus();
		form.confirm.className = "error";
		//form.confirm.style = "border: 1px solid red;";
		succeeded = false;
	}
	return succeeded;
}
</script>
<style>
input { border: 1px solid black; }
.error {border: 1px solid red;}
.noerror {border: 1px solid black;}
</style>
</head>
<body>
<div style="margin-left: 50%; margin-right:50%;">
<form method="POST" action="#" onsubmit="return validate();">
<input name="username" type="text" placeholder="Enter your username"/>
<input type="password" name="password" placeholder="Enter password"/>
<span style="display:none;" id="validation.password"></span>
<input type="submit" value="Try it"/>
</form>
</div>
</body>
</html>
<?php checkPasswords();?>
<?php
if(isset($_POST)){
	echo "<br><pre>" . var_export($_POST, true) . "</pre><br>";
}
?>
