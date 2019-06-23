<?php

    /**
     * injecte le titre et l'id étrangère de la liste dans la BDD
     */
     
     try 
    {
         if( isset($_POST['id_list']))
         {
            $id_list = $_POST['id_list'];
            $conn = new PDO("mysql:host=127.0.0.1;dbname=ifamaker","root","");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $result = $conn->prepare('DELETE FROM list WHERE id_list = :id_list');
            $result->execute(
                                 array(
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