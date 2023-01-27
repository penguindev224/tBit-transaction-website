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
      <a href="addp.html">Add</a>
      <a href="editp.html">Edit</a>
      <a href="deletep.html">Delete</a>
      <a href="logout.php">Logout</a>
      <a href="search.php">
        <span class="glyphicon glyphicon-search"></span>
      </a>
    </div>

		<div class = "main">
			<?php

				// Process the data from the form
				
				$RestaurantName=$_POST['RestaurantName'];
				$PW=$_POST['PW'];
				$Email=$_POST['Email'];
				$Phone=$_POST['Phone'];
				$FoodType=$_POST['FoodType'];
				$District=$_POST['District'];
				$Address=$_POST['Address'];
				
				$sql = "INSERT INTO restaurant (RestaurantName, RestaurantEmail, RestaurantPhone, FoodType, District, RestaurantAddress) VALUES ('$RestaurantName', $Email','$Phone', '$FoodType','$District','$Address')";
                                mysqli_query($connection, $sql);
                                
				$query = "INSERT INTO admin (AdminName, AdminPW, AdminEmail) VALUES ('$RestaurantName', $PW','$Email')";
				mysqli_query($connection, $query);

				  if ($connection->query($sql) === TRUE) {

                           echo "<p><br>Restaurant " . $RestaurantName . " Added</p>";
			
                        } else{


                                echo "Error: " . $sql . "<br>" . $connection->error;
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