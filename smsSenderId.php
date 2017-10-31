<?php
//Sending Messages using sender id/short code

require_once('AfricasTalkingGateway.php');
require_once('config.php');

$recipients = "+254708415904";
$message    = "I'm a lumberjack and its ok, I sleep all night and I work all day";

// Specify your AfricasTalking shortCode or sender id
$from = "20880";

$gateway    = new AfricasTalkingGateway($userName, $apiKey);

try 
{
   
   $results = $gateway->sendMessage($recipients, $message, $from);
			
  foreach($results as $result) {
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

