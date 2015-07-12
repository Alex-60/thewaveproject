<?php

//require_once 'fbconfig-participer.php';


       // $filename=$_FILES['photo']['name'];

        //$filename = $_FILES['userfile']['name']; 
        //echo "Le nom du fichier contenant la photo est: ";
        //echo $filename;

//echo "Prénom tapé par l'utilisateur : ".$_POST['prenom'];


    


  echo "Upload: " . $_FILES["file"]["name"] . "<br>";
  echo "Type: " . $_FILES["file"]["type"] . "<br>";
  echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";


 if (isset($_POST['submit'])) 
                {
                    
                 
                    
                    $filename = $_FILES['userfile']['name']; 
     
     echo $filename;
     
     die();
                    $link = "./images/$filename";
                    $session = new FacebookSession();
                    $response = (new FacebookRequest($session, "POST", '/me/photos', array('source' => '@'.realpath($link),'source' => new CURLFile($link, 'image/jpg'),
                          )
                    ))->execute()->getGraphObject(); 
     
                    echo "faite";
                }
    



?>