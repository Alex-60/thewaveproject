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

<!---->


<!-- //////////////////         CODE ZAK          //////////////////-->
<section>
    <div id="fb-root"></div>
    
    <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.3&appId=767304380051847";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
    
    
    
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
                    
                    
                         /*foreach ($result['data'] as $key => $value) 
                            {

                                        $query = pg_query($dbconn3, "SELECT image FROM photo where image = '$login'");
                                        if(pg_num_rows($query) == 1)
                                        {
                                           // Pseudo déjà utilisé
                                           echo 'Ce pseudo est déjà utilisé';
                                        }else
                                        {

                                            $query = pg_query($dbconn3, " INSERT INTO photo (image) VALUES ('$login')");

                                        }
                             
                             

                                
                            }*/
                    
                    
                     //$image='https://graph.facebook.com/1399732547014087/picture?width=150'; 
                    
                    
                       //$picvalue = $value->picture;
                        
                        //$dbconn3 = pg_connect("host=ec2-54-83-25-238.compute-1.amazonaws.com port=5432 dbname=dfhf24ft89btrp user=iclwqstdcanbnn password=VdN3cktdfKZZzPnasW4IxrghX6");
                            
                        //$result3 = pg_query($dbconn3, "INSERT INTO photo VALUES ('result3')");
                    
                    
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
                                    <div id ="border_posts" class="col-md-6" style="text-aligne:center;">
                                        <?php
                                            echo "<div id='img_posts'><img src='$value->picture' /></div></br></br></br></br></br>";
                            
                                            //$dbconn3 = pg_connect("host=ec2-54-83-25-238.compute-1.amazonaws.com port=5432 dbname=dfhf24ft89btrp user=iclwqstdcanbnn password=VdN3cktdfKZZzPnasW4IxrghX6");
                            
                                            //$picvalue=$value->picture;
                            
                                            //$result3 = pg_query($dbconn3, "INSERT INTO photo VALUES ('$picvalue')");
                                        
                                            //echo "yes";
                                            echo "<p>$value->picture</p>";
                                            
                                            $dbconn3 = pg_connect("host=ec2-54-83-25-238.compute-1.amazonaws.com port=5432 dbname=dfhf24ft89btrp user=iclwqstdcanbnn password=VdN3cktdfKZZzPnasW4IxrghX6");
                            
                                            //$picvalue=$value->picture;

                                            //if $picvalue existe dans la base de données on l'ajoute pas 
                            
                                            $result3 = pg_query($dbconn3, "INSERT INTO photo VALUES ('$picvalue')");
                            
                                            echo "<p>yes</p>";
                            
                                            ?>
                                        
                                                <div class="fb-like" data-href="https://scontent.xx.fbcdn.net/hphotos-xfp1/v/t1.0-9/s130x130/11012110_1458080871179254_8388735200119380577_n.jpg?oh=d3cfc6640164cc059d501f72abdb64fa&amp;oe=561632DF" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
                                        
                                        
                                            <?php
                            
                            
                                            

                                        ?>
                                    </div>
                                   
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
         <?php
                try
                {
                    $dbconn3 = pg_connect("host=ec2-54-83-25-238.compute-1.amazonaws.com port=5432 dbname=dfhf24ft89btrp user=iclwqstdcanbnn password=VdN3cktdfKZZzPnasW4IxrghX6");
                    $result = pg_query($dbconn3, "SELECT * FROM villes");
                
                    while ($row = pg_fetch_row($result)) 
                    {
                      echo "ville: $row[0]";
                     
                    }
                    
                }
                catch (Exception $e)
                {
                var_dump($e->getMessage());
                }
        ?>
    </article>

    <p></p>
    <p>Classement actuel</p>
    <article class="classement">
       
        <?php
        
         $result2 = pg_query($dbconn3, "SELECT * FROM photo");
                
                    while ($row2 = pg_fetch_row($result2)) 
                    {
                   
                         echo "<img src='$row2[0]'/>";
                    }
        ?>
    </article>

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

