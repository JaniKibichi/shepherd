<?php
// Be sure to include the file you've just downloaded
require_once('AfricasTalkingGateway.php');
require_once('config.php');

// Specify the numbers that you want to send to in a comma-separated list
// Please ensure you include the country code (+234 for Nigeria in this case)
$recipients = "+2347056582918,+2348177779360";

// And of course we want our recipients to know what we really do
$message    = "I'm a lumberjack and its ok, I sleep all night and I work all day";

// Create a new instance of our awesome gateway class
$gateway    = new AfricasTalkingGateway($userName, $apiKey);

// Any gateway error will be captured by our custom Exception class below, so wrap the call in a try-catch block

try 
{ 
  // Thats it, hit send and we'll take care of the rest. 
  $results = $gateway->sendMessage($recipients, $message);
			
  foreach($results as $result) {
    // status is either "Success" or "error message"
    echo " Number: " .$result->number;
    echo " Status: " .$result->status;
    echo " MessageId: " .$result->messageId;
    echo " Cost: "   .$result->cost."\n";
  }
}
catch ( AfricasTalkingGatewayException $e )
{
  echo "Encountered an error while sending: ".$e->getMessage();
}

// DONE!!! 

