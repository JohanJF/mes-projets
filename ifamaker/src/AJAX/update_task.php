<?php

    /**
     * injecte le titre et l'id étrangère de la liste dans la BDD
     */
     
     try 
    {
         if( isset($_POST['id_list']))
         {
            $id_list = $_POST['id_list'];
            $title = $_POST['titre_liste'];
            $conn = new PDO("mysql:host=127.0.0.1;dbname=ifamaker","root","");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $result = $conn->prepare('UPDATE list SET title = :title  WHERE id_list = :id_list');
            $result->execute(
                    array(
                        'title' => $title,
                        'id_list' => $id_list 
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