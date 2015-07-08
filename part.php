<?php



    require_once 'facebook-php-sdk-v4-4.0-dev/autoload.php';

    define('FACEBOOK_SDK_V4_SRC_DIR', 'facebook-php-sdk-v4-4.0-dev/src/Facebook/');

    use Facebook\FacebookSession;
  
    use Facebook\FacebookRequest;
    use Facebook\GraphUser;
    use Facebook\FacebookRequestException;

    use Facebook\FacebookRedirectLoginHelper;
    use Facebook\FacebookRedirectLoginHelper;
    use Facebook\FacebookSession;
   
    
    $session = new FacebookSession('access token here');


    FacebookSession::setDefaultApplication('767304380051847', '7f0e4cac931818f7f7dc86d722dd5e0e');

    $helper = new FacebookRedirectLoginHelper('https://thewave.herokuapp.com/');
    $loginUrl = $helper->getLoginUrl();


    $helper = new FacebookRedirectLoginHelper();
    try {
      $session = $helper->getSessionFromRedirect();
    } catch(FacebookRequestException $ex) {
      // When Facebook returns an error
    } catch(\Exception $ex) {
      // When validation fails or other local issues
    }
    if ($session) {
      // Logged in
    }

$request = new FacebookRequest($session, 'GET', '/me');
$response = $request->execute();
$graphObject = $response->getGraphObject();


?>

<!DOCTYPE html>
<html lang="fr">
<head>
  
</head>
<body>

<section>

    

    
    

    
    
  <div id="presentation">

      

    </div>
</section>
</body>
</html>

