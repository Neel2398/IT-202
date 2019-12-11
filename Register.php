<?php
if(isset($_REQUEST['Register']))
{
	
	include('config.php');
	
	$UserName = $_REQUEST['username'];
	$Password = md5($_REQUEST['password']);
	$Query = "Select * from users where username='$UserName' and password='$Password'";
	$Rs = mysqli_query($con,$Query);
	$C = mysqli_num_rows($Rs);
	if($C>=1)
	{
			header("location:index.php?Msg=Username is Already Registered");
	}
	else
	{
			$Query = "insert into users (username,password)  values('$UserName','$Password')";
			$Rs = mysqli_query($con,$Query);
			header("location:index.php?Msg=You are registered Successfully");					
	}
}	
?>			
<html>
<head>
<link rel='stylesheet' href='style.css' type='text/css' media='all' />

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</head>
<body style="background:lightblue;">
<div style="width:700px; margin:50 auto;">
	<div class="container">
			<h1>Registration Form for Shopping cart</h1>
	</div>
<form>

			  <div class="form-group">
				<label for="username">Username</label>
				<input type="text" class="form-control" name="username" id="username" aria-describedby="username">
			  </div>
			  <div class="form-group">
				<label for="exampleInputPassword1">Password</label>
				<input type="password" class="form-control" name="password" id="exampleInputPassword1">
			  </div>
			  <div class="form-group form-check">
				
			  </div>
			  <button type="submit" name="Register" class="btn btn-primary">Register</button>
			  	  <button type="Reset" name="Clear" class="btn btn-primary">Reset</button>
			</form>


</body>
