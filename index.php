<?php
session_start();
include('config.php');

if(isset($_REQUEST['Login']))
{
		$UserName = $_REQUEST['username'];
		$Password = md5($_REQUEST['password']);
		$Query = "Select * from users where username='$UserName' and password='$Password'";
		//echo $Query;
		$Rs = mysqli_query($con,$Query);
		$C = mysqli_num_rows($Rs);
		if($C>=1)
		{
			$_SESSION['UserName']=$Un;
			$_SESSION['Logged']='Success';
		}	
		else{
			header("location:index.php?Msg=Invalid username or Password");
		}
		//echo 'Find'. $C;
}
$status="";
if (isset($_POST['code']) && $_POST['code']!=""){
$code = $_POST['code'];
$result = mysqli_query($con,"SELECT * FROM `products` WHERE `code`='$code'");
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$code = $row['code'];
$price = $row['price'];
$image = $row['image'];

$cartArray = array(
	$code=>array(
	'name'=>$name,
	'code'=>$code,
	'price'=>$price,
	'quantity'=>1,
	'image'=>$image)
);

if(empty($_SESSION["shopping_cart"])) {
	$_SESSION["shopping_cart"] = $cartArray;
	$status = "<div class='box' style='color:green;'>Product is added to your cart!</div>";
}else{
	$array_keys = array_keys($_SESSION["shopping_cart"]);
	if(in_array($code,$array_keys)) {
		$status = "<div class='box' style='color:red;'>
		Product is already added to your cart!</div>";	
	} else {
	$_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
	$status = "<div class='box' style='color:green;'>Product is added to your cart!</div>";
	}

	}
}

if(isset($_REQUEST['Logout']) && $_REQUEST['Logout']=="logout")
{
	unset($_SESSION['Logged']);
	header("location:index.php?Msg=You are successfully Logout ");	
}
?>
<html>
<head>
<link rel='stylesheet' href='style.css' type='text/css' media='all' />

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</head>
<body >
<div style="width:700px; margin:50 auto;">

<h2>Simple Shopping Cart using PHP and MySQL</h2>   

<?php
	if(isset($_SESSION['Logged']))
	{
		
?>
<form>
<button type='submit' name="Logout" value="logout" class='logout'>Logout</button>
</form>
<?php
if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
?>
<div class="cart_div">
<a href="cart_1.php"><img src="cart-icon.png" /> Cart<span><?php echo $cart_count; ?></span></a>
</div>
<?php
}
echo "<div></div>";
$result = mysqli_query($con,"SELECT * FROM `products`");
while($row = mysqli_fetch_assoc($result)){
		echo "<div class='product_wrapper'>
			  <form method='post' action=''>
			  <input type='hidden' name='code' value=".$row['code']." />
			  <div class='image'><img src='".$row['image']."' /></div>
			  <div class='name'>".$row['name']."</div>
		   	  <div class='price'>$".$row['price']."</div>
			  <button type='submit' class='buy'>Buy Now</button>
			  </form>
		   	  </div>";
        }
mysqli_close($con);
?>
<?php
	}
	else{
		?>
		<div >
			<h1> <?php 
					if(isset($_REQUEST['Msg']))
						{					
						echo "<font color=red>". $_REQUEST['Msg'] . "</font>";
					}
				?>
				
			</h1>
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
			  <button type="submit" name="Login" class="btn btn-primary">Login</button>
			  	  <button type="Reset" name="Clear" class="btn btn-primary">Reset</button>
			</form>
		<a class="btn btn-primary" href="Register.php" role="button">Register Here</a>
</div>
	<?php
	}
	?>

<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>

</div>
</body>
</html>