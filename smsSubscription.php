<?php
// Sending premium rated messages
require_once('AfricasTalkingGateway.php');
require_once('config.php');

$recipient = "+254708415904";

// Specify your premium shortCode and keyword
$shortCode = "22384";
$keyword   = "sheng";

// Set the bulkSMSMode flag to 0 so that the subscriber gets charged
$bulkSMSMode = 0;

// Create an array which would hold the following parameters:
// keyword: Your premium keyword,
// retryDurationInHours: The numbers of hours our API should retry to send the message 
// incase it doesn't go through. It is optional

$options = array(
            'keyword'              => $keyword,
            'retryDurationInHours' => "6"
           );
           
$message = "Get your daily message and thats how we roll.";

$gateway    = new AfricasTalkingGateway($useName, $apiKey);

try 
{ 

  $results = $gateway->sendMessage($recipient, $message, $shortCode, $bulkSMSMode, $options);
  foreach($results as $result) {
    echo " Number: " .$result->number;
    echo " Status: " .$result->status;
    echo " MessageId: " .$result->messageId . "\n";
  }
}
catch ( AfricasTalkingGatewayException $e )
{
  echo "Encountered an error while sending: ".$e->getMessage();
}

?>

