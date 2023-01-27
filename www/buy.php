<?php
session_start();
?>

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
</head>

<body>

<div class="navbar">
      <a href="restaurant.php">Restaurant</a>
      <a href="status.php">Status</a>
      <a href="login.html">Login</a>
      <a href="logout.php">Logout</a>
  
         <a href="search.php"><span class="glyphicon glyphicon-search"></span></a>
</div>

  <br><br> 
  

  
<?php
			if (isset($_SESSION["admin"]))
				echo "You are admin";
			else
     			if (isset($_SESSION["Customer"]))
		    	{
			        // get id value

			        $dishID= $_GET['dishID'];
			        $CustomerID=$_SESSION["Customer"];
		
              $query = "SELECT CustomerName, CustomerID FROM Customer WHERE CustomerID = '" . $CustomerID . "'";
			        $IDlist = mysqli_query($connection, $query);
              if (!$IDlist || mysqli_num_rows($IDlist) == 0) 
                echo "error";
              else {
                  $row = mysqli_fetch_assoc($IDlist);
                  $CustomerID = $row['CustomerID'];

			            $query = "INSERT INTO dishorder (dishID, CustomerID) VALUES ('$dishID','$CustomerID')";
			            mysqli_query($connection, $query);
			
			            echo "<p>Product " . " (ID: " . $dishID . " )" . " Added</p>";
                  }
                  
			        mysqli_close($connection);
          }
          else
            echo "Unsuccessful Order";
?>

<div class="main">
    
    <p> <a href="restaurant.php">View all restaurants</a> </p>
    
</div>

  </body>
  
  <footer> 
    <a href = "ContactUs.html">Contact Us</a> |
    <a href= "Terms.html">Terms Of Website </a>
 </footer>
 
</html>