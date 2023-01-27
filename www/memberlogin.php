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
      <a href="status.php">Status</a>
      <a href="logout.php">Logout</a>
      <a href="search.php">
        <span class="glyphicon glyphicon-search"></span>
      </a>
    </div>
		
        <div class="main">
			<br>
			<?php

				// Process the data from the form				
				$CustomerID=$_POST['CustomerID'];
				$CustomerPW=$_POST['CustomerPW'];

				$query = "SELECT CustomerID, CustomerPW FROM customer WHERE CustomerID = '$CustomerID'";
				$customer = mysqli_query($connection, $query);
				if (!$customer || mysqli_num_rows($customer) == 0)
					echo "User not exist";
				else {
					$row = mysqli_fetch_assoc($customer);
					if($row['CustomerPW'] == $CustomerPW)
						{
							$_SESSION["customer"] = $CustomerID;
							echo $_SESSION["customer"] . " Login Successful";
						}
						else
							echo "Wrong Password";
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