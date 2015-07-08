<?php
    error_reporting(E_ALL);


    require_once 'facebook-php-sdk-v4-4.0-dev/autoload.php';
    use Facebook\FacebookSession;
	use Facebook\FacebookRedirectLoginHelper;
	use Facebook\FacebookRequest;
	use Facebook\GraphUser;
    use Facebook\FacebookPermissions;
    use Facebook\FacebookPermissionException;
    use Facebook\FacebookRequestException;
  
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  
</head>
<body>

<section>

    

    
    

    
    
  <div id="presentation">

      
       <?php

            
$facebook = new Facebook(array(
  'appId'  => '767304380051847',
  'secret' => '7f0e4cac931818f7f7dc86d722dd5e0e',
));

// Get User ID
$user = $facebook->getUser();


if ($user) {
  try {
    // Proceed knowing you have a logged in user who's authenticated.
    $user_profile = $facebook->api('/me');
 } catch (FacebookApiException $e) {
     error_log($e);
    $user = null;
  }
}

if ($user) {
  $logoutUrl = $facebook->getLogoutUrl();
} else {
  $loginUrl = $facebook->getLoginUrl();
}







	       $me = (new FacebookRequest($session, 'GET', '/me'))->execute()->getGraphObject(GraphUser::className);
            echo $me->getName();
		?>
    </div>
</section>
</body>
</html>

