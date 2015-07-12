<?php

//require_once 'fbconfig-upload.php';


       // $filename=$_FILES['photo']['name'];

        //$filename = $_FILES['userfile']['name']; 
        //echo "Le nom du fichier contenant la photo est: ";
        //echo $filename;




  //echo "Upload: " . $_FILES["file"]["name"] . "<br>";
  //echo "Type: " . $_FILES["file"]["type"] . "<br>";
  //echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";




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


   echo "1";


// init app with app id and secret
FacebookSession::setDefaultApplication( '767304380051847','7f0e4cac931818f7f7dc86d722dd5e0e' );
// login helper with redirect_uri
    $helper = new FacebookRedirectLoginHelper('https://thewave.herokuapp.com/participer.php');
try 
{
  $session = $helper->getSessionFromRedirect();
    
       echo "2";
    
    
} catch( FacebookRequestException $ex )
{
  // When Facebook returns an error
    
       echo "3";
    
    
} catch( Exception $ex ) 
{
  // When validation fails or other local issues
    
       echo "4";
    
}


    
        echo "5";

        $request = new FacebookRequest($session,'GET','/me');
                
        $response = $request->execute();
        $graphObject = $response->getGraphObject();
        $result = $graphObject->asArray();
        var_dump($result);
        die();


    



?>