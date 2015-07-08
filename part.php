<?php
    

    session_start();



	if( isset($_SESSION) && isset($_SESSION['fb_token']) )
	{
		$session = new FacebookSession($_SESSION['fb_token']);
	}
	//Sinon j'affiche le lien de connection
	else
	{
		$session = $helper->getSessionFromRedirect();
	}

session_start();

if($session) 
{
  try 
  {
    $user_profile = (new FacebookRequest(
      $session, 'GET', '/me'
    ))->execute()->getGraphObject(GraphUser::className());
    echo "Name: " . $user_profile->getName();
  } catch(FacebookRequestException $e) 
  {
    echo "Exception occured, code: " . $e->getCode();
    echo " with message: " . $e->getMessage();
  }   
}


?>