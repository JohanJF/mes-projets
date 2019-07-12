<?php 

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require_once '../PHPMailer/src/Exception.php';
	require_once '../PHPMailer/src/PHPMailer.php';
	require_once '../PHPMailer/src/SMTP.php';

	function envoi_mail()
	{
		/* envoi un mail d'invitation dans un tableau collaboratif */
		$conn = new PDO("mysql:host=127.0.0.1;dbname=ifamaker","root","");
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$type = $conn->prepare('
				SELECT *
				FROM user'
			);

		$type->execute();
		$type->setFetchMode(PDO::FETCH_ASSOC);

		foreach ($type as $row) 
		{
			/* ajoute 1 notification si utilisateur déja inscrit */			
			if ($_POST['mail_collab'] == $row['mail']) 
			{
	            $result = $conn->prepare('INSERT INTO board_user(id_user_foreign,id_board_foreign,activation) 
	            						  VALUES (:user,:board,:activation)'
	            						);
	            $result->execute(
	                                 array(
	                                 	'user' => $row['user_id'],
	                                 	'board' => $_POST['id_board'],
	                                    'activation' => 0
	                                )
	                            );
			}
		}

		$mail = new PHPMailer();

		//Config
		$mail->isSMTP();
		$mail->Host = 'SSL0.OVH.NET';
		$mail->SMTPAuth = true;
		$mail->Username = 'jeanfrancois.johan@stagiairesifa.fr';
		$mail->Password = '19751224*';
		$mail->SMTPSecure = 'tls';
		$mail->Port = 587;

		//Info du mail
		$mail->setFrom('jeanfrancois.johan@stagiairesifa.fr','IfaMaker');
		$mail->addAddress($_POST['mail_collab']);

		$mail->isHTML(true);
		$mail->Subject = "Vous avez été invité dans un tableau collaboratif";
		$mail->Body = 'Vous avez été invité à rejoindre le tableau collaboratif "'. $_POST['title_board'] . '" <br><br> Pour s\'inscrire et rejoindre ce tableau, cliquez <a href="http://localhost/mes-projets/ifamaker/index.php?rqt=register&tableau='.$_POST['id_board'].'">ici</a> <br><br>Si vous possédez déjà un compte, connectez-vous <a href="http://localhost/mes-projets/ifamaker/index.php">ici</a> et consultez vos notifications';

		$mail->send();
	}

	if (filter_var($_POST['mail_collab'], FILTER_VALIDATE_EMAIL)) 
	{
	    
		envoi_mail();

		echo "Success";
		
	}
	else
	{
		echo 'Error';
	}


 ?>