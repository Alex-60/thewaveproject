<?php


    
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
    
        session_start();
	
    require_once 'facebook-php-sdk-v4-4.0-dev/autoload.php';

  

    use Facebook\FacebookSession;
	use Facebook\FacebookRedirectLoginHelper;
	use Facebook\FacebookRequest;
	use Facebook\GraphUser;
<<<<<<< HEAD


    
  
    const APPID = "767304380051847";
    const APPSECRET ="7f0e4cac931818f7f7dc86d722dd5e0e";
=======
>>>>>>> f1595aa55f810a6df16c8d72b8f8828c9b90520b

    use Facebook\FacebookPermissions;
    use Facebook\FacebookPermissionException;
    use Facebook\FacebookRequestException;

    const APPID ="767304380051847";
    const APPSECRET ="7f0e4cac931818f7f7dc86d722dd5e0e";

    //$fbPermissions = 'publish_stream,user_photos';  //Required facebook permissions


    FacebookSession::setDefaultApplication(APPID, APPSECRET);

    $helper = new FacebookRedirectLoginHelper('https://thewave.herokuapp.com/');
	
	//SI les variables de sessions existent et que $_SESSION['fb_token'] existe
	// alors je veux créer mon utilisateur à partir de cette session
	if( isset($_SESSION) && isset($_SESSION['fb_token']) )
	{
		$session = new FacebookSession($_SESSION['fb_token']);
	}
	//Sinon j'affiche le lien de connection
	else
	{
		$session = $helper->getSessionFromRedirect();
	}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="./bootstrap/css/wave.css">
    <title>Application Facebook - The Wave</title>
</head>
    
<body>
    
    
    <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.3&appId=767304380051847";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
    
    
    
  <div id="presentation">
   <script>
		  window.fbAsyncInit =  function() {
		    FB.init({
		      appId      : '<?php echo APPID; ?>',
		      xfbml      : true,
		      version    : 'v2.3'
		    });
		  };
		  (function(d, s, id){
		     var js, fjs = d.getElementsByTagName(s)[0];
		     if (d.getElementById(id)) {return;}
		     js = d.createElement(s); js.id = id;
		     js.src = "//connect.facebook.net/fr_FR/sdk.js";
		     fjs.parentNode.insertBefore(js, fjs);
		   }(document, 'script', 'facebook-jssdk'));
<<<<<<< HEAD
		</script>
   
<h1>Mon Application Facebook</h1>
  
  
=======
      </script>
>>>>>>> d2e78ef911a55387619596fee4405ec84771cef3
   

    <br>
<<<<<<< HEAD
    
    <hr></hr>
=======
      
 
      
      
      
>>>>>>> f1595aa55f810a6df16c8d72b8f8828c9b90520b
       <?php
<<<<<<< HEAD
			//$loginUrl = $helper->getLoginUrl(['publish_stream','user_photos']);
			//echo "<a href='".$loginUrl."'>Se connecter</a>";
	   
=======

