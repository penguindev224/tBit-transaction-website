

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
            <div class="main"><br>

<?php

$CustomerID=$_POST['CustomerID'];
$orderID=$_POST['orderID'];
$price=$_POST['price'];

$updateinfo = "UPDATE dishorder SET refund = 'Y' WHERE orderID = $orderID";
$sql2 = "SELECT * FROM dishorder WHERE orderID = $orderID";

$result = $connection->query($updateinfo);
$result = $connection->query($sql2);

    while($row = $result->fetch_assoc()) {
        $refund = $row['refund'];
        echo "<br><br>Updated Refund indicator : " . $refund . "<br>";
        echo "Please wait for comfirmation from restaurant operator";
    }
$connection->close();

?>   
	</div>
  </body>
  </html>