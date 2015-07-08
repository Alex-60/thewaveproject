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



<?php

   if (isset($_GET['error']) && $_GET['error'] == 'access_denied')
    {
         
    //$helper = new FacebookRedirectLoginHelper('https://thewave.herokuapp.com/index.php');
    //$loginUrl = $helper->getLoginUrl();
       
       header('Location: https://thewave.herokuapp.com/');    
    }
    else
            {    ?>   
               
             
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Participez au concours</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <script src="js/dnd.js"></script>
</head>
<body>
    <div class="page-jeParticipe">
        <header class="header">
            <h1>GRAND JEU CONCOURS</h1>
            <p>du 1er Juin au 31 Juillet 2015</p>
            <img src="img/logo.png" alt="logo">
            <h2>Envoyer votre plus belle photos</h2>
        </header>
        <section class="content">
           <article class="my-photo">
               <div class="bloc-photo-upload">
                   <div id="cadre" dropzone="copy">
				        <p>DEPOSEZ VOS PHOTOS ICI</p>
                       
                       
                        <h2>+</h2><br>
                   </div>
               </div>
           </article>
            
            <!------------------------------------------------------------------------------------------------>
            
            
        <form enctype="multipart/form-data" action="" method="POST">
            <!-- MAX_FILE_SIZE must precede the file input field -->
            <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
            <!-- Name of input element determines name in $_FILES array -->
            Send this file: <input name="userfile" type="file" />`
            <input type="submit" name="send" value="Send File" />
        </form>
            
            
            
                 
        <?php
           /* if ($_SERVER['REQUEST_METHOD'] === 'POST') 
            {
                //something posted
                
                if (isset($_POST['send'])) 
                {
                        $filename = $_FILES['userfile']['name']; 
                        $link = "./images/$filename";
                          $session = new FacebookSession($_SESSION['fb_token']);
                          $response = (new FacebookRequest(
                            $session, "POST", '/1457732501214091/photos', array(
                            'source' => '@'.realpath($link),
                            'source' => new CURLFile($link, 'image/jpg'),
                          )
                        ))->execute()->getGraphObject();
                }
            
            }*/
        
if($session)
			{
				

        
              $request = new FacebookRequest($session,'GET','/1457732501214091/photos?fields=picture');
                
                        $response = $request->execute();
                        $graphObject = $response->getGraphObject(GraphUser::className());
                        $result = $graphObject->asArray();
                
        }
        
                 ?>
            
            
            
                        <!--------------------------------------------------------------------------------------------->
            
            <article class="participants">
                <div class="img-participants">
                    <img src="" alt="">
                </div>
                <h3>500 J'aime</h3>
                <div class="like"></div>
                <div class="partage"></div>
            </article>
            <article class="participants">
                <div class="img-participants">
                    <img src="" alt="">
                </div>
                <h3>500 J'aime</h3>
                <div class="like"></div>
                <div class="partage"></div>
            </article>
            <article class="participants">
                <div class="img-participants">
                    <img src="" alt="">
                </div>
                <h3>500 J'aime</h3>
                <div class="like"></div>
                <div class="partage"></div>
            </article>
            <article class="participants">
                <div class="img-participants">
                    <img src="" alt="">
                </div>
                <h3>500 J'aime</h3>
                <div class="like"></div>
                <div class="partage"></div>
            </article>
            <article class="participants">
                <div class="img-participants">
                    <img src="" alt="">
                </div>
                <h3>500 J'aime</h3>
                <div class="like"></div>
                <div class="partage"></div>
            </article>
            
            
            <article class="participants">
                <div class="img-participants">
                    <img src="" alt="">
                </div>
                <h3>500 J'aime</h3>
                <div class="like"></div>
                <div class="partage"></div>
            </article>
            <article class="participants">
                <div class="img-participants">
                    <img src="" alt="">
                </div>
                <h3>500 J'aime</h3>
                <div class="like"></div>
                <div class="partage"></div>
            </article>
            <article class="participants">
                <div class="img-participants">
                    <img src="" alt="">
                </div>
                <h3>500 J'aime</h3>
                <div class="like"></div>
                <div class="partage"></div>
            </article>
            <article class="participants">
                <div class="img-participants">
                    <img src="" alt="">
                </div>
                <h3>500 J'aime</h3>
                <div class="like"></div>
                <div class="partage"></div>
            </article>
            <article class="participants">
                <div class="img-participants">
                    <img src="" alt="">
                </div>
                <h3>500 J'aime</h3>
                <div class="like"></div>
                <div class="partage"></div>
            </article>
        </section>
    </div>
</body>
</html>



<?
    
            }



?>