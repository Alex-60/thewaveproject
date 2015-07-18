
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
    
 <form action="fbconfig-profil.php" method="POST" enctype="multipart/form-data">
   <label for="file">Filename:</label>
     <input type="file" name="file" id="file"><br>
     <input type="submit" name="imgchange" value="Submit">
  </form>
    

        
     <!--<form enctype="multipart/form-data" action="" method="POST">
          
            <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
          
            Send this file: <input name="userfile" type="file" />`
            
            <input type="submit" name="send" value="Send File" />
        </form>-->
    
            
    
    
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
                
                
                
                  
                

                
                
                
            </article>

            <article class="participants">
                <div class="img-participants">
                    <img src="" alt="">
                </div>
                <h3>NB J'aime </h3>
                <div class="like"></div>
                <div class="partage"></div>
            </article>
          
          
            
                    <!--<form enctype="multipart/form-data" action="" method="POST">
                        
                        <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
                      
                        <input name="userfile" type="file" />`

                        <input type="submit"  value="Send File" />
                    </form>-->
            
            
       
            
            
            
            
        </section>
    </div>
</body>
</html>