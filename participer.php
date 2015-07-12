<?php



require_once 'fbconfig-participer.php';





?>



<?php

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
    <title>Participez au concours</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <script src="js/dnd.js"></script>
</head>
<body>

    
    <!-------------------------------------------------------------------------------------------------------------------------------------------->

    

    
    
<html>
 <body>
  <form action="fbconfig-participer.php" method="post"enctype="multipart/form-data">
   <label for="file">Filename:</label>
     <input type="file" name="file" id="file"><br>
     <input type="submit" name="submit" value="Submit">
  </form>
 </body>
</html> 
    
    
      <?php if (isset($_POST['send'])) 
            {
                require_once 'fbconfig-upload.php';
            }
    ?>

    <!-------------------------------------------------------------------------------------------------------------------------------------------->

    
 <!-- <div class="container">
    
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
</ul>
</div>
    
    </div>-->
    
    
    <div class="page-jeParticipe">
        <header class="header">
            <h1>GRAND JEU CONCOURS</h1>
            <p>du 1er Juin au 31 Juillet 2015</p>
            <img src="img/logo.png" alt="logo">
            <h2>Envoyer votre plus belle photos</h2>
        </header>
        <section class="content">
           <article class="my-photo">
               <div class="bloc-photo-upload">
                   <div id="cadre" dropzone="copy">
				        <p>DEPOSEZ VOS PHOTOS ICI</p>
                        <h2>+</h2><br>
                   </div>
               </div>
           </article>
            <article class="participants">
                <div class="img-participants">
                    <img src="" alt="">
                </div>
                <h3>500 J'aime</h3>
                <div class="like"></div>
                <div class="partage"></div>
            </article>
            <article class="participants">
                <div class="img-participants">
                    <img src="" alt="">
                </div>
                <h3>500 J'aime</h3>
                <div class="like"></div>
                <div class="partage"></div>
            </article>
            <article class="participants">
                <div class="img-participants">
                    <img src="" alt="">
                </div>
                <h3>500 J'aime</h3>
                <div class="like"></div>
                <div class="partage"></div>
            </article>
            <article class="participants">
                <div class="img-participants">
                    <img src="" alt="">
                </div>
                <h3>500 J'aime</h3>
                <div class="like"></div>
                <div class="partage"></div>
            </article>
            <article class="participants">
                <div class="img-participants">
                    <img src="" alt="">
                </div>
                <h3>500 J'aime</h3>
                <div class="like"></div>
                <div class="partage"></div>
            </article>
            
            
            <article class="participants">
                <div class="img-participants">
                    <img src="" alt="">
                </div>
                <h3>500 J'aime</h3>
                <div class="like"></div>
                <div class="partage"></div>
            </article>
            <article class="participants">
                <div class="img-participants">
                    <img src="" alt="">
                </div>
                <h3>500 J'aime</h3>
                <div class="like"></div>
                <div class="partage"></div>
            </article>
            <article class="participants">
                <div class="img-participants">
                    <img src="" alt="">
                </div>
                <h3>500 J'aime</h3>
                <div class="like"></div>
                <div class="partage"></div>
            </article>
            <article class="participants">
                <div class="img-participants">
                    <img src="" alt="">
                </div>
                <h3>500 J'aime</h3>
                <div class="like"></div>
                <div class="partage"></div>
            </article>
            <article class="participants">
                <div class="img-participants">
                    <img src="" alt="">
                </div>
                <h3>500 J'aime</h3>
                <div class="like"></div>
                <div class="partage"></div>
            </article>
        </section>
    </div>
</body>
</html>



<?
    
            }



?>