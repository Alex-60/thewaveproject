<?php

    session_start();

        require_once 'autoload.php';

        use Facebook\FacebookSession;
        use Facebook\FacebookRedirectLoginHelper;
        use Facebook\FacebookRequest;
        use Facebook\FacebookResponse;
        use Facebook\FacebookSDKException;
        use Facebook\FacebookRequestException;
        use Facebook\FacebookAuthorizationException;
        use Facebook\GraphObject;
        use Facebook\Entities\AccessToken;
        use Facebook\HttpClients\FacebookCurlHttpClient;
        use Facebook\HttpClients\FacebookHttpable;
        
?>