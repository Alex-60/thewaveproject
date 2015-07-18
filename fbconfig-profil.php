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
    $helper = new FacebookRedirectLoginHelper('https://thewave.herokuapp.com/profil.php');
try 
{
  $session = $helper->getSessionFromRedirect();
    
  $loginUrl = $helper->getLoginUrl();


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
/*
  $request = new FacebookRequest( $session, 'GET', '/me' );
  $response = $request->execute();
  $graphObject = $response->getGraphObject();
    
 
    
        $fbid = $graphObject->getProperty('id');
    // To Get Facebook ID
 	    $fbfullname = $graphObject->getProperty('name'); // To Get Facebook full name
	    $femail = $graphObject->getProperty('email');    // To Get Facebook email ID

	    $_SESSION['FBID'] = $fbid;  
        $_SESSION['FULLNAME'] = $fbfullname;
	    $_SESSION['EMAIL'] =  $femail;
        $_SESSION['fatigué'] =  $zak;*/
    
    
    
/*$request = new FacebookRequest( $session, 'GET', '/me' );
  $response = $request->execute();
  $graphObject = $response->getGraphObject();*/
    
    
                $request_user = new FacebookRequest( $session,"GET","/me/albums");
				$request_user_executed = $request_user->execute();
				$user = $request_user_executed->getGraphObject()->asArray();
                 
              
                 
                 
                   foreach ($user['data'] as $key => $value) 
                    {
                       if($value->name == "The Wave Project Photos")
                           
                       {
                           //echo $value->id."</br>";
                           
                           $id_album = $value->id;
                           
                           die();
                       }
                   }
    
    
    

    
 
} else 
{
    
    
  //$loginUrl = $helper->getLoginUrl();
 //header("Location: ".$loginUrl);
    
     $loginUrl = $helper->getLoginUrl();

    
    echo '<script type="text/javascript">top.window.location="'.$loginUrl.'";</script>';
  
    
}
?>