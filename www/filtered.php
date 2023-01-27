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
      <a href="status.php">Status</a>
      <a href="login.html">Login</a>
      <a href="logout.php">Logout</a>
      <a href="search.php">
        <span class="glyphicon glyphicon-search"></span>
      </a>
    </div>
		<div class = "main">

			
			<?php 

				$keyword = $_SERVER['QUERY_STRING'];

				
							
							$query = "SELECT RestaurantID, RestaurantName, RestaurantEmail, RestaurantPhone, FoodType, District, RestaurantAddress FROM restaurant WHERE FoodType LIKE '%" . $keyword .  "%'"; 
							$search = mysqli_query($connection, $query);
							if(!$search || mysqli_num_rows($search) == 0)
								echo "No Result is found.";
							else {
								echo "<br>";
								while($row = mysqli_fetch_array($search))
								{
									$RestaurantID = $row['RestaurantID'];
									$RestaurantName = $row['RestaurantName'];
									$RestaurantEmail = $row['RestaurantEmail'];
									$RestaurantPhone = $row['RestaurantPhone'];
									$FoodType = $row['FoodType'];
									$District = $row['District'];
									$RestaurantAddress = $row['RestaurantAddress'];
									
                                                                        echo '<td><img src="image/restaurant/' . $row["RestaurantName"] . '.png" style="width:300px" "height=300px"></td><br>';
									echo $RestaurantID . ". " . $RestaurantName . "<br> " . $RestaurantEmail . " <br>" . $RestaurantPhone . " <br>" . $FoodType . " <br>" . $District . " <br>" . $RestaurantAddress . "<br><br><br>";
								}
								mysqli_free_result($search);
							}
						
				
				
				mysqli_close($connection);
			?> 
		</div>
	</body>


</html>