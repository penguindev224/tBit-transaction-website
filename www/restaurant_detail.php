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
  	<title>Restaurant</title>
  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	<link rel = "stylesheet" href= "template.css" type="text/css" />
  	<link rel = "stylesheet" href= "navbar.css" type="text/css" />


      <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
          <style type="text/css"> </style>


           
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
    

    <div class ="main">
      <?php


// get id value

$RestaurantID= $_GET['RestaurantID'];



$sql = "SELECT * FROM dish WHERE RestaurantID = $RestaurantID";

$result = $connection->query($sql);

if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
         
         
        $dishID = $row['dishID'];
        
        $RestaurantID = $row['RestaurantID'];
	$dishName = $row['dishName'];
	$dishPrice = $row['dishPrice'];
	$description = $row['description'];
									
	echo '<br><br><br>';								
	echo '<td><img src="image/dish/' . $row["dishName"] . '.png" style="width:300px" "height=300px"></td><br>';
	echo "Dish ID: " . $dishID . "<br> " .  " Restaurant ID: " . $RestaurantID . "<br> " .  " Dish Name: " . $dishName . " <br>" .  "Price: " . $dishPrice . "<br>";

        echo 'No. of order: <input type="text" name="numberOfOrder">';


     }
} else {
     echo "0 results";
}

$connection->close();


?>

<form method = "post" action = "buy.php">       
  
    <input type="radio" name="Transportation" value="self_pick" checked> self-pick <br>
    <input type="radio" name="Transportation" value="delivery" > delivery <br>
    <br><br> 
    <input type="submit" value="Submit">

</form>

    </div>

  </body>


  
</html>