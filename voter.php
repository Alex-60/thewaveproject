<?php




   if (isset($_GET['error']) && $_GET['error'] == 'access_denied')
    {
         
    //$helper = new FacebookRedirectLoginHelper('https://thewave.herokuapp.com/index.php');
    //$loginUrl = $helper->getLoginUrl();
       
       header('Location: https://thewave.herokuapp.com/');    
    }
    else
            {    ?>   
               
               <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Voter</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
</head>
<body>

    <div class="page-jeVote">
        <header class="header">
            <h1>GRAND JEU CONCOURS</h1>
            <p>du 1er Juin au 31 Juillet 2015</p>
            <img src="img/logo.png" alt="logo">
            <a class="btnParticiper" href="participer.html">PARTICIPER</a>
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
            <article class="participants">
                
                <?php
        
                $dbconn3 = pg_connect("host=ec2-54-83-25-238.compute-1.amazonaws.com port=5432 dbname=dfhf24ft89btrp user=iclwqstdcanbnn password=VdN3cktdfKZZzPnasW4IxrghX6");
                $result2 = pg_query($dbconn3, "SELECT * FROM photo");
        
               echo "<div class='img-participants'>";
                    echo "<img src="" alt=''>";
                echo "</div>";
                echo "<h3>500 J'aime</h3>";
                echo "<div class='like'></div>";
                echo "<div class='partage'></div>";
                
                ?>
            </article>
        </section>
        
    </div>
</body>
</html><?
    
            }



?>