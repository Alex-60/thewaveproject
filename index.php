<?php
require_once 'fbconfig.php';

//session_start(); 
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
            <a href="fbconfig-voter.php" class="btnVoter">VOTER</a>
          
           <div class="btn-jeux">
            <a href='fbconfig-participer.php' class="btnParticiper">PARTICIPER</a>
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