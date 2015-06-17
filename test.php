https://www.facebook.com/nadia.elhachimi.7/about







<?php
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
    
        session_start();
	
    require_once 'facebook-php-sdk-v4-4.0-dev/autoload.php';

    use Facebook\FacebookSession;
	use Facebook\FacebookRedirectLoginHelper;
	use Facebook\FacebookRequest;
	use Facebook\GraphUser;

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
  <div id="presentation">
   <script>
		  window.fbAsyncInit = function() {
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
      </script>
   

    <br>
       <?php

			if($session)
			{
				$_SESSION['fb_token'] = (string) $session->getAccessToken();
				$request_user = new FacebookRequest( $session,"GET","/me");
				$request_user_executed = $request_user->execute();
				$user = $request_user_executed->getGraphObject(GraphUser::className());
                        
                
                try {
                    
                //$loginUrl = $helper->getLoginUrl(['publish_actions','user_photos','user_posts','publish_stream']);

				// Upload to a user's profile. The photo will be in the
				// first album in the profile. You can also upload to
				// a specific album by using /ALBUM_ID as the path
                    
				//$response = (new FacebookRequest(
				  //$session, "POST", '/me/photos', array(
					//'source' => file_get_contents('./images/Kite_Surf.jpg'),
                    //'source' => '@'.realpath('./images/Kite_Surf.jpg'),
                      //'source' => new CURLFile('./images/kitesurf_Optim.jpg', 'image/jpg'),
					//'message' => 'User provided message'
				 // )
				//))->execute()->getGraphObject();
   
				// If you're not using PHP 5.5 or later, change the file reference to:
				// 'source' => '@/path/to/file.name'

				//echo "Posted with id: " . $response->getProperty('id');

				} catch(FacebookRequestException $e) 
                {

				echo "Exception occured, code: " . $e->getCode();
				echo " with message: " . $e->getMessage();

				}  
 
                $name = $user->getName();
                
                
                $id=$user->getId();
                
                $image='https://graph.facebook.com/'.$id.'/picture?width=150';
                
                 echo "</br>";
                
                echo "</br>";
                echo "</br>";
                echo "</br>";
                echo "</br>";
                echo "</br>";
            
   
                echo "<p><img src='$image' /></p>";

                echo "<p>récupération des utilisateurs de l'appli<p>";
    
                    
                $request = new FacebookRequest($session,'GET','/me/friends');
                $response = $request->execute();
                $graphObject = $response->getGraphObject(GraphUser::className());

                $result = $graphObject->asArray();
                
            
               /* $friends = $result['data'][0];
        
                $zak=$result['data'][0];
                    echo $friends->name;
                    echo "----";
                    echo $friends->id;
                    $image='https://graph.facebook.com/'.$friends->id.'/picture?width=300';
                    echo "<p><img src='$image' /></p>";
                    //var_dump ($friends[0]);
                
                
                
                $friends = $result['data'][1];
                    echo $friends->name;
                    echo "----";
                    echo $friends->id;
                    $image='https://graph.facebook.com/'.$friends->id.'/picture?width=300';
                    echo "<p><img src='$image' /></p>";*/

                
                
               foreach ($result['data'] as $key => $value) 
                {
                    
                    echo $value->name;
                    echo "</br>";
                    echo "</br>";
                   //echo $value->id;
                   
                   $image='https://graph.facebook.com/'.$value->id.'/picture?width=70';

                   echo "<p><img src='$image' /></p>";
                   
                    foreach ($value as $key => $valeur) 
                    {
                        
                        //var_dump( $valeur);
                        
                        echo "</br>";
                        echo "</br>";
                        
                        ///echo $valeur;
                        
                        

                    }
                    
                }
    
              
			}
            else
            {
				$loginUrl = $helper->getLoginUrl(['publish_actions','user_photos','user_posts','read_stream','publish_stream','user_friends']);
				echo "<a href='".$loginUrl."'>Se connecter</a>";
                
                
			}
		?>
        
    </div>
</body>
</html>
