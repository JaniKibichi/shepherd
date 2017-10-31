<?php
//receive the callback
$from = $_POST['from'];
$to = $_POST['to'];
$text = $_POST['text'];
$date = $_POST['date'];
$id = $_POST['id'];
$linkId = $_POST['linkId'];

require_once('AfricasTalkingGateway.php');
require_once('config.php');

$recipient = "+254708415904";
$shortCode = "22384";
$keyword   = "premiumKeyword"; 

$bulkSMSMode = 0;

// Create an array which would hold parameters keyword, retryDurationInHours and linkId
// linkId is received from the message sent by subscriber to your onDemand service
$linkId = "messageLinkId";

$options = array(
            'keyword'             => $keyword,
            'linkId'              => $linkId,
            'retryDurationInHours' => "No of hours to retry"
           );
           
$message = "Get your daily message and thats how we roll.";

$gateway    = new AfricasTalkingGateway($username, $apikey);

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

// DONE!!! 

