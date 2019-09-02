<?php
    include 'connexion.php';
    /**
     * Supprime un utilisateur
     */
     
     try 
    {
        $user_id = $_POST['user_id'];

        $result = connexion()->prepare('DELETE FROM user WHERE user_id = :user_id');
        $result->execute(
                             array(
                                'user_id' => $user_id
                            )
                        );

        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        session_destroy(); // ferme la session

        echo "Success";
    
    } catch (PDOException $e) 
        {
            echo "Une erreur s'est produite";
        }

?>