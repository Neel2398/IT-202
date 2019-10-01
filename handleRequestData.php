<?php
	echo "<pre>" . var_export($_GET, true) . "</pre>";
	if(isset($_GET['name1'])){
                echo "<br>Hello, " . $_GET['name1'] . "<br>";
		$name1 = $_GET['name1'];
        }
	if(isset($_GET['name2'])){
		echo "<br>how are you, " . $_GET['name2'] . "<br>";
		$name2 = $_GET['name2'];
	}
	if(isset($_GET['number1'])){
                $number1 = $_GET['number1'];
                echo "<br>" . $number1 . " should be a number...";
                echo "<br> but it might not be</br>";
        }
        if(isset($_GET['number2'])){
		$number2 = $_GET['number2'];
		echo "<br>" . $number2 . " should be a number...";
		echo "<br> but it might not be</br>";

		if (is_numeric($number2)) {
        		echo var_export($number2, true) . " is numeric", PHP_EOL;
    		}
	}
	$n= (int)$number1 + (int)$number2 ;
	echo "<br>Addition is =" . $n ." </br>";
	echo "<br>Concatenation =" . $name1.$name2 ." </br>";
	echo "<br> Answer for # 3:If you try passing two parameters with the same name but different values ,it shows last value</br>"
	echo "<br>Answer for #4: If you Try passing a parameter with a value containing various special characters, # and & sign is not working"	

	//try passing multiple same-named parameters with different values
	//try passing a parameter value with special characters
	//web.njit.edu/~ucid/IT202/handleRequestData.php?parameter1=a&p2=b
?>
