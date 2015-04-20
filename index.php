<?php
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
    
        session_start();
	
        require "facebook-php-sdk-v4-4.0-dev/autoload.php";

    use Facebook\FacebookSession;
	use Facebook\FacebookRedirectLoginHelper;
	use Facebook\FacebookRequest;
	use Facebook\GraphUser;
    
  
    const APPID = "767304380051847";
    const APPSECRET ="7f0e4cac931818f7f7dc86d722dd5e0e";

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
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <title>The Wave Project</title>
    
    <link rel="stylesheet" media="screen" type="text/css" title="simple" href="./bootstrap/css/wave.css" />
    
    <link href="stylesheet" media="screen" type="text/css" title="simple" href="./bootstrap/css/wave.css">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link href="stylesheet" media="screen" type="text/css" title="simple" href="bootstrap/css/bootstrap.css">
    
    
    
</head>
<body>
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
		
	<div id="presentation">
		<h1>The Wave Concours</h1>
   
           <div>
                  class="fb-like"
                  data-share="true"
                  data-width="450"
                  data-show-faces="true">
            </div>
    
    

    <br>
       <?php
			if($session)				
			{
				try
					{

						$_SESSION['fb_token'] = (string) $session->getAccessToken();
						$request_user = new FacebookRequest( $session,"GET","/me");
						$request_user_executed = $request_user->execute();
						$user = $request_user_executed->getGraphObject(GraphUser::className());
						echo "Bonjour ".$user->getName();
                        var_dump($user);
                    

					}
				catch (Exception $e)
					{
						$_SESSION = null;
						session_destroy();
						header('Location : index.php');
					}
				
       
                echo "---------------------";
                
    // Upload to a user's profile. The photo will be in the
    // first album in the profile. You can also upload to
    // a specific album by using /ALBUM_ID as the path     
    //$response = (new FacebookRequest(
      //$session, 'POST', '/me/photos', array(
        //'url' => new CURLFile('./images/kitesurf_Optim.jpg', 'image/jpg'),
        //'message' => 'User provided message'
      //)
    //))->execute()->getGraphObject();

    //// If you're not using PHP 5.5 or later, change the file reference to:
    // 'source' => '@/path/to/file.name'

    //echo "Posted with id: " . $response->getProperty('id');



                
                
                
                
                /*  */
                if ($session) {
                    
                  $logoutUrl = $session->getLogoutUrl();
                    
                    
                } else 
                
                {
                    
                        // Upload to a user's profile. The photo will be in the
                        // first album in the profile. You can also upload to
                        // a specific album by using /ALBUM_ID as the path     
                        $response = (new FacebookRequest(
                          $session, 'POST', '/me/photos', array(
                            'source' => new CURLFile('./images/kitesurf_Optim.jpg', 'image/jpg'),
                            'message' => 'User provided message'
                          )
                        ))->execute()->getGraphObject();

                        //// If you're not using PHP 5.5 or later, change the file reference to:
                        // 'source' => '@/path/to/file.name'

                        echo "Posted with id: " . $response->getProperty('id');
                    
                    
                    
                        $params = array(
                        scope => 'read_stream,publish_stream,publish_actions,offline_access',
                        redirect_uri => 'Redirect_URL'
                );
                  $loginUrl = $facebook->getLoginUrl($params);
                }

                
                
                
                
                
				
			}
			else
			{
				$loginUrl = $helper->getLoginUrl();
				echo "<a href='".$loginUrl."'>Se connecter</a>";
			}
		?>
    
    </div>
</body>
</html>

