<?php
require_once('AfricasTalkingGateway.php');
require_once('config.php');

$recipients = "+254708415904";
$message    = "I'm a lumberjack and its ok, I sleep all night and I work all day";
$from = "20880"; 

$bulkSMSMode = 1;
$options = array("enqueue" => 1);
$gateway    = new AfricasTalkingGateway($userName, $apiKey);

try 
{  
  $results = $gateway->sendMessage($recipients, $message, $from, $bulkSMSMode, $options);	
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

