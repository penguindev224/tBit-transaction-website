<?php
session_start();
?>
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
	<body>
    <div class="navbar">
      <a href="restaurant.php">Restaurant</a>
      <a href="login.html">Login</a>
    </div>
		
		<div class="main">
		<br>
			<?php
			if (isset($_SESSION["admin"]) || isset($_SESSION["customer"]))
			{
				session_unset(); 
				session_destroy();
				echo "Successfully Logout";
			}
			else
				echo "No Login information"
			?>
        </div>
	</body>
	
	<footer> 
		<a href = "ContactUs.html">Contact Us</a> |
		<a href = "Terms.html">Terms Of Website </a>
	</footer>
</html>