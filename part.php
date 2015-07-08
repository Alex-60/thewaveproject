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
    <link href="./bootstrap/css/jquery.filer.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
	<!--jQuery-->
	<script type="text/javascript" src="https://code.jquery.com/jquery-latest.min.js"></script>
	<script type="text/javascript" src="./bootstrap/js/jquery.filer.min.js"></script>

   


    <script type="text/javascript" src="js/script.js"></script>

    <title>Application Facebook - The Wave</title>
</head>
<body>


<section>
    <div id="fb-root"></div>
    
    <div id="fb-root"></div>

    

    
  <div id="presentation">

    <br>
       <?php

			if($session)
			{
                $name = $user->getName();
                $id=$user->getId();
                
                //$image='https://graph.facebook.com/'.$id.'/picture?width=150';
                
                $image='https://graph.facebook.com/1399732547014087/picture?width=150';
               
                echo "<div id='logo'><img src='$image'/></div>";
                
       
                
        ?>
<div id="div1" class="col-md-4">
    <div class="fb-page" data-href="https://www.facebook.com/pages/The-Wave/1385753921748799?ref=profile" data-width="500" data-hide-cover="true" data-show-facepile="true" data-show-posts="false">
        <div class="fb-xfbml-parse-ignore">
            <blockquote cite="https://www.facebook.com/pages/The-Wave/1385753921748799?ref=profile">
                <a href="https://www.facebook.com/pages/The-Wave/1385753921748799?ref=profile">The Wave</a>
            </blockquote>
        </div>
    </div>
    <!---------------------------------------------------------------------------------------------------------upload---------------------------------------------------------------------------------->
    <div class="col-md-12" id="div1-child2">
        
        <form enctype="multipart/form-data" action="" method="POST">
            <!-- MAX_FILE_SIZE must precede the file input field -->
            <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
            <!-- Name of input element determines name in $_FILES array -->
            Send this file: <input name="userfile" type="file" />`
            
            <input type="submit" name="send" value="Send File" />
        </form>

       
        <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') 
            {
                //something posted

                
                if (isset($_POST['send'])) 
                {
                        $filename = $_FILES['userfile']['name']; 
                    
                    
                        $link = "./images/$filename";
                          $session = new FacebookSession($_SESSION['fb_token']);
                          $response = (new FacebookRequest(
                         // $session, "POST", '/me/photos', array(
                            $session, "POST", '/1457732501214091/photos', array(
                            'source' => '@'.realpath($link),
                            'source' => new CURLFile($link, 'image/jpg'),
                          )
                        ))->execute()->getGraphObject(); 
                    
                 
                         $request = new FacebookRequest($session,'GET','/1457732501214091/photos?fields=picture');
                
                        $response = $request->execute();
                        $graphObject = $response->getGraphObject(GraphUser::className());
                        $result = $graphObject->asArray();
                    
                    
                       
                }
            
            }
                 ?>
        </div>
<!-------------------------------------------------------------------------------------affiche picture-----------------------------------------------------------------------------------> 
                </div>
      
                <div id="div2" class="col-md-8">
                    
                    
                        <?php
                
                        //$request = new FacebookRequest($session,'GET','/1385753921748799/posts?fields=picture,full_picture');
                
                        $request = new FacebookRequest($session,'GET','/1457732501214091/photos?fields=picture');
                
                        $response = $request->execute();
                        $graphObject = $response->getGraphObject(GraphUser::className());
                        $result = $graphObject->asArray();
                
             
                
                        foreach ($result['data'] as $key => $value) 
                            {
                                ?>
                                    
                                   
                                <?php
                            }
                        ?>
                </div>
                <?php
                    }
 
                    else
                    {
                        $loginUrl = $helper->getLoginUrl(['publish_actions','user_likes','user_photos','user_posts','read_stream','user_friends','manage_pages']);
                    ?> 
      <!------------------------------------------------------------------- if the user isn't connected--------------------------------------------------->
<section>

    <article class="presentation">
        <p class="txt1">Grand Jeu Concours</p>
        <p class="txt1_1">Du 1er juin au 31 juillet 2015</p>
        <p class="txt2">Participer et tentez de gagner votre équipement de kyte surf avec</p>
        <img class="logohome" src="img/logo.png" />
    </article>

    <article class="slogan">
        <p>JETEZ-VOUS À L'EAU</p>
        <for></for>
        <button class="voter">VOTER</button>
        

        
        <?php echo "<a href= '".$loginUrl."' style='color:black'>Participer</a>";?>
        
     
        
       
        
        <hr>
  
    </article>

    <p></p>
    <p>Classement actuel</p>


    <footer>
            <p>Conditions générales : The Wave - jeu concours est une marque déposée par des étudiants de l'École Supérieur de Génie Informatique (ESGI), dans le cadre d'un projet scolaire</p>
    </footer>
</section>    
              <?  
                
			}
		?>
    </div>
</section>
</body>
</html>

