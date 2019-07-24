<?php 
    /* Affiche les collaborateurs, l'utilisateur en cours et l'administrateur d'un tableau */
	try {

        $tab = []; // crée un tableau

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
                $tab['admin'][] = $admin['firstname']; // stocke le prenom de l'administrateur dans tableau associatif json
                $tab['admin'][] = $admin['user_id']; //stocke l'id unique de l'administrateur
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
                $tab['user'][] = $user_actif['firstname']; //stocke le prenom de l'utilisateur connecté
                $tab['user'][] = $user_actif['user_id']; //stocke l'id de l'utilisateur connecté
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
                $tab['firstname'][$collaborateurs['firstname']] = $collaborateurs['user_id'] ; //stocke les prenoms de tout les collaborateur sauf admin et utilisateur connecté
            }

            


            echo json_encode($tab);

		
	} catch (Exception $e) {
		echo "Une erreur s'est produite<br>" . $e->getMessage();
	}

 ?>