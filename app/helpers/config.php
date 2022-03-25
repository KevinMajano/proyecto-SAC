<?php

//start session on web page
session_start();

//config.php

//Include Google Client Library for PHP autoload file
require_once '../../vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('713643780849-u3rfm1q0kkiftpm0cqr8guo9foaa7b88.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('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');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://localhost/Proyecto-SAC/public/login/index.php');

// to get the email and profile 
$google_client->addScope('email');

$google_client->addScope('profile');

?>