<!doctype html>
<html>
	<head>
		<title>EIE3117</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel = "stylesheet" href= "template.css" type="text/css" />
		<link rel = "stylesheet" href= "navbar.css" type="text/css" />
	</head>
	
    <div class="navbar">
      <a href="restaurant.php">Restaurant</a>
      <a href="status.php">Status</a>
      <a href="logout.php">Logout</a>
      <a href="search.php">
        <span class="glyphicon glyphicon-search"></span>
      </a>
    </div>
    	<br>

		<div class="main">

		<?php

		$price=$_POST['price'];
		$orderID=$_POST['orderID'];
		$CustomerID=$_POST['CustomerID'];


    	echo "Input the following information for further payment
    	<br>***Important: The information will be logged for refund purpose ****

			<form method = 'post' action = 'bitcoin.php'>
				<br>
				Wallet Identifier:
				<br>
				<input type='text' name='WalletID'>
				<br>
				Passpharse:
				<br>
				<input type='password' name='Passphrase'>
				<br>
				API key:
				<br>
				<input type='password' name='APIkey'>
				<br>
				API key secret:
				<br>
				<input type='password' name='APIsecret'>
				<br><br>
        		<input type='hidden' name='price' value='{$price}'>
        		<input type='hidden' name='orderID' value='{$orderID}'>
        		<input type='hidden' name='CustomerID' value='{$CustomerID}'>
				<input type='submit' value='Confirm'>
			</form>";



			?>
                        <br><br>


        </div>
	</body>

	<footer> 
		<a href = "ContactUs.html">Contact Us</a>
		<a href = "Terms.html">Terms Of Website </a>
	</footer>
</html>