>>>>>>> d2e78ef911a55387619596fee4405ec84771cef3
			if($session)
			{
				$_SESSION['fb_token'] = (string) $session->getAccessToken();
				$request_user = new FacebookRequest( $session,"GET","/me");
				$request_user_executed = $request_user->execute();
				$user = $request_user_executed->getGraphObject(GraphUser::className());
                        
                
                try {

				} catch(FacebookRequestException $e) 
                {

				echo "Exception occured, code: " . $e->getCode();
				echo " with message: " . $e->getMessage();

				}  
 
                $name = $user->getName();
                //$id=$user->getId();
                
               
            
                //$image='https://graph.facebook.com/'.$id.'/picture?width=150';
                
                $image='https://graph.facebook.com/1399732547014087/picture?width=150';
                
                 echo "</br>";
                
                echo "</br>";
                echo "</br>";
                echo "</br>";
                echo "</br>";
                echo "</br>";
            
   
                echo "<div id='logo'><img src='$image'/></div>";

             
                ?>
      
                <div id="div1" class="col-md-4">
      
      
                </div>
      
                <div id="div2" class="col-md-8">
                    
                    
   
      
                </div>
        
      
                <div id="amis" class="col-md-6">
                <?

                $request = new FacebookRequest($session,'GET','/me/friends');
                $response = $request->execute();
                $graphObject = $response->getGraphObject(GraphUser::className());

                $result = $graphObject->asArray();
                
<<<<<<< HEAD
                try {

				// Upload to a user's profile. The photo will be in the
				// first album in the profile. You can also upload to
				// a specific album by using /ALBUM_ID as the path     
				$response = (new FacebookRequest(
				  $session, 'POST', '/me/photos', array(
					'source' => './images/Kite_Surf.jpg',
					'message' => 'User provided message'
				  )
				))->execute()->getGraphObject();

				// If you're not using PHP 5.5 or later, change the file reference to:
				// 'source' => '@/path/to/file.name'

				echo "Posted with id: " . $response->getProperty('id');

				} catch(FacebookRequestException $e) {

				echo "Exception occured, code: " . $e->getCode();
				echo " with message: " . $e->getMessage();

				} 
=======
<<<<<<< HEAD
                $response = (new FacebookRequest(
                  $session, 'POST', '/me/photos', array(
                    'url' => "./images/kitesurf_Optim.jpg",
                      //'source' => ('./images/kitesurf_Optim.jpg', 'image/png'),s
                      //'source' => file_get_contents('./images/kitesurf_Optim.jpg'),
                    'message' => 'User provided message',
                  )
                ))->execute()->getGraphObject();
=======
             
                    
                     foreach ($result['data'] as $key => $value) 
                            {

                            ?>
                                <div id="test">
                                    
                                    <?
                         
                                echo "<p>$value->name</p>";
                         
                               // echo "<p>$value->id</p>";

                               $image='https://graph.facebook.com/'.$value->id.'/picture?width=40';

                               echo "<p><img src='$image' /></p>";
                    
                                    ?>
                                    
                                </div>
                    
                    
                    
                    
                    
                               
                                <?
                           

                            }
                        
                        
                 
               
                
               /*foreach ($result['data'] as $key => $value) 
                {
                   
                    echo "<p>$value->name</p>";
                   
                   $image='https://graph.facebook.com/'.$value->id.'/picture?width=70';

                   echo "<p><img src='$image' /></p>";
                   
                    foreach ($value as $key => $valeur) 
                    {
                        
                    }
                    
                }*/
       
                    ?>
      
      
               
                    
                </div>
      
      
      
      
      
                <div id="amis2" class="col-md-6">
      
                  
<div class="fb-page" data-href="https://www.facebook.com/pages/The-Wave/1385753921748799" data-width="500" data-hide-cover="false" data-show-facepile="true" data-show-posts="false">
    
    <div class="fb-xfbml-parse-ignore">
         
         <blockquote cite="https://www.facebook.com/pages/The-Wave/1385753921748799">
         
         <a href="https://www.facebook.com/pages/The-Wave/1385753921748799">The Wave</a>
         
         </blockquote>
    </div>
               
</div>

                </div>
        
>>>>>>> f1595aa55f810a6df16c8d72b8f8828c9b90520b
                
      
                <?
>>>>>>> d2e78ef911a55387619596fee4405ec84771cef3
                

			}
            else
            {
<<<<<<< HEAD
				$loginUrl = $helper->getLoginUrl(['publish_actions','user_photos']);
=======
<<<<<<< HEAD
				$loginUrl = $helper->getLoginUrl(['user_photos','publish_actions','user_posts','publish_stream']);
=======
				$loginUrl = $helper->getLoginUrl(['publish_actions','user_likes','user_photos','user_posts','read_stream','user_friends','manage_pages','user_likes']);
>>>>>>> f1595aa55f810a6df16c8d72b8f8828c9b90520b
>>>>>>> d2e78ef911a55387619596fee4405ec84771cef3
				echo "<a href='".$loginUrl."'>Se connecter</a>";
                
                
			}
		?>
        
        
    </div>
</body>
</html>

