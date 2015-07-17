<?php

//require_once 'fbconfig-participer.php';


 
                                session_start();
                                // added in v4.0.0
                      
                                require_once 'autoload.php';

        
                                //require_once 'index.php';

                                use Facebook\FacebookSession;
                                use Facebook\FacebookRedirectLoginHelper;
                                use Facebook\FacebookRequest;
                                use Facebook\FacebookResponse;
                                use Facebook\FacebookSDKException;
                                use Facebook\FacebookRequestException;
                                use Facebook\FacebookAuthorizationException;
                                use Facebook\GraphObject;
                                use Facebook\Entities\AccessToken;
                                use Facebook\HttpClients\FacebookCurlHttpClient;
                                use Facebook\HttpClients\FacebookHttpable;
                                use Facebook\HttpClients\facebook;
                               
?>



<?php

   if (isset($_GET['error']) && $_GET['error'] == 'access_denied')
    {
       
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
    
    <script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.3&appId=350490031815871";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
    
    
</head>
<body>

    
    <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<!--<html>
 <body>
  <form action="upload.php" method="post"enctype="multipart/form-data">
   <label for="file">Filename:</label>
     <input type="file" name="file" id="file"><br>
     <input type="submit" name="submit" value="Submit">
  </form>
 </body>
</html> -->

      <form enctype="multipart/form-data" action="" method="POST">
            <!-- MAX_FILE_SIZE must precede the file input field -->
            <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
            <!-- Name of input element determines name in $_FILES array -->
            Send this file: <input name="userfile" type="file" />`
            
            <input type="submit" name="send" value="Send File" />
        </form>
    
    
    <?php 
        
          if ($_SERVER['REQUEST_METHOD'] === 'POST') 
            {
        
             if (isset($_POST['send'])) 
                    {



                                // init app with app id and secret
                                    FacebookSession::setDefaultApplication( '767304380051847','7f0e4cac931818f7f7dc86d722dd5e0e' );
                                // login helper with redirect_uri
                                    $helper = new FacebookRedirectLoginHelper('https://thewave.herokuapp.com/participer.php');
                                try 
                                {
                                  $session = $helper->getSessionFromRedirect();

                                } catch( FacebookRequestException $ex ) 
                                {
                                  // When Facebook returns an error
                                } catch( Exception $ex ) 
                                {
                                  // When validation fails or other local issues
                                }
 
                                $filename3 = $_FILES['userfile']['tmp_name']; 
                
                                 $link2=$filename3;
                                                      $response = (new FacebookRequest($session, "POST", '/me/photos', array(
                                                        'source' => '@'.realpath($link2),
                                                        'source' => new CURLFile($link2, 'image/jpg'),
                                                      )
                                                    ))->execute()->getGraphObject(); 
                                        
                               // $loginUrl = $helper->getLoginUrl();

                                //header("Location: ".$loginUrl);
                 

				$request_user = new FacebookRequest( $session,"GET","/me/albums");
				$request_user_executed = $request_user->execute();
				$user = $request_user_executed->getGraphObject()->asArray();
                 
              
                 
                 
                   foreach ($user['data'] as $key => $value) 
                    {
                       if($value->name == "The Wave Project Photos")
                           
                       {
                           //echo $value->id."</br>";
                           
                           $id_album = $value->id;
                           
                        
                           
                           /*$request_user = new FacebookRequest( $session,"GET","/$id_album/photos?fields=picture,updated_time");
                            $request_user_executed = $request_user->execute();
                            $user = $request_user_executed->getGraphObject()->asArray();
                            
                           
                           
                           var_dump($user['data'][0]);*/
                           
                      $request = new FacebookRequest($session,'GET',"/$id_album/photos?fields=picture,updated_time");
                
                        $response = $request->execute();
                        $result = $response->getGraphObject()->asArray();
                       
                        $photo_base = $result['data'][0]->picture;
                           
$dbconn3 = pg_connect("host=ec2-54-83-25-238.compute-1.amazonaws.com port=5432 dbname=dfhf24ft89btrp user=iclwqstdcanbnn password=VdN3cktdfKZZzPnasW4IxrghX6");
                            
                                         
                    $result3 = pg_query($dbconn3, "INSERT INTO photo VALUES ('$photo_base')");

                       }
   
                   }
                    $helper2 = new FacebookRedirectLoginHelper('https://thewave.herokuapp.com/profil.php');
                    $session = $helper->getSessionFromRedirect();
                    $loginUrl = $helper->getLoginUrl();
                    
                    echo '<script type="text/javascript">top.window.location="'.$loginUrl.'";</script>';
                 
                 
                
                    }
    }
   

    ?>
    
    <!------------------------------------------------------------------------------------------------------------------------------------------------------------------------>

    
  <div class="container">

    
  
<!--<div class="span4">
 <ul class="nav nav-list">
<li class="nav-header">Image</li>
<li><img src="https://graph.facebook.com/<?php echo $_SESSION['FBID']; ?>/picture"></li>
<li class="nav-header">Facebook ID</li>
<li><?php echo  $_SESSION['FBID']; ?></li>
<li class="nav-header">Facebook fullname</li>
<li><?php echo $_SESSION['FULLNAME']; ?></li>
<div><a href="logout.php">Logout</a></div>  
<li class="nav-header">situation</li>
<li><?php echo  $_SESSION['fatigué']; ?></li>
</ul>
</div>-->
    
    </div>
    
    
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

       
             <section class="content">
            
                     <?php
        
                   $dbconn3 = pg_connect("host=ec2-54-83-25-238.compute-1.amazonaws.com port=5432 dbname=dfhf24ft89btrp user=iclwqstdcanbnn password=VdN3cktdfKZZzPnasW4IxrghX6");
                        $result2 = pg_query($dbconn3, "SELECT * FROM photo");
                    
                        while ($row2 = pg_fetch_row($result2)) 
                            {
                ?>
         
            <article class="participants">
                
       
                
                <div class="img-participants">
                <?php
                
                echo "<img src='$row2[0]'/>";      
      
                ?>
                </div>

          
             
                
                <div class="fb-like" data-href="<?php echo $row2[0] ;?>" data-layout="box_count" data-action="like" data-show-faces="false" data-share="true"></div>

            </article>
                <?
    }
?>
        </section>
            
            
            
            
        </section>
    </div>
</body>
</html>



<?
    
            }



?>