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

				// Process the data from the form
				
				$UserName=$_POST['UserName'];
				$PW=$_POST['PW'];
				$FName=$_POST['FName'];
                                $Phone=$_POST['Phone'];
				$Email=$_POST['Email'];
				$Address=$_POST['Address'];
				
				$sql = "INSERT INTO customer (CustomerUserName, CustomerPW, CustomerName, CustomerPhone, CustomerEmail, DeliveryAddress) VALUES ('$UserName','$PW','$FName', '$Phone', '$Email', '$Address')";
				mysqli_query($connection, $sql);
				
                                if ($connection->query($sql) === TRUE) {
				echo "<p><br>Customer " . $FName . " Added</p>";


                                if($_POST){
 
                                    $Email = isset($_POST['Email']) ? $_POST['Email'] : "";
 
                                    // posted email must not be empty
                                    if(empty($Email)){
                                         echo "<div>Email cannot be empty.</div>";
                                         }
 
                                     // must be a valid email address
                                    else if(!filter_var($Email, FILTER_VALIDATE_EMAIL)){
                                    echo "<div>Your email address is not valid.</div>";
                                            }
 
    else{
 
        // check first if record exists
        $query = "SELECT CustomerID FROM customer WHERE email = ? and verified = '1'";
        $stmt = $con->prepare( $query );
        $stmt->bindParam(1, $Email);
        $stmt->execute();
        $num = $stmt->rowCount();
 
        if($num>0){
            echo "<div>Your email is already activated.</div>";
        }
 
        else{
 
            // check first if there's unverified email related
            $query = "SELECT customerID FROM customer WHERE email = ? and verified = '0'";
            $stmt = $con->prepare( $query );
            $stmt->bindParam(1, $Email);
            $stmt->execute();
            $num = $stmt->rowCount();
 
            if($num>0){
 
                // you have to create a resend verification script
                echo "<div>Your email is already in the system but not yet verified.</div>";
            }
 
            else{
 
                // now, compose the content of the verification email, it will be sent to the email provided during sign up
                // generate verification code, acts as the "key"
                $verificationCode = md5(uniqid("yourrandomstringyouwanttoaddhere", true));
 
                // send the email verification
                $verificationLink = "http://localhost/activate.php?code=" . $verificationCode;
 
                $htmlStr = "";
                $htmlStr .= "Hi " . $email . ",<br /><br />";
 
                $htmlStr .= "Please click the button below to verify and gain access to your account.<br /><br /><br />";
                $htmlStr .= "<a href='{$verificationLink}' target='_blank' style='padding:1em; font-weight:bold; background-color:blue; color:#fff;'>VERIFY EMAIL</a><br /><br /><br />";
 
                $htmlStr .= "Kind regards,<br /> Team 4<br />";
 
 
                $name = "The Code of a Ninja";
                $email_sender = "no-reply@codeofaninja.com";
                $subject = "Verification Link | The Code Of A Ninja | Subscription";
                $recipient_email = $email;
 
                $headers  = "MIME-Version: 1.0\r\n";
                $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
                $headers .= "From: {$name} <{$email_sender}> \n";
 
                $body = $htmlStr;
 
                // send email using the mail function, you can also use php mailer library if you want
                if( mail($recipient_email, $subject, $body, $headers) ){
 
                    // tell the user a verification email were sent
                    echo "<div id='successMessage'>A verification email were sent to <b>" . $email . "</b>, please open your email inbox and click the given link so you can login.</div>";
 
 
                    // save the email in the database
                    $created = date('Y-m-d H:i:s');
 
                    //write query
                    $query = "INSERT INTO
                                users
                            SET
                                email = ?,
                                verification_code = ?,
                                created = ?,
                                verified = '0'";
 
                    $stmt = $con->prepare($query);
 
                    $stmt->bindParam(1, $email);
                    $stmt->bindParam(2, $verificationCode);
                    $stmt->bindParam(3, $created);
 
                    // Execute the query
                    if($stmt->execute()){
                        // echo "<div>Unverified email was saved to the database.</div>";
                    }else{
                        echo "<div>Unable to save your email to the database.";
                        //print_r($stmt->errorInfo());
                    }
 
                }else{
                    die("Sending failed.");
                }
            }
 
 
        }
 
    }
 
}
                                
				} else{

                                echo "Error: " . $sql . "<br>" . $connection->error;
}
				mysqli_close($connection);
			?>
		</div>
	</body>
	
</html>