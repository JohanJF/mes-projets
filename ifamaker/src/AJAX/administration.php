<?php 

	try {

        $new = [];

		$conn = new PDO("mysql:host=127.0.0.1;dbname=ifamaker","root","");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $admin = $conn->prepare('
                            SELECT *
                            FROM board_user
                            INNER JOIN user ON id_user_foreign = user_id
                            WHERE id_board_foreign = :board AND administrateur = "admin"
                        ');
            $admin->execute(
                                 array(
                                    'board' => $_POST['id_tableau']
                                )
                            );

            $admin->setFetchMode(PDO::FETCH_ASSOC);

            foreach ($admin as $admin) 
            {
                $new['admin'][] = $admin['firstname'];
                $new['admin'][] = $admin['user_id'];
            }

            ////////////////////////////////////////////////////////

            $user_actif = $conn->prepare('
                            SELECT *
                            FROM board_user
                            INNER JOIN user ON id_user_foreign = user_id
                            WHERE id_board_foreign = :board AND id_user_foreign = :user
                        ');
            $user_actif->execute(
                                 array(
                                    'board' => $_POST['id_tableau'],
                                    'user' => $_POST['user']
                                )
                            );

            $user_actif->setFetchMode(PDO::FETCH_ASSOC);

            foreach ($user_actif as $user_actif) 
            {
                $new['user'][] = $user_actif['firstname'];
                $new['user'][] = $user_actif['user_id'];
            }

            ////////////////////////////////////////////////////////

            $collaborateurs = $conn->prepare('
                            SELECT *
                            FROM board_user
                            INNER JOIN user ON id_user_foreign = user_id
                            WHERE id_board_foreign = :board AND administrateur IS NULL AND id_user_foreign != :user
                        ');
            $collaborateurs->execute(
                                 array(
                                    'board' => $_POST['id_tableau'],
                                    'user' => $_POST['user']
                                )
                            );

            $collaborateurs->setFetchMode(PDO::FETCH_ASSOC);

            foreach ($collaborateurs as $collaborateurs) 
            {
                $new['firstname'][$collaborateurs['firstname']] = $collaborateurs['user_id'] ;
            }

            


            echo json_encode($new);

		
	} catch (Exception $e) {
		echo "Une erreur s'est produite<br>" . $e->getMessage();
	}

 ?>