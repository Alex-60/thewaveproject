<?php

   if (isset($_GET['error']) && $_GET['error'] == 'access_denied')
    {
         
    //$helper = new FacebookRedirectLoginHelper('https://thewave.herokuapp.com/index.php');
    //$loginUrl = $helper->getLoginUrl();
       
       header('Location: https://thewave.herokuapp.com/');    
    }
    else
        
    use Facebook\FacebookSession;
	use Facebook\FacebookRedirectLoginHelper;
    require_once 'facebook-php-sdk-v4-4.0-dev/autoload.php';

      session_start();

    $APPID ="767304380051847";
    $APPSECRET ="7f0e4cac931818f7f7dc86d722dd5e0e";
    
    FacebookSession::setDefaultApplication(APPID, APPSECRET);
    $helper = new FacebookRedirectLoginHelper('https://thewave.herokuapp.com/voter.php');
    $session = $helper->getSessionFromRedirect();
 
   {    ?>   
               
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Voter</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    
    <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.3&appId=350490031815871";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
    
    
</head>
<body>

     <a href='<?php echo $loginUrl;?>' class="btnVoter">test</a>
    

    <div class="page-jeVote">
        <header class="header">
            <h1>GRAND JEU CONCOURS</h1>
            <p>du 1er Juin au 31 Juillet 2015</p>
            <img src="img/logo.png" alt="logo">
            <a class="btnParticiper" href="part.php">PARTICIPER</a>
            
       
            
            
            <h2>Voter pour la meilleure photo</h2>
        </header>
        
        
            <?php 
                
/*$dbconn3 = pg_connect("host=ec2-54-83-25-238.compute-1.amazonaws.com port=5432 dbname=dfhf24ft89btrp user=iclwqstdcanbnn password=VdN3cktdfKZZzPnasW4IxrghX6");
                        $result2 = pg_query($dbconn3, "SELECT * FROM photo");
                    
                        while ($row2 = pg_fetch_row($result2)) 
                            {
                                echo "<article class='participants'>";
                                echo "<div class='img-participants'>";
                                echo "<img src='$row2[0]'/>"; 
                               
                                echo "</div>"; 
                                echo "</article>";
                            }*/
            ?>

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
                <h3>500 J'aime</h3>
          
                <!--<div class="like"></div>
                <div class="partage"></div>-->
                
                <div class="fb-like" data-href="<?php echo $row2[0] ;?>" data-layout="box_count" data-action="like" data-show-faces="false" data-share="true"></div>

            </article>
                <?
    }
?>
        </section>
        
    </div>
</body>
</html><?
    
            }



?>