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
                
             
                    
                     foreach ($result['data'] as $key => $value) 
                            {

                            ?>
                                <div id="test">
                                    
                                    <?
                         
                                echo "<p>$value->name</p>";
                         
                                echo "<p>$value->id</p>";

                               $image='https://graph.facebook.com/'.$value->id.'/picture?width=100';

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
      
      
                    
                     <div id="doug">
                    
                    <?
                
                $request = new FacebookRequest($session,'GET','/me/friends');
                $response = $request->execute();
                $graphObject = $response->getGraphObject(GraphUser::className());

                $result = $graphObject->asArray();
                
             
                    
                     foreach ($result['data'] as $key => $value) 
                            {

                         
                                echo "<p id='al'>$value->id</p>";

                          
                            }
                
                
                            var $zak=$value->id;
                
                            try {
                                $likes = $facebook->api("/me/likes/1385753921748799");
                                if( !empty($likes['data']) )
                                    echo "I like!";
                                else
                                    echo "not a fan!";
                              } catch (FacebookApiException $e) {
                                error_log($e);
                                $user = null;
                              }
                
                    
                         ?>
                    </div>
                    
                </div>
      
      
      
      
      
                <div id="amis2" class="col-md-6">
      
                  
                    
                    
                    
                    
                    
                    

                </div>
        
                
      
                <?
                

			}
            else
            {
				$loginUrl = $helper->getLoginUrl(['publish_actions','user_likes','user_photos','user_posts','read_stream','user_friends','manage_pages','user_likes']);
				echo "<a href='".$loginUrl."'>Se connecter</a>";
                
                
			}
		?>
        
        
    </div>
</body>
</html>

