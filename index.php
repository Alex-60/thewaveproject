<?php

   session_start(); 

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
  <?php if ($_SESSION['FBID']): ?>      <!--  After user login  -->
<div class="container">
        <div class="hero-unit">
              <h1>Hello <?php echo $_SESSION['USERNAME']; ?></h1>
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
                <li class="nav-header">Facebook Email</li>
                <li><?php echo $_SESSION['EMAIL']; ?></li>
                <div><a href="logout.php">Logout</a></div>
            </ul>
        </div>
</div>
    <?php else: ?>  
      
      <!-- Before login --> 
<div class="container">
<h1>Login with Facebook</h1>
           Not Connected
<div>
      <a href="fbconfig.php" style="color:black;">Login with Facebook</a>
    
</div>
	 <div> <a href=""  title="Login with facebook">View Post</a>
	  </div>
      </div>
    <?php endif ?>
  </body>
    
    
</section>
</body>
</html>

