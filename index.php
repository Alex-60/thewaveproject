<?php
  require_once('./fonction.php');
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
        
<?php 


    $helper = new FacebookRedirectLoginHelper('https://thewave.herokuapp.com/voter.php');
    $loginUrl = $helper->getLoginUrl(['publish_actions','user_likes','user_photos','user_posts','read_stream','user_friends','manage_pages']);

    

    $helper2 = new FacebookRedirectLoginHelper('https://thewave.herokuapp.com/participer.php');
    $loginUrl2 = $helper2->getLoginUrl(['publish_actions','user_likes','user_photos','user_posts','read_stream','user_friends','manage_pages']);



?>
        <header class="header">
            <h1>GRAND JEU CONCOURS</h1>
            <p>du 1er Juin au 31 Juillet 2015</p>
            <p class="txt2">Participer et tentez de gagner<br/> votre équipement de kyte surf avec</p>
            <img class="logohome" src="img/logo.png" />
        </header>

        <article class="slogan">
            <p>JETEZ-VOUS À L'EAU</p>
            <a href='<?php echo $loginUrl;?>' class="btnVoter">VOTER</a>
          
           <div class="btn-jeux">
            <a href='<?php echo $loginUrl2;?>' class="btnParticiper">PARTICIPER</a>
            </div>
            
          
        <?php //$loginUrl = $helper->getLoginUrl( ['publish_actions','user_likes','user_photos','user_posts','read_stream','user_friends','manage_pages']);?>
            


<?php 
/*

    $helper = new FacebookRedirectLoginHelper('https://thewave.herokuapp.com/voter.php');
    $loginUrl = $helper->getLoginUrl(['publish_actions','user_likes','user_photos','user_posts','read_stream','user_friends','manage_pages']);

    $helper2 = new FacebookRedirectLoginHelper('https://thewave.herokuapp.com/participer.php');
    $loginUrl2 = $helper2->getLoginUrl(['publish_actions','user_likes','user_photos','user_posts','read_stream','user_friends','manage_pages']);

*/

?>
           <!-- <a href='<?php// echo $loginUrl;?>'>VOTER</a>
            <a href='<?php //echo $loginUrl2;?>'>PARTICIPER</a>-->

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
</body>
</section>
</body>
</html>

