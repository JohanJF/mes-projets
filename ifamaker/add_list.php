<?php

    /**
     * injecte le titre et l'id étrangère de la liste dans la BDD
     */
     
     try 
    {

         if( isset($_POST['success']))
         {
            $title = $_POST['success'];
            $conn = new PDO("mysql:host=127.0.0.1;dbname=ifamaker","root","");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $result = $conn->prepare('INSERT INTO list(title,id_board_foreign) VALUES (:title,:id)');
            $result->execute(
                                 array(
                                    'title' => $title,
                                    'id' => 1
                                )
                            );
            echo 'Success';
            
        }
        else
        {
            echo 'Failed';
        }
    
    } catch (PDOException $e) 
        {
            echo "Une erreur s'est produite";
        }

?>