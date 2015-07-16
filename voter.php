<?php

require_once 'fbconfig-voter.php';

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
    
    
    
<?php if ($_SESSION['FBID']): ?>      

<div class="container">
    
        <!--<div class="hero-unit">
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
                </ul>
        </div>-->
</div>
    <?php else: ?>   
<div class="container">
<h1>Login with Facebook</h1>
           Not Connected
<div>
      <a href="fbconfig.php">Login with Facebook</a></div>
</div>
    <?php endif ?>
    
    
    <div class="page-jeVote">
        <header class="header">
            <h1>GRAND JEU CONCOURS</h1>
            <p>du 1er Juin au 31 Juillet 2015</p>
            <img src="img/logo.png" alt="logo">
            <a class="btnParticiper" href="fbconfig-participer.php">PARTICIPER</a>
            
       
            
            <h2>Voter pour la meilleure photo</h2>
        </header>
        
        
            <?php 
                

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