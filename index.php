<?php
//require_once 'fbconfig.php';


//session_start(); 


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

// init app with app id and secret
FacebookSession::setDefaultApplication( '767304380051847','7f0e4cac931818f7f7dc86d722dd5e0e' );
// login helper with redirect_uri
    $helper = new FacebookRedirectLoginHelper('https://thewave.herokuapp.com/voter.php');
    $helper2 = new FacebookRedirectLoginHelper('https://thewave.herokuapp.com/participer.php');
try 
{
  $session = $helper->getSessionFromRedirect();
    
  $loginUrl = $helper->getLoginUrl();
    $loginUrl2 = $helper2->getLoginUrl(array('scope' => 'publish_actions'));
    
     echo '<script type="text/javascript">top.window.location="'.$loginUrl.'";</script>';


} catch( FacebookRequestException $ex ) 
{
  // When Facebook returns an error
} catch( Exception $ex ) 
{
  // When validation fails or other local issues
        
}


?>
<!doctype html>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
    <meta charset="UTF-8">
    <title>Grand jeu concours THE WAVE</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
</head>
<section>
<body>
    

      <?php if (!isset($_SESSION['FBID']) || isset($_SESSION['FBID']) ): ?>   
<div class="page-home">
        <header class="header">
            <h1>GRAND JEU CONCOURS</h1>
            <p>du 1er Juin au 31 Juillet 2015</p>
            <p class="txt2">Participer et tentez de gagner<br/> votre équipement de kyte surf avec</p>
            <img class="logohome" src="img/logo.png" />
        </header>
        <article class="slogan">
            <p>JETEZ-VOUS À L'EAU</p>
            <div class="btn-jeux">
            <a href="<?php echo $loginUrl ?>" class="btnVoter">VOTER</a>
                
            </div>
           <div class="btn-jeux">
            <a href='<?php echo $loginUrl2 ?>' class="btnParticiper">PARTICIPER</a>
            </div>
        </article>
        <section class="classement">
            <p>TOP 5</p>
            <?php 
                $dbconn3 = pg_connect("host=ec2-54-83-25-238.compute-1.amazonaws.com port=5432 dbname=dfhf24ft89btrp user=iclwqstdcanbnn password=VdN3cktdfKZZzPnasW4IxrghX6");
                $result2 = pg_query($dbconn3, "SELECT * FROM photo ORDER BY date DESC LIMIT 5");
                    
                        while ($row2 = pg_fetch_row($result2)) 
                            {
                                echo "<article class='participants'>";
                                echo "<div class='img-participants'>";
                                echo "<img src='$row2[0]'/>"; 
                                echo "</div>"; 
                                echo "</article>";
                            }
            ?>
        </section>
        <footer>Conditions générales : The Wave - jeu concours est une marque déposée par des étudiants de l'École Supérieur de Génie Informatique (ESGI), dans le cadre d'un projet scolaire
        </footer>
    </div>
    <?php endif ?>
    
</body>
</section>
 <!--   
<body>
  <?php if ($_SESSION['FBID']): ?>      
<div class="container">
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
</ul></div></div>
    <?php else: ?>   
<div class="container">
<h1>Login with Facebook</h1>
           Not Connected
<div>
      <a href="fbconfig.php">Login with Facebook</a></div>
</div>
    <?php endif ?>
</body>-->
    
    
</html>