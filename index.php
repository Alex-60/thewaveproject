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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Projet ESGI RS</title>
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
   
<h1>Mon Application Facebook</h1>
    
    <h1>zak</h1>
   
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
<<<<<<< HEAD
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
				
       
                echo "yes";
                
    // Upload to a user's profile. The photo will be in the
    // first album in the profile. You can also upload to
    // a specific album by using /ALBUM_ID as the path     
    $response = (new FacebookRequest(
      $session, 'POST', '/me/photos', array(
        'url' => new CURLFile('./images/kitesurf_Optim.jpg', 'image/jpg'),
        'message' => 'User provided message'
      )
    ))->execute()->getGraphObject();

    //// If you're not using PHP 5.5 or later, change the file reference to:
    // 'source' => '@/path/to/file.name'

    echo "Posted with id: " . $response->getProperty('id');



=======
				$_SESSION['fb_token'] = (string) $session->getAccessToken();
				$request_user = new FacebookRequest( $session,"GET","/me");
				$request_user_executed = $request_user->execute();
				$user = $request_user_executed->getGraphObject(GraphUser::className());
                
                var_dump($user);
>>>>>>> origin/master
                
				echo "Bonjour ".$user->getName();
                
<<<<<<< HEAD
                
                
				
=======
                echo "----------------";
                
                
                
                $response = (new FacebookRequest(
                  $session, 'POST', '/me/photos', array(
                    //'url' => "./images/kitesurf_Optim.jpg",
                      //'source' => ('./images/kitesurf_Optim.jpg', 'image/png'),
                      'source' => file_get_contents('./images/kitesurf_Optim.jpg'),
                    'message' => 'User provided message',
                  )
                ))->execute()->getGraphObject();
                
                echo $response;
                
>>>>>>> origin/master
			}
            else
            {
				$loginUrl = $helper->getLoginUrl(['user_photos','publish_actions']);
				echo "<a href='".$loginUrl."'>Se connecter</a>";
			}
		?>
        
    
</body>
</html>