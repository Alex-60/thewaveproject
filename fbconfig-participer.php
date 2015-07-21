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
    $helper = new FacebookRedirectLoginHelper('/participer.php');
try 
{
  $session = $helper->getSessionFromRedirect();
    
    //$loginUrl = $helper->getLoginUrl();

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
    

    
    // To Get Facebook ID
 	    $fbfullname = $graphObject->getProperty('name'); // To Get Facebook full name
	    $femail = $graphObject->getProperty('email');    // To Get Facebook email ID
	/* ---- Session Variables -----*/
	    $_SESSION['FBID'] = $fbid;  
        $_SESSION['FULLNAME'] = $fbfullname;
	    $_SESSION['EMAIL'] =  $femail;
        $_SESSION['fatigué'] =  $session;
    

        $request = new FacebookRequest($session,'GET','/me');  
        $response = $request->execute();
        $graphObject = $response->getGraphObject();
        $result = $graphObject->asArray();
        $fbid2 = $graphObject->getProperty('first_name');
    

    
  //checkuser($fuid,$ffname,$femail);
  //header("Location: participer.php");
} else 
{

  //$loginUrl = $helper->getLoginUrl(array('scope' => 'publish_actions'));
 //header("Location: ".$loginUrl);
    
     $loginUrl = $helper->getLoginUrl();

    echo '<script type="text/javascript">top.window.location="'.$loginUrl.'";</script>';
    
    
}
?>