<?php
    require_once("index.php");



   use Facebook\FacebookSession;

FacebookSession::setDefaultApplication('app-id', 'app-secret');

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