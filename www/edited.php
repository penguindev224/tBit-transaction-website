<?php
	// Create a database connection
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "eie3117group4";
	$dbname = "3117web";
	$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	// Test if connection succeeded
	if(mysqli_connect_errno()) {
		die("Database connection failed: " . 
        mysqli_connect_error() . 
        " (" . mysqli_connect_errno() . ")"
		);
	}
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
      <a href="logout.php">Logout</a>
    </div>

		<div class = "main">
			<?php
				if(preg_match("/^([0-9]+)$/", $_POST['ID']))
				{
					$ID = $_POST['ID'];
					$PW = $_POST['PW'];
					
					$query = "UPDATE customer SET CustomerPW = '$PW' WHERE CustomerID = '$ID'";
					$update = mysqli_query($connection, $query);
					if (mysqli_affected_rows($connection) !== 0)
						echo "<br>Dear customer (ID " . $ID . "), password has been updated.";
					else
						echo "<br>It is wrong ID.";
				}
				else
				{ 
					echo  "<p><br>Please enter a CustomerID</p>"; 
				}
				mysqli_close($connection);
			?>
		</div>
	</body>
	
	<footer> 
		<a href = "ContactUs.html">Contact Us</a> |
		<a href = "Terms.html">Terms Of Website </a>
	</footer>
</html>