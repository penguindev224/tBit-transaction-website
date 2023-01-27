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
      <a href="request.php">request</a>
      <a href="search.php">

        <span class="glyphicon glyphicon-search"></span>
      </a>
    </div>
            <div class="main"><br>

<?php

$sql = "SELECT DISTINCT * FROM dishorder JOIN dish JOIN refund WHERE dishorder.refund='Y' AND dishorder.dishID = dish.dishID";


$result = $connection->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $customer = $row['CustomerID'];
        $name = $row['dishName'];
        $price = $row['dishPrice'];
        $refund = $row['refund'];
        $orderID = $row['orderID'];
        $walletID = $row['walletID'];
        $passphrase = $row['passphrase'];
        $APIkey = $row['APIkey'];
        $APIsecret = $row['APIsecret'];
        $refunded = $row['refunded'];
        if($refunded != 'Y'){
        echo "<br>Customer ID : " . $customer . "<br>";
        echo "<br>Order item : " . $name . "<br>";
        echo "<br>Price: " . $price . "<br>";
        echo "<br>Order ID : " . $orderID . "<br>";
        echo "<br>Refund indicator : " . $refund . "<br>";

        echo "

      <form method = 'post' action = 'adminrefund.php'>
        <br><input type='hidden' name='WalletID' value='$walletID'>
        <input type='hidden' name='Passphrase' value='$passphrase'>
        <input type='hidden' name='APIkey' value='$APIkey'>
        <input type='hidden' name='APIsecret' value='$APIsecret'>
        <input type='hidden' name='price' value='$price'>
        <input type='hidden' name='orderID' value='$orderID'>
        <input type='submit' value='Confirm Refund Requestion (Bitcoin refund)'>
      </form>";
    }else{
      echo "No refund request found.";
    }

    }
  }else{
    echo "No refund request";
  }
$connection->close();

?>   
	</div>
  </body>
  </html>