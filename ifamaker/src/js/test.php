<?php

    /**
     * Nous créons deux variables : $username et $password qui valent respectivement "Sdz" et "salut"
     */
     
    $username = "jf";
 
    if( isset($_POST['titre_table'])){
 
        if($_POST['titre_table'] == $username ){ // Si les infos correspondent...
            echo "Success";    
        }
        else{ // Sinon
            echo "Failed";
        }
    }
?>