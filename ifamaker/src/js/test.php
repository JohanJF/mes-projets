<?php

    /**
     * Nous créons deux variables : $username et $password qui valent respectivement "Sdz" et "salut"
     */
     
    $username = "jf";
 
    if( isset($_POST['username']){
 
        if($_POST['username'] == $username
        { // Si les infos correspondent...
            session_start();
            $_SESSION['user'] = $username;
            echo "Success";    
        }
        else
        { // Sinon
            echo "Failed";
        }
    }
?>