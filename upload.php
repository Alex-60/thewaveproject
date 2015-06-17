<?php
       // $filename=$_FILES['photo']['name'];

        $filename = $HTTPS_POST_FILES['photo']['name']; 
        echo "Le nom du fichier contenant la photo est: ";
        echo $filename;
?>