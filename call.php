<?php
require_once('AfricasTalkingGateway.php');
require_once('config.php');


$from = "+2348139840101";//254711082880
//call to db
$to   = "+2347056582918,+2347069371509";

// Create a new instance of our awesome gateway class
$gateway = new AfricasTalkingGateway($userName, $apiKey);

try 
{
  // Make the call
  $results = $gateway->call($from, $to);

  //This will loop through all the numbers you requested to be called
  foreach($results as $result) {
	//Only status "Queued" means the call was successfully placed
	echo $result->status;
	echo $result->phoneNumber;
	echo "<br/>";
  }
		
}
catch ( AfricasTalkingGatewayException $e )
{
  echo "Encountered an error while making the call: ".$e->getMessage();
}
?>
