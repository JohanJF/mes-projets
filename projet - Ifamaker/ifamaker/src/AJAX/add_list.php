<?php
    include 'connexion.php';
    /**
     * injecte le titre et l'id étrangère de la liste dans la BDD
     */
    function position($conn,$id)
    {
        $position = $conn->prepare('
                SELECT COUNT(*) 
                FROM list 
                WHERE id_board_foreign = :id
            ');
        $position->execute(
             array(
                'id' => $id
            )
        );

        $position->setFetchMode(PDO::FETCH_ASSOC);
       
       foreach ($position as $row) 
       {
            return $row['COUNT(*)'];
       }
        
    }
     
     try 
    {
         if( isset($_POST['success']))
         {
            $title = htmlspecialchars($_POST['success']);
            $id = $_POST['id'];
            $result = connexion()->prepare('INSERT INTO list(title,id_board_foreign,position) VALUES (:title,:id,:position)');
            $result->execute(
                                 array(
                                    'title' => $title,
                                    'id' => $id,
                                    'position' => position(connexion(),$id)+1
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