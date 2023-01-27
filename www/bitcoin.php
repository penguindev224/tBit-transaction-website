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

//use Blocktrail\SDK\BlocktrailSDK;
//use Blocktrail\SDK\Connection\Exceptions\ObjectNotFound;
//use Blocktrail\SDK\Wallet;
//use Blocktrail\SDK\WalletInterface;

use Blocktrail\SDK\BlocktrailSDK;


require "C:/wamp64/vendor/autoload.php";

$CustomerID=$_POST['CustomerID'];
$orderID=$_POST['orderID'];
$price=$_POST['price'];
// Variables 

$myAPIKEY       = "8a6588921a5563c737db9cdbebc133a0b5d6d479";
$myAPISECRET    = "e031f6ba8c5cf49b224a66e3bacd88d8a3636246";
$testnet        = true; //false for bitcoin mainnet or true for testnet
$walletIdent    = "tanyachg3";
$walletPassword = "eie3117";
//$callbackURL    = "https://www.project3117.tk/sucessful.php";

$ClientWallet=$_POST['WalletID'];
$ClientPassphrase=$_POST['Passphrase'];
$ClientAPIkey=$_POST['APIkey'];
$ClientAPIsecret=$_POST['APIsecret'];

try {
    // Initialize the SDK
    $owner = new BlocktrailSDK($myAPIKEY, $myAPISECRET, "BTC", $testnet);
    $client = new BlocktrailSDK($ClientAPIkey, $ClientAPIsecret, "BTC", $testnet);

} catch (Exception $e) {
    print "Incorrect wallet ID or passphrase or API key or API secret";
}


try {
    // Initialize the wallets
    $walletOwner = $owner->initWallet($walletIdent, $walletPassword);
    $walletClient = $client->initWallet($ClientWallet, $ClientPassphrase);
} catch (Exception $e) {
    print "Incorrect wallet ID or passphrase or API key or API secret";
}

try {
    //Create new payment addr
    $addressOwner = $walletOwner->getNewAddress();
} catch (Exception $e) {
    print "Failed address creation because {$e->getMessage()}";
}




$sql = "SELECT State FROM dishorder WHERE orderID = $orderID";
$sql2 = "SELECT * FROM customer WHERE CustomerID = $CustomerID";

$updateinfo = "UPDATE dishorder SET State = 'Y', refunded='N' WHERE orderID = $orderID";


$update = "UPDATE refund SET customerID = {$CustomerID}, walletID = '{$ClientWallet}', passphrase = '{$ClientPassphrase}', APIkey = '{$ClientAPIkey}', APIsecret = '{$ClientAPIsecret}' WHERE orderID = {$orderID}";
$sql3 = "SELECT * FROM refund WHERE orderID = {$orderID}";


try {

    $satoshi = BlocktrailSDK::toSatoshi($price);
    $txHash = $walletClient->pay(array($addressOwner => $satoshi));
    print "<br>Bitcoin transaction undergo successfully to address: {$addressOwner}";
    print "<br>Transaction ID: {$txHash}";
    list($confirmedBalance, $unconfirmedBalance) = $walletClient->getBalance();
    echo "<br>The remaining balance: " . BlocktrailSDK::toBTC($confirmedBalance);
    echo "<br>Unconfirmed Balance: " . BlocktrailSDK::toBTC($unconfirmedBalance);
    
    $result = $connection->query($update);
    $result = $connection->query($updateinfo);
    $result = $connection->query($sql);

    while($row = $result->fetch_assoc()) {
        $state = $row['State'];
        echo "<br>Updated payment status : " . $state . "<br>";
    }

    /*
    $result = $connection->query($sql3);
        while($row = $result->fetch_assoc()) {
        $upcustomer = $row['customerID'];
        $upwallet = $row['walletID'];
        $uppass = $row['passphrase'];
        $upkey = $row['APIkey'];
        $upsecret = $row['APIsecret'];
        echo "<br> " . $upcustomer;
        echo "<br> " . $upwallet;
        echo "<br> " . $uppass;
        echo "<br> " . $upkey;
        echo "<br> " . $upsecret;
    }
    */


    } catch (Exception $e) {
    print "Sending bitcoins failed because {$e->getMessage()}";
}

$connection->close();

?>
	</div>
  </body>
  </html>