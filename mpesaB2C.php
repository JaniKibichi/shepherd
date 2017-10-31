<?php
require_once("AfricasTalkingGateway.php");
require_once("config.php")

//Create an instance of our awesome gateway class and pass your credentials
$gateway = new AfricasTalkingGateway($userName, $apiKey);

// Specify the name of your Africa's Talking payment product
$productName  = "Nerd Payments";

// The 3-Letter ISO currency code for the checkout amount
$currencyCode = "KES";

// Provide the details of a mobile money recipient
$recipient1   = array("phoneNumber" => $phoneKe1,
                       "currencyCode" => "KES",
					   "amount"       => 10.50,
					   "metadata"     => array("name"   => "Clerk",
					                           "reason" => "May Salary")
		      );
// You can provide up to 10 recipients at a time
$recipient2   = array("phoneNumber"  => $phoneKe2,
                    "currencyCode" => "KES",
					"amount"       => 50.10,
					"metadata"     => array("name"   => "Accountant",
					                        "reason" => "May Salary")
		      );
// Put the recipients into an array
$recipients  = array($recipient1, $recipient2);

try {
  $responses = $gateway->mobilePaymentB2CRequest($productName, $recipients);
  
  foreach($responses as $response) {
    // Parse the responses and print them out
    echo "phoneNumber=".$response->phoneNumber;
    echo ";status=".$response->status;
	
    if ($response->status == "Queued") {
      echo ";transactionId=".$response->transactionId;
      echo ";provider=".$response->provider;
      echo ";providerChannel=".$response->providerChannelCode;
      echo ";value=".$response->value;
      echo ";transactionFee=".$response->transactionFee."\n";
    } else {
      echo ";errorMessage=".$response->errorMessage."\n";
    }
  }
  
}
catch(AfricasTalkingGatewayException $e){
  echo "Received error response: ".$e->getMessage();
}
?>

    

