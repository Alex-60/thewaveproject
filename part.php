<?php

session_start();

  use Facebook\FacebookSession;
	use Facebook\FacebookRedirectLoginHelper;
    require_once 'facebook-php-sdk-v4-4.0-dev/autoload.php';

      

    $APPID ="767304380051847";
    $APPSECRET ="7f0e4cac931818f7f7dc86d722dd5e0e";
    
    FacebookSession::setDefaultApplication(APPID, APPSECRET);
    $helper = new FacebookRedirectLoginHelper('https://thewave.herokuapp.com/participer.php');
    $session = $helper->getSessionFromRedirect();

    echo $session;



?>