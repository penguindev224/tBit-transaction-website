<?php
  // Create a database connection
  $dbhost = "localhost";
  $dbuser = "root";
  $dbpass = "";
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
      <a href="view.php">View</a>
      <a href="addp.html">Add</a>
      <a href="edit_form.html">Edit</a>
      <a href="deletep.html">Delete</a>
      <a href="logout.php">Logout</a>
    
   </div>
    
	<br>

<div class="main">
    
  
<?php

echo "<h3><b>Menu List</b></h3>";



echo "<table border='1' cellpadding='15' style='width:31%' >";

echo "<tr> 
		<th>&nbsp dishID &nbsp</th> 
		<th>&nbsp dishName &nbsp</th> 
		<th>&nbsp dishPrice &nbsp</th> 
		<th>&nbsp description &nbsp</th> 
		<th>&nbsp RestaurantID &nbsp</th>
	  </tr>";


$sql = "SELECT * FROM dish ORDER BY RestaurantID";
$result = mysqli_query($connection, $sql);
if(!$result || mysqli_num_rows($result) == 0)

echo "No Result is found.";

echo "<table border='0' cellpadding='10' style='width:60%' >";     

while($row = mysqli_fetch_array($result)){
              
          echo "<tr>";

          echo '<td>' . $row["dishID"] . '</td>';

          echo '<td>' . $row["dishName"] . '</td>';

          echo '<td>' . $row["dishPrice"] . '</td>';

          echo '<td>' . $row["description"] . '</td>';
 
          echo '<td>' . $row["RestaurantID"] . '</td>';

          echo '<td><a href="editp.html?dishID=' . $row['dishID'] . '">  Edit</a></td>';
          
          echo '<td><a href="deletep.html?dishID=' . $row['dishID'] . '">  Delete</a></td>';
         
          

          echo "</tr>";

     }


$connection->close();


?>
	
</div>

</body>

<footer> 
    <a href = "ContactUs.html">Contact Us</a> |
    <a href= "Terms.html">Terms Of Website </a>
 </footer>

</html>