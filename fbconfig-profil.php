<?php

session_start();
// added in v4.0.0

require_once 'autoload.php';
require_once 'fbconfig-profil.php';

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
    
   

   if ($_SERVER['REQUEST_METHOD'] === 'POST') 
            {
    
                 if (isset($_POST['imgchange'])) 
                            {
                                // echo "yes click in sumbit";
                                     $filename = $_FILES['file']['tmp_name'];

                                        //echo $filename;
                                        $_SESSION['imgd'] = $filename;

                             }

   }
    
    

    
    
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
    

    //echo "nooo";
    
    //echo $_SESSION['imgd'];
    

 

    
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
    
    
                /*$request_user = new FacebookRequest( $session,"GET","/me/albums");
				$request_user_executed = $request_user->execute();
				$user = $request_user_executed->getGraphObject()->asArray();*/
                 
              
                 
    
                            $request = new FacebookRequest( $session, 'GET', '/me/albums' );
                            $response = $request->execute();
                            $graphObject = $response->getGraphObject()->asArray();
    

                               foreach ($graphObject['data'] as $key => $value) 
                                {


                                    if($value->name == "The Wave Project Photos")

                                       {
                                           $id_album = $value->id;

                                             $request = new FacebookRequest($session,'GET',"/$id_album/photos?fields=picture,updated_time");

                                                $response = $request->execute();
                                                $result = $response->getGraphObject()->asArray();

                                                $photo_base = $result['data'][0]->picture;

                                                $_SESSION['IMG'] = $photo_base;


                                       }
                               }
    
    
    
                                if(isset($_SESSION['imgd']))

                                {
                                    
                                    
                                    echo "url ancien photo est".$photo_base;
                                    
                                    echo "</br>-----------------------------------------------</br>";
                                    
                                    echo "la valeur de la nouvelle photo est ".$_SESSION['imgd'];
                                    
                                      echo "</br>-----------------------------------------------</br>";
                                    

                                    //suppresiond e la photo de la base de donnée;
                                    
    $dbconn3 = pg_connect("host=ec2-54-83-25-238.compute-1.amazonaws.com port=5432 dbname=dfhf24ft89btrp user=iclwqstdcanbnn      password=VdN3cktdfKZZzPnasW4IxrghX6");
                        $result2 = pg_query($dbconn3, "DELETE FROM photo WHERE image <> '$photo_base';");

                                echo "la suppression de l'ancienn photo a été éffectué " ;
                                    
                                    
                                       echo "</br>-----------------------------------------------</br>";
                                    
                                    //upload de la nouvelle photo
                                    
                                    
                 
                                                    $link2 = $filename ;
                                    
                                                    echo "linke2=".$link2;
                                    
                                    
                                     echo "</br>-----------------------------------------------</br>";
                                                   $link2=$_SESSION['imgd'];
                                                    
                                                    echo "link2=" .$link2 ;
                                                  

                                                      $request = new FacebookRequest( $session, 'GET', '/me/photos' );
                                                        $response = $request->execute();
                                                        $graphObject = $response->getGraphObject()->asArray();
                                                        
                                                        var_dump($graphObject);
                                    
                                    die();
                                    
                                    
                                                

                                }


                 
} else 
{
    
    
  //$loginUrl = $helper->getLoginUrl();
 //header("Location: ".$loginUrl);
    
     $loginUrl = $helper->getLoginUrl(array('scope' => 'publish_actions,user_photos'));

    
    echo '<script type="text/javascript">top.window.location="'.$loginUrl.'";</script>';
  
    
}
?>