
<?php

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



?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Votre profil</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
</head>

<body>
    

    
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
                        
                        <img src="<?php echo $_SESSION['IMG']; ?>">
                        
                        
                        <h2>+</h2>
                        <h3>Modifier votre photo</h3>
                        
                            
                    </div>
                </article>
                
                <h3 class="classement-profils">Votre classement : 17</h3>
                <h3 class="cpt-profils">Nombre de j'aime : 500</h3>
                <div class="reseau-profil">
                    <div class="like"></div>
                    <div class="partage"></div>
                </div>
                
                
                
                  
                
<?php
                
                
                if ($_SERVER['REQUEST_METHOD'] === 'POST') 
                {
        
                     if (isset($_POST['send'])) 
                            {
                                echo "yes";
                                die();
                            }
                 }
                
                
                ?>
                
                
                
            </article>

            <article class="participants">
                <div class="img-participants">
                    <img src="" alt="">
                </div>
                <h3>NB J'aime </h3>
                <div class="like"></div>
                <div class="partage"></div>
            </article>
          
          
            
              <form enctype="multipart/form-data" action="" method="POST">
                        <!-- MAX_FILE_SIZE must precede the file input field -->
                        <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
                        <!-- Name of input element determines name in $_FILES array -->
                        <input name="userfile" type="file" />`

                        <input type="submit"  value="Send File" />
                    </form>
            
            
            
            
        </section>
    </div>
</body>
</html>