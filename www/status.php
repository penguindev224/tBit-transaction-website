<?php
	session_start();
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

$CustomerID= $_SESSION["customer"];



$sql = "SELECT dishorder.CustomerID, dishorder.dishID, dishorder.RestaurantID, dishorder.CustomerID, dishorder.orderID, dishorder.transportation, dish.dishPrice, dishorder.state FROM dishorder JOIN dish WHERE dishorder.CustomerID = $CustomerID AND dishorder.dishID = dish.dishID";

$result = $connection->query($sql);


if ($result->num_rows > 0) {
     

     echo "<br>Current Order: <br>";
     while($row = $result->fetch_assoc()) {
         
      $CustomerID = $row['CustomerID'];
      $dishID = $row['dishID'];
			$RestaurantID = $row['RestaurantID'];
			$CustomerID = $row['CustomerID'];
			$orderID = $row['orderID'];
      $transportation = $row['transportation'];
      $price = $row['dishPrice'];
      $state = $row['state'];
									
	echo '<br>';								
	echo "OrderID : " . $orderID . "<br>";
			echo "CustomerID : " . $CustomerID . "<br>";
			echo "RestaurantID : " . $RestaurantID .  "<br>";
			echo "DishID : " . $dishID . "<br>";
			echo "Transportation : " . $transportation . "<br>";
      echo "Price : " . $price . "<br>";
      echo "Paid? : " . $state . "<br>";

      if($state=="N"){
        echo "
        <form method = 'post' action = 'payment.php'>
        <input type='hidden' name='price' value='{$price}'>
        <input type='hidden' name='orderID' value='{$orderID}'>
        <input type='hidden' name='CustomerID' value='{$CustomerID}'>
        <br><input type='submit' value='Confirm Payment to order id {$orderID} (Bitcoin)'></form>";
      }else{

         echo "
         <br>We can provide refund function if you want to cancel order.
         <br>Once the order cancellation is confirmed by restaurant operator, the payment will return to your bitcoin wallet.
        <form method = 'post' action = 'waiting.php'>
        <input type='hidden' name='price' value='{$price}'>
        <input type='hidden' name='orderID' value='{$orderID}'>
        <input type='hidden' name='CustomerID' value='{$CustomerID}'>
        <br><input type='submit' value='Order Cancellation to order id {$orderID} (Bitcoin)'></form>";

      }


     }
} else {
     echo "0 orders";
}

$connection->close();


?>


     </div>
	</body>
 
	 
 
</html>