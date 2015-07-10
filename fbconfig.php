<?php
session_start();
// added in v4.0.0
//require_once 'autoload.php';
require_once 'facebook-php-sdk-v4-4.0-dev/autoload.php';
    use Facebook\FacebookSession;
	use Facebook\FacebookRedirectLoginHelper;
	use Facebook\FacebookRequest;
	use Facebook\GraphUser;
    use Facebook\FacebookPermissions;
    use Facebook\FacebookPermissionException;
    use Facebook\FacebookRequestException;



// init app with app id and secret
FacebookSession::setDefaultApplication( '767304380051847','7f0e4cac931818f7f7dc86d722dd5e0e' );
// login helper with redirect_uri
    $helper = new FacebookRedirectLoginHelper('https://thewave.herokuapp.com');
echo "yes";
try 
{
  $session = $helper->getSessionFromRedirect();
} catch( FacebookRequestException $ex ) 
{
    echo "1";
  // When Facebook returns an error
} catch( Exception $ex ) 
{
  // When validation fails or other local issues
    echo "2";
}
// see if we have a session
if ( isset( $session ) ) 
{
    
    echo "yes index";
  // graph api request for user data
  $request = new FacebookRequest( $session, 'GET', '/me' );
  $response = $request->execute();
  // get response
  $graphObject = $response->getGraphObject();
    
        
        
        $fbid = $graphObject->getProperty('id');              // To Get Facebook ID
 	    $fbfullname = $graphObject->getProperty('name'); // To Get Facebook full name
	    $femail = $graphObject->getProperty('email');    // To Get Facebook email ID
	/* ---- Session Variables -----*/
	    $_SESSION['FBID'] = $fbid;           
        $_SESSION['FULLNAME'] = $fbfullname;
	    $_SESSION['EMAIL'] =  $femail;
    /* ---- header location after session ----*/
  header("Location: index.php");
} else 
{
 $loginUrl = $helper->getLoginUrl();
 header("Location: ".$loginUrl);
}
?>