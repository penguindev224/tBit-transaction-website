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
  <a href="search.php"><span class="glyphicon glyphicon-search"></span></a>
</head>

<body>

  <div class="navbar">
      <a href="restaurant.php">Restaurant</a>
      <a href="addp.html">Add</a>
      <a href="edit_form.html">Edit</a>
      <a href="deletep.html">Delete</a>
      <a href="logout.php">Logout</a>
    <a href="search.php">
      <span class="glyphicon glyphicon-search"></span>
    </a>
  </div>
  <div class="main">

<?php

// get id value

$dishID= $_POST['dishID'];

// delete the entry

$sql = "DELETE FROM dish WHERE dishID = $dishID";
mysqli_query($connection, $sql);
			
if ($connection->query($sql) === TRUE) {

                            echo "<p>Dish " . $dishID . " deleted</p><br>";

			} else{

                                echo "Error deleting record: " . $sql . "<br>" . $connection->error;
}
			
			mysqli_close($connection);

?>


    
    <p> <a href="view.php">View all products</a> </p>
    
</div>

  </body>
  
  <footer> 
    <a href = "ContactUs.html">Contact Us</a> |
    <a href= "Terms.html">Terms Of Website </a>
 </footer>

</html>