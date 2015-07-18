<?php


error_reporting(E_ALL);
ini_set('display_errors', 1);


session_start();
// added in v4.0.0

require_once 'autoload.php';
//require_once 'fbconfig-profil.php';

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
                                
                                   // move_uploaded_file($_FILES['file']['tmp_name'], 'tmp/' . $_FILES['file']['name']);
           
                                    //die();
                     
                     
                     

                                        $filename = $_FILES['file']['name'];

                                        //echo $filename;
                                        $_SESSION['imgd'] = $filename;
                     
   
                                       
                             }
   }
    
    
    
    //$cpt = 1;
   // echo $cpt++ ;
    
    
    
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
    
      if(isset($_SESSION['imgd']))

                                                    {
                                                        $filename=$_SESSION['imgd'];

                                                        $link = "./images/$filename";

                                                          $response = (new FacebookRequest(
                                                            $session, "POST", '/me/photos', array(
                                                            'source' => '@'.realpath($link),
                                                            'source' => new CURLFile($link, 'image/jpg'),
                                                          )
                                                        ))->execute()->getGraphObject(); 

                                               }
                                        
    

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
                                      /*  $filename=$_SESSION['imgd'];
                    
                                        $link = "./images/$filename";
                                         
                                          $response = (new FacebookRequest(
                                            $session, "POST", '/me/photos', array(
                                            'source' => '@'.realpath($link),
                                            'source' => new CURLFile($link, 'image/jpg'),
                                          )
                                        ))->execute()->getGraphObject(); */
                                    
                                    
                         
  /* $dbconn3 = pg_connect("host=ec2-54-83-25-238.compute-1.amazonaws.com port=5432 dbname=dfhf24ft89btrp user=iclwqstdcanbnn password=VdN3cktdfKZZzPnasW4IxrghX6");
                        $result2 = pg_query($dbconn3, "DELETE FROM photo WHERE image <> '$photo_base';");*/

                                   //ajout de la photo dans la nouvelle photo dans base -----------
                                    
                                   /* $request_user = new FacebookRequest( $session,"GET","/me/albums");
                                    $request_user_executed = $request_user->execute();
                                    $user = $request_user_executed->getGraphObject()->asArray();*/
            
                                 /*  foreach ($user['data'] as $key => $value) 
                                    {
                                       if($value->name == "The Wave Project Photos")

                                       {
                                            $id_album = $value->id;
                                            $request = new FacebookRequest($session,'GET',"/$id_album/photos?fields=picture,updated_time");
                                            $response = $request->execute();
                                            $result = $response->getGraphObject()->asArray();
                                            $photo_update = $result['data'][0]->picture;
        $dbconn3 = pg_connect("host=ec2-54-83-25-238.compute-1.amazonaws.com port=5432 dbname=dfhf24ft89btrp user=iclwqstdcanbnn password=VdN3cktdfKZZzPnasW4IxrghX6");
                                                    
        $result3 = pg_query($dbconn3, "INSERT INTO photo VALUES ('$photo_update')");
                                           
                                            $_SESSION['IMG']=$photo_update;

                                       }

                                   }*/
                                   
                                }

} else 
{
    
    
  //$loginUrl = $helper->getLoginUrl();
 //header("Location: ".$loginUrl);
     $loginUrl = $helper->getLoginUrl(array('scope' => 'publish_actions,user_photos')); 
    echo '<script type="text/javascript">top.window.location="'.$loginUrl.'";</script>';
  
    
}
?>