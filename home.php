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
<section>

                <body>
    <div class="page-home">

        <header class="header">
            <h1>GRAND JEU CONCOURS</h1>
            <p>du 1er Juin au 31 Juillet 2015</p>
            <p class="txt2">Participer et tentez de gagner<br/> votre équipement de kyte surf avec</p>
            <img class="logohome" src="img/logo.png" />
        </header>

        <article class="slogan">
            <p>JETEZ-VOUS À L'EAU</p>
            <a href="voter.html" class="btnVoter">VOTER</a>
            <a href="participer.html" class="btnParticiper">PARTICIPER</a>
        </article>


        <section class="classement">
            <p>TOP 5</p>
            <article class="participants">
                <div class="positionClassement">1</div>
                <div class="img-participants">
                    <img src="" alt="">
                </div>
                <h3>500 J'aime</h3>
                <div class="like"></div>
                <div class="partage"></div>
            </article>
            <article class="participants">
               <div class="positionClassement">2</div>
                <div class="img-participants">
                    <img src="" alt="">
                </div>
                <h3>500 J'aime</h3>
                <div class="like"></div>
                <div class="partage"></div>
            </article>
            <article class="participants">
               <div class="positionClassement">3</div>
                <div class="img-participants">
                    <img src="" alt="">
                </div>
                <h3>500 J'aime</h3>
                <div class="like"></div>
                <div class="partage"></div>
            </article>
            <article class="participants">
               <div class="positionClassement">4</div>
                <div class="img-participants">
                    <img src="" alt="">
                </div>
                <h3>500 J'aime</h3>
                <div class="like"></div>
                <div class="partage"></div>
            </article>
            <article class="participants">
               <div class="positionClassement">5</div>
                <div class="img-participants">
                    <img src="" alt="">
                </div>
                <h3>500 J'aime</h3>
                <div class="like"></div>
                <div class="partage"></div>
            </article>
        </section>

        <footer>Conditions générales : The Wave - jeu concours est une marque déposée par des étudiants de l'École Supérieur de Génie Informatique (ESGI), dans le cadre d'un projet scolaire
        </footer>

    </div>
</body>
</section>
</body>
</html>

