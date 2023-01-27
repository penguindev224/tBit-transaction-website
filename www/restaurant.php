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

<!doctype html
>
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
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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

<div class="main">
  <br>
<table style="width:35%">
  <tr>
    <th><b>Filter by food type:</b></th>
    <th><b>Filter by district:</b</th> 
  </tr>
  <tr>
    <td>
<a href="filtered.php?FastFood">Fast food </a> <br>
  <a href="filtered.php?FineDining">Fine Dining </a> <br>
  <a href="filtered.php?FamilyStyle">Family Style</a> <br>
  <a href="filtered.php?Cafe">Cafe</a> <br>
  <a href="filtered.php?Buffet">Buffet</a> <br>
</td>
    <td>
<a href="filtered_district.php?YauTsimMong">Yau Tsim Mong</a> <br>
  <a href="filtered_district.php?CentralAndWestern">Central and Western</a> <br>
  <a href="filtered_district.php?KwunTong">Kwun Tong</a> <br>
  <a href="filtered_district.php?SaiKung">Sai Kung</a> <br>

</td>

  </tr>



  <?php


$sql = "SELECT RestaurantID, RestaurantName, RestaurantEmail, RestaurantPhone, FoodType, District, RestaurantAddress FROM restaurant";
$result = mysqli_query($connection, $sql);
if(!$result || mysqli_num_rows($result) == 0)

echo "No Result is found.";



echo "<table border='0' cellpadding='10' style='width:70%' >";



     while($row = mysqli_fetch_array($result)){
             
          echo "<tr>";

         
          echo '<td><img src="image/restaurant/' . $row["RestaurantName"] . '.png" style="width:300px" "height=300px"></td>';
          echo '<td>'."<br>" .'</td>';
          echo '<td>' . $row["RestaurantName"] . "<br> " . $row["RestaurantEmail"] ."<br> " .  $row["RestaurantPhone"] ."<br> " . $row["FoodType"] ."<br> " . $row["District"] ."<br> " . $row["RestaurantAddress"]. '</td>';
 

        
          echo '<td><a href="restaurant_detail.php?RestaurantID=' . $row['RestaurantID'] . '"> &nbsp Detail &nbsp</a></td>';
          echo "</tr>";
         
          
     }


$connection->close();


?>
 
 <br> <br> <br> <br> <br>

</div>
</body>


</html>
