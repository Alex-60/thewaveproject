<?php

   
use Facebook\FacebookSession;

FacebookSession::setDefaultApplication('767304380051847', '7f0e4cac931818f7f7dc86d722dd5e0e');

// If you already have a valid access token:
$session = new FacebookSession('access-token');

// If you're making app-level requests:
$session = FacebookSession::newAppSession();

// To validate the session:
try {
  $session->validate();
} catch (FacebookRequestException $ex) {
  // Session not valid, Graph API returned an exception with the reason.
  echo $ex->getMessage();
} catch (\Exception $ex) {
  // Graph API returned info, but it may mismatch the current app or have expired.
  echo $ex->getMessage();
}



?>


