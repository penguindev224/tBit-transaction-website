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
      <a href="view.php">view</a>
      <a href="addp.html">Add</a>
      <a href="editp.html">Edit</a>
      <a href="deletep.html">Delete</a>
      <a href="logout.php">Logout</a>

  </div>

  <br><br> 
  
<div class="main">
    <p>
      <a href="view.php">View all products</a>
    </p>
</div>

  
<?php


// Process the data from the form
			

                        $DishName=$_POST['DishName'];
                        $Price=$_POST['Price'];
                        $Description=$_POST['Description'];
                        $RestaurantID=$_POST['RestaurantID'];


			$sql = "INSERT INTO dish (dishName, dishPrice, description, RestaurantID) VALUES ('$DishName', '$Price', '$Description', '$RestaurantID')";
			mysqli_query($connection, $sql);
			
                        if ($connection->query($sql) === TRUE) {

                            echo "<p>Dish " . $DishName . " Added</p><br>";
			} else{

                                echo "Error: " . $sql . "<br>" . $connection->error;
}

			mysqli_close($connection);





?>

  </body>
  
  <footer> 
    <a href = "ContactUs.html">Contact Us</a> |
    <a href= "Terms.html">Terms Of Website </a>
 </footer>
 
</html>