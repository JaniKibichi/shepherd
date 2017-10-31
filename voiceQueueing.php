<?php
//receive parameters
$sessionId = $_POST['sessionId'];
$isActive  = $_POST['isActive'];

if($isActive == 1){
    
// Talk to sales... Compose the response
$response  = '<?xml version="1.0" encoding="UTF-8"?>';
$response .= '<Response>';
$response .= '<Enqueue holdMusic="http://173.212.225.164:8010/voice/media/sautisol.mp3"/>';
$response .= '</Response>';

// Print the response onto the page so that our gateway can read it
header('Content-type: text/plain');
echo $response;
break;

}

?>