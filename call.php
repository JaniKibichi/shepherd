<?php
require_once('AfricasTalkingGateway.php');

$username   = "WeloveNerds";
$apikey     = "34916511ccfe864b9aed8cb41758c5c87638daf3867148dea6c951a38e2ff126";

$from = "+2348139840101";//254711082880
//call to db
$to   = "+2347056582918,+2347069371509";

// Create a new instance of our awesome gateway class
$gateway = new AfricasTalkingGateway($username, $apikey);

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
