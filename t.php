
//require_once 'fbconfig-profil.php';


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



                                // init app with app id and secret
                                    FacebookSession::setDefaultApplication( '767304380051847','7f0e4cac931818f7f7dc86d722dd5e0e' );
                                // login helper with redirect_uri
                                    $helper = new FacebookRedirectLoginHelper('https://thewave.herokuapp.com/profil.php');
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

                              
        



?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Votre profil</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    
    
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

    

    
            
    <?php

        if ( isset( $session ) ) 
        {
       

            ?>

    
        <div class="page-profil">    
        <article class="header">
            <h1>GRAND JEU CONCOURS</h1>
            <p>Du 1er Juin au 31 Juillet 2015</p>
            <img src="img/logo.png" alt="logo">
            <h2>Envoyer votre plus belle photos</h2>
        </article>
        <section class="content">
            <article class="profils">
                <article class="image-profil">
                    <div class="modifier-img">
                     <img src="?>">
                    </div>
                </article>
                <h3 class="classement-profils">Votre classement : 17</h3>
                <h3 class="cpt-profils">Nombre de j'aime : 500</h3>
                <div class="reseau-profil">
                    <div class="fb-like" data-href="" data-layout="box_count" data-action="like" data-show-faces="false" data-share="true"></div>
                    <div class="like"></div>
                    <div class="partage"></div>
                </div>
            </article>

            <article class="participants">
                <div class="img-participants">
                    <img src="" alt="">
                </div>
            </article>
                  <?php
        
                   $dbconn3 = pg_connect("host=ec2-54-83-25-238.compute-1.amazonaws.com port=5432 dbname=dfhf24ft89btrp user=iclwqstdcanbnn password=VdN3cktdfKZZzPnasW4IxrghX6");
                        $result2 = pg_query($dbconn3, "SELECT * FROM photo");
                    
                        while ($row2 = pg_fetch_row($result2)) 
                            {
                ?>
            <article class="participants">
                <div class="img-participants">
                <?php echo "<img src='$row2[0]'/>";?>
                </div>
        <div class="fb-like" data-href="<?php echo $row2[0];?>" data-layout="box_count" data-action="like" data-show-faces="false" data-share="true"></div>
            </article>
                <?
                            }
?>    
        </section>
    </div>
    
    
    
    
    <?
            
            
            
        }

    ?>
    

</body>
</html>



?>