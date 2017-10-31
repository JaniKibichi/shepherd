<?php
//receive parameters
$sessionId = $_POST['sessionId'];
$isActive  = $_POST['isActive'];

if($isActive == 1){
    
//Play a file... Compose the response
$response  = '<?xml version="1.0" encoding="UTF-8"?>';
$response .= '<Response>';
$response .= '<Say>Please listen to our awesome record</Say>';
$response .= '<Play url="http://173.212.225.164:8010/voice/media/sautisol.mp3"/>';
$response .= '</Response>';

// Print the response onto the page so that our gateway can read it
header('Content-type: text/plain');
echo $response;
break;

}

?>