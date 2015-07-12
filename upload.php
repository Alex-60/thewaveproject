<?php

require_once 'fbconfig-participer.php';



    


  echo "Upload: " . $_FILES["file"]["name"] . "<br>";
  echo "Type: " . $_FILES["file"]["type"] . "<br>";
  echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";


     if($session)
     {
     
     echo "there is a session";
     
     } 



?>