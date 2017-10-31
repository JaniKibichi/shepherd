<?php
require_once("AfricasTalkingGateway.php");
require_once("config.php");

//Create an instance of our awesome gateway class and pass your credentials
$gateway = new AfricasTalkingGateway($username, $apiKey);

// Specify the name of your Africa's Talking payment product
$productName  = "Nerd Payments";
// The phone number of the customer checking out
$phoneNumber  = "+254708415904";
// The 3-Letter ISO currency code for the checkout amount
$currencyCode = "KES";
// The checkout amount
$amount       = 100.50;

// Any metadata that you would like to send along with this request
// This metadata will be  included when we send back the final payment notification
$metadata     = array("agentId"   => "654",
		              "productId" => "321");
try {
  // Initiate the checkout. If successful, you will get back a transactionId
  $transactionId = $gateway->initiateMobilePaymentCheckout($productName,
							   $phoneNumber,
							   $currencyCode,
							   $amount,
							   $metadata);
  echo "The id here is ".$transactionId;
}
catch(AfricasTalkingGatewayException $e){
  echo "Received error response: ".$e->getMessage();
}


?>
    

