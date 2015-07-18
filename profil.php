
<?php

require_once 'fbconfig-profil.php';

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
    
    
       <div class="hero-unit">
          <h1>Hello <?php echo $_SESSION['FULLNAME']; ?></h1>
          <p>Welcome to "facebook login" tutorial</p>
          </div>
        <div class="span4">
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
                                <li><?php echo  $_SESSION['IMG']; ?></li>
                </ul>
        </div>
    
    
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
            </article>

            <article class="participants">
                <div class="img-participants">
                    <img src="" alt="">
                </div>
                <h3>NB J'aime </h3>
                <div class="like"></div>
                <div class="partage"></div>
            </article>
          
          
            
            
        </section>
    </div>
</body>
</html>