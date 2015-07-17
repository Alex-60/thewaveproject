<?php

session_start();
// added in v4.0.0

require_once 'autoload.php';


//require_once 'index.php';
  
use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\Entities\AccessToken;
use Facebook\HttpClients\FacebookCurlHttpClient;
use Facebook\HttpClients\FacebookHttpable;

// init app with app id and secret
FacebookSession::setDefaultApplication( '767304380051847','7f0e4cac931818f7f7dc86d722dd5e0e' );
// login helper with redirect_uri
    $helper = new FacebookRedirectLoginHelper('https://thewave.herokuapp.com/voter.php');
try 
{
  $session = $helper->getSessionFromRedirect();
    
    $loginUrl = $helper->getLoginUrl();
    
    
     header('Location: https://www.facebook.com/v2.2/dialog/oauth?client_id=767304380051847&redirect_uri=https%3A%2F%2Fthewave.herokuapp.com%2Fvoter.php&state=10d0a3ca72d80fd286b6370ee066867a&sdk=php-sdk-4.0.15&scope=');
    
    echo $loginUrl;
    

    die();


} catch( FacebookRequestException $ex ) 
{
  // When Facebook returns an error
} catch( Exception $ex ) 
{
  // When validation fails or other local issues
}
// see if we have a session
if ( isset( $session ) ) 
{
  // graph api request for user data
  $request = new FacebookRequest( $session, 'GET', '/me' );
  $response = $request->execute();
  // get response
  $graphObject = $response->getGraphObject();
  $fbid = $graphObject->getProperty('id');
    
    $zak="nuit blanche";
    
    // To Get Facebook ID
 	    $fbfullname = $graphObject->getProperty('name'); // To Get Facebook full name
	    $femail = $graphObject->getProperty('email');    // To Get Facebook email ID
	/* ---- Session Variables -----*/
	    $_SESSION['FBID'] = $fbid;  
        $_SESSION['FULLNAME'] = $fbfullname;
	    $_SESSION['EMAIL'] =  $femail;
        $_SESSION['fatigué'] =  $zak;
    

    
  //checkuser($fuid,$ffname,$femail);
  //header("Location: voter.php");
} else 
{
    
    
  $loginUrl = $helper->getLoginUrl();
 header("Location: ".$loginUrl);
}
?>