<?php
	echo "<pre>" . var_export($_GET, true) . "</pre>";
	if(isset($_GET['name'])){
                echo "<br>Hello, " . $_GET['name'] . "<br>";
        }
	if(isset($_GET['name1'])){
		echo "<br>Hello, " . $_GET['name1'] . "<br>";
	}
	if(isset($_GET['number1'])){
                $number1 = $_GET['number1'];
                echo "<br>" . $number1 . " should be a number...";
                echo "<br>but it might not be<br>";
        }
        if(isset($_GET['number2'])){
		$number2 = $_GET['number2'];
		echo "<br>" . $number2 . " should be a number...";
		echo "<br>but it might not be<br>";
	}

	echo $name + $name1
	echo (int)$number1 + (int)$number2 ;
	//concatenate 2 or more parameter values and echo them
	//try passing multiple same-named parameters with different values
	//try passing a parameter value with special characters
	//web.njit.edu/~ucid/IT202/handleRequestData.php?parameter1=a&p2=b
?>
