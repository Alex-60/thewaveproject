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
    <title>Grand jeu concours THE WAVE</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    
</head>
<body>


<section>
    <div id="fb-root"></div>
    
    <script>(function(d, s, id)
        {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.3&appId=767304380051847";
                fjs.parentNode.insertBefore(js, fjs);
        }
             (document, 'script', 'facebook-jssdk'));
    </script>
    
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
         
?>

    <footer>
            <p>Conditions générales : The Wave - jeu concours est une marque déposée par des étudiants de l'École Supérieur de Génie Informatique (ESGI), dans le cadre d'un projet scolaire</p>
    </footer>
</section>    
              <?  
                
			}else
                
            {
                echo "no";
            }
		?>
    </div>
</section>
</body>
</html>

