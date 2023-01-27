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

use Blocktrail\SDK\BlocktrailSDK;

require "C:/wamp64/vendor/autoload.php";

$testnet=true;
$ClientWallet=$_POST['WalletID'];
$ClientPassphrase=$_POST['Passphrase'];
$ClientAPIkey=$_POST['APIkey'];
$ClientAPIsecret=$_POST['APIsecret'];

try {
    // Initialize the SDK
    $client = new BlocktrailSDK($ClientAPIkey, $ClientAPIsecret, "BTC", $testnet);
} catch (Exception $e) {
    print "Incorrect wallet ID or passphrase or API key or API secret";
}


try {
    // Or you can initialize an already existing wallet
    $walletClient = $client->initWallet($ClientWallet, $ClientPassphrase);
} catch (Exception $e) {
    print "Incorrect wallet ID or passphrase or API key or API secret";
}




try {
    list($confirmedBalance, $unconfirmedBalance) = $walletClient->getBalance();
    <br>echo " Balance: " . BlocktrailSDK::toBTC($confirmedBalance);
    <br>echo " Unconfirmed Balance: " . BlocktrailSDK::toBTC($unconfirmedBalance);
    print "W";
} catch (Exception $e) {
    print "Sending bitcoins failed because {$e->getMessage()}";
}


?>
	</div>
  </body>
  </html>