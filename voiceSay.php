<?php
//receive parameters
$sessionId = $_POST['sessionId'];
$isActive  = $_POST['isActive'];

if($isActive == 1){
    
// Talk to sales... Compose the response
$response  = '<?xml version="1.0" encoding="UTF-8"?>';
$response .= '<Response>';
$response .= '<Say>Please hold while we connect you to Sales.</Say>';
$response .= '<Dial sequential="true" phoneNumbers="880.welovenerds@ke.sip.africastalking.com,+2347056582918,+2347069371509" ringbackTone="http://173.212.225.164:8010/voice/media/sautisol.mp3"/>';
$response .= '</Response>';

// Print the response onto the page so that our gateway can read it
header('Content-type: text/plain');
echo $response;
break;

}

?>