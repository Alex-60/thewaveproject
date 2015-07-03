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

<!-- //////////////////         CODE INTEGRATION FINALE          //////////////////-->




<!-- //////////////////         CODE ZAK          //////////////////-->
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
           //post picture
                    
                  /*  $response = (new FacebookRequest(
				  $session, "POST", '/me/photos', array(
					'source' => file_get_contents('./images/Kite_Surf.jpg'),
                    'source' => '@'.realpath('./images/Kite_Surf.jpg'),
                      'source' => new CURLFile('./images/kitesurf_Optim.jpg', 'image/jpg'),
					'message' => 'User provided message'
				  )
				))->execute()->getGraphObject();
                
*/
 
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

            <!--<div style="border:1px solid black;">
              <?php
                /*$filename = $_FILES['userfile']['name']; 
                echo "Le nom du fichier contenant la photo est: ";
                echo $filename;*/
                ?>
            </div>-->
        <?php
      
            /*if ($_SERVER['REQUEST_METHOD'] === 'POST') 
            {
                //something posted

                if (isset($_POST['send'])) {
                    // btnDelete 
                    $filename = $_FILES['userfile']['name']; 
                echo "Le nom du fichier contenant la photo est: ";
                echo $filename;
                } 
            }*/
                
                
            if ($_SERVER['REQUEST_METHOD'] === 'POST') 
            {
                //something posted

                
                if (isset($_POST['send'])) 
                {
                    
                $filename = $_FILES['userfile']['name']; 
                //echo "Le nom du fichier contenant la photo est: ";
                //echo $filename."</br>";
                    
                $link = "./images/$filename";
                    
                  $session = new FacebookSession($_SESSION['fb_token']);
            
                  $response = (new FacebookRequest(
				  $session, "POST", '/1385753921748799/photos', array(
					//'source' => file_get_contents("./images/Kite_Surf.jpg"),
                      
                    //'source' => '@'.realpath("./images/$filename"),
                    //'source' => new CURLFile("./images/$filename", 'image/jpg'),
                      
                    
                    'source' => '@'.realpath($link),
                    'source' => new CURLFile($link, 'image/jpg'),
                      
                      
				//'message' => 'User provided message'
				  )
				))->execute()->getGraphObject(); 
            }
            
            }
                 ?>
        
                 <?php
                
                 /* function runMyFunction() 
                  {
                    $session = new FacebookSession($_SESSION['fb_token']);
                    $name =   $_POST['name'];
                   $response = (new FacebookRequest(
				  $session, "POST", '/me/photos', array(
					'source' => file_get_contents("./images/Kite_Surf.jpg"),
                    //'source' => '@'.realpath('./images/Kite_Surf.jpg'),
                      //'source' => new CURLFile('./images/kitesurf_Optim.jpg', 'image/jpg'),
					'message' => 'User provided message'
				  )
				))->execute()->getGraphObject();
                      }
                      if (isset($_GET['hello'])) {
                        runMyFunction();
                      }
                      */
                ?>

                <a href='index.php?hello=true'>zak function run</a>
        
        
                <p>
                 <?php
            

                // $db = pg_connect("pgsql:host=ec2-54-83-25-238.compute-1.amazonaws.com port=5432 dbname=dfhf24ft89btrp user=iclwqstdcanbnn password=VdN3cktdfKZZzPnasW4IxrghX6") or die("connection faild");
       
                try
                {
                    $dbconn3 = pg_connect("host=ec2-54-83-25-238.compute-1.amazonaws.com port=5432 dbname=dfhf24ft89btrp user=iclwqstdcanbnn password=VdN3cktdfKZZzPnasW4IxrghX6");
                    echo "-----------------";
                    
                    
                $result = pg_query($dbconn3, "SELECT * FROM villes");
                
                    while ($row = pg_fetch_row($result)) 
                    {
                      echo "ville: $row[0]";
                      echo "<br />\n";
                    }

                }
                catch (Exception $e)
                {
                var_dump($e->getMessage());
                }

                     ?>
               
                 </p>

             </div>
    
<!------------------------------------------------------------------upload-------------------------------------------------------------------> 
                </div>
      
                <div id="div2" class="col-md-8">
                 
                    <?php
                $request = new FacebookRequest($session,'GET','/1385753921748799/posts?fields=picture,full_picture');
                $response = $request->execute();
                $graphObject = $response->getGraphObject(GraphUser::className());

                $result = $graphObject->asArray();
                
                
                foreach ($result['data'] as $key => $value) 
                    {

                    ?>

                       <div id ="border_posts" class="col-md-6" style="text-aligne:center;">
                            <?php
                                echo "<div id='img_posts'><img src='$value->full_picture' /></div>";
                    
                            ?>
                        </div>
                    
                    <?php
 
                    }
                       
                    ?>
      
                </div>
      <!------------------------------------ pour recuperer les amis -------------------->
      
              <!--  <div id="amis" class="col-md-6">
                <?php

                /*$request = new FacebookRequest($session,'GET','/me/friends');
                $response = $request->execute();
                $graphObject = $response->getGraphObject(GraphUser::className());

                $result = $graphObject->asArray();
                    
                     foreach ($result['data'] as $key => $value) 
                            {

                            ?>
                                <div id="test">
                                    
                                    <?php

                               $image='https://graph.facebook.com/'.$value->id.'/picture';

                               echo "<p><img src='$image' /></p>";
                    
                                    ?>
                                    
                                </div>
 
                                <?php
                            }
       */
                    ?>
                    
                </div>-->

                <?php
                
			}
            else
            {
				$loginUrl = $helper->getLoginUrl(['publish_actions','user_likes','user_photos','user_posts','read_stream','user_friends','manage_pages']);
				//echo "<a href='".$loginUrl."'>Se connecter</a>";
                
               ?> 
<section>

    <article class="presentation">
        <p class="txt1">Grand Jeu Concours</p>
        <p class="txt1_1">Du 1er juin au 31 juillet 2015</p>
        <p class="txt2">Participer et tentez de gagner votre équipement de kyte surf avec</p>
        <img class="logohome" src="img/logo.png" />
    </article>

    <article class="slogan">
        <p>JETEZ-VOUS À L'EAU</p>
        <button class="voter">VOTER</button>
        
       
                
        <form action="<?php echo $loginUrl; ?>">
            
           <? require 'facebook-php-sdk/src/facebook.php';

$facebook = new Facebook(array(
  'appId'  => '767304380051847',
  'secret' => '7f0e4cac931818f7f7dc86d722dd5e0e',
)); ?>
        <button type="submit" class="participer"> Participer</button>
        </form>
            
    </article>

    <p>Classement actuel</p>
    <article class="classement">
        <img src="" alt="">
        <img src="" alt="">
        <img src="" alt="">
        <img src="" alt="">
        <img src="" alt="">
    </article>

    <footer>
        <p>Conditions générales : The Wave - jeu concours est une marque déposée par des étudiants de l'École Supérieur de Génie Informatique (ESGI), dans le cadre d'un projet scolaire</p>
    </footer>
</section>    
              <?  
                
			}
		?>
        
      <!--this fnctiun udrs dirzs zqqazq aaharua ub ibezkkdzhshdzsj dz^ dashjdsg dsìts shi us as ------howaw to upmoad an nice pictires fris internet --> 
    </div>
</section>
</body>
</html>

