<?php 
	
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require_once './src/PHPMailer/src/Exception.php';
	require_once './src/PHPMailer/src/PHPMailer.php';
	require_once './src/PHPMailer/src/SMTP.php';
	// grab recaptcha library
	require_once "./src/lib/recaptchalib.php";

	class model_user extends Model
	{

		public function insert_user()
		{

			$email_inscription = htmlspecialchars($_POST['email_inscription']);

			$response = $this->captcha();

			$result = $this->select_req("
				SELECT mail
				FROM user
				");

			while ($row = $result->fetch()) 
			{
				if ($email_inscription == $row['mail']) 
				{
					return "<p class='col badge badge-danger'>Cette adresse email a déjà été utilisé</p>";
				}
			}
			/* Inscription d'un utilisateur dans la BDD */

			if (filter_var($email_inscription, FILTER_VALIDATE_EMAIL) && $response != null && $response->success) 
			{
				// verifie si syntaxe correspond à un email

				$result = $this->insert_req('
					INSERT INTO user(name,firstname,address,mail,password,confirmation,token) 
					VALUES (:name, :firstname, :address, :mail, :password, :confirm, :token)
					');

				/* message info utilisateur */

				return "<p class='col badge badge-warning'>confirmez votre adresse mail pour vous inscrire</p>";
			}
			else
			{
				return "<p class='col badge badge-danger'>Veuillez entrez un email valide</p>";
			}

		}

		public function mail()
		{
			$email_inscription = htmlspecialchars($_POST['email_inscription']);
			$mdp_inscription = htmlspecialchars($_POST['mdp_inscription']);

			$mail = new PHPMailer();

			//Config
			$mail->isSMTP();
			$mail->Host = 'smtp.gmail.com';
			$mail->SMTPAuth = true;
			$mail->Username = 'johanjeanfrancois@gmail.com';
			$mail->Password = 'Ed-axx-jojo972';
			$mail->SMTPSecure = 'ssl';
			$mail->Port = 465;

			//Info du mail
			$mail->setFrom('johanjeanfrancois@gmail.com','IfaMaker');
			$mail->addAddress($email_inscription);

			$mail->isHTML(true);
			$mail->Subject = "Confirmation mail ";
			$mail->Body = "<h3>Récapitulatif de vos informations</h3><br/><p>votre adresse de connexion : </p>".$email_inscription."<br/><p>votre mot de passe : </p>".$mdp_inscription."<br/><br/>Confirmer <a href='http://localhost/mes-projets/ifamaker/index.php?rqt=accueil&login=".sha1($email_inscription)."'>ici</a>";

			return $mail->send();
	 
		}

		public function confirm_mail()
		{

			$conn = new PDO("mysql:host=127.0.0.1;dbname=ifamaker","root","");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $result = $conn->prepare('UPDATE user SET confirmation = :confirm  WHERE token = :token');
            $result->execute(
                    array(
                        'confirm' => 'actif',
                        'token' => $_GET['login']                    
                    )
            );

           	return "<p class='col badge badge-success'>mail confirmé vous pouvez vous connecter</p>";
		}

		public function connexion_user($mail,$password,$login_success)
		{ 

			$response = $this->captcha();

			/* vérifie l'identité de l'utilisateur */

			$result = $this->select_req("
				SELECT user_id,mail, password,confirmation 
				FROM user
				");

			while ($row = $result->fetch()) 
			{
				if ($mail == $row['mail'] && sha1($password) == $row['password'] && 'actif' == $row['confirmation'] && $response != null && $response->success) 
				{	
					if(session_status() == PHP_SESSION_NONE)
					{
						session_start();
						$_SESSION['user_id'] = $row['user_id'];
						$_SESSION['auth'] = true;
						$login_success = true;
						break;
					}	
				}
			}

			/* message info utilisateur */

			if ($login_success == true) 
			{
				header('Refresh: 1; URL=http://localhost/mes-projets/ifamaker/index.php?rqt=perso&user='.$_SESSION['user_id']);
				return '<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>';
			}
			else
			{
				return "<p class='badge badge-danger'>connexion échoué</p>";
				
			}
		}

		public function verif_token()
		{ 

			/* vérifie l'identité de l'utilisateur */

			$result = $this->select_req("
				SELECT *
				FROM user
				WHERE token = '" . $_GET['login'] . "'"
			);

			$result->setFetchMode(PDO::FETCH_ASSOC);

			foreach ($result as $row) 
			{
				return $row['token']; 
			}
		}

		public function register_collab()
		{
			$response = $this->captcha();
			$result = $this->select_req("
				SELECT mail
				FROM user
				");

			while ($row = $result->fetch()) 
			{
				if ($email_inscription == $row['mail']) 
				{
					return "<p class='col badge badge-danger'>Cette adresse email a déjà été utilisé</p>";
				}
			}

			/* Inscription d'un utilisateur dans la BDD */

			if (filter_var($email_inscription, FILTER_VALIDATE_EMAIL)) 
			{
				if ( $response != null && $response->success ) 
				{
					// verifie si syntaxe correspond à un email

					$name = htmlspecialchars($_POST['nom_inscription']);
					$firstname = htmlspecialchars($_POST['prenom_inscription']);
					$address = htmlspecialchars($_POST['adresse_inscription']);
					$mail = htmlspecialchars($_POST['email_inscription']);
					$password = htmlspecialchars(sha1($_POST['mdp_inscription']));
					$confirm = 'inactif';
					$token = sha1($mail);

					$conn = new PDO("mysql:host=127.0.0.1;dbname=ifamaker","root","");
		            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		            $result = $conn->prepare('
			            	INSERT INTO user(name,firstname,address,mail,password,confirmation,token) 
							VALUES (:name, :firstname, :address, :mail, :password, :confirm, :token)
		            	');
		            $result->execute(
		                                 array(
		                                    'name' => $name,
											'firstname' => $firstname,
											'address' => $address,
											'mail' => $mail,
											'password' => $password,
											'confirm' => $confirm,
											'token' => $token
		                                )
		                            );
		             $id_user = $conn->lastInsertId();

		            $result2 = $conn->prepare('INSERT INTO board_user(id_user_foreign,id_board_foreign,activation) VALUES (:id_user,:id_board,:activation)');
		            $result2->execute(
		                                 array(
		                                    'id_user' => $id_user,
		                                    'id_board' => $_GET['tableau'],
		                                    'activation' => 1
		                                )
		                            );

					/* message info utilisateur */

					return "<p class='col badge badge-warning'>confirmez votre adresse mail pour vous inscrire</p>";
				}
				else
				{
					return "<p class='col badge badge-warning'>Vérifiez le captcha</p>";
				}
			}
			else
			{
				return "<p class='col badge badge-danger'>Veuillez entrez un email valide</p>";
			}
		}


		public function captcha()
		{

			// your secret key
			$secret = "6LeDDNEUAAAAAN_-tVzHg4_OnyPJU0Dsy9rcgTKF";
			 
			// empty response
			$response = null;
			 
			// check secret key
			$reCaptcha = new ReCaptcha($secret);

			// if submitted check response
			if ($_POST["g-recaptcha-response"]) {
			    $response = $reCaptcha->verifyResponse(
			        $_SERVER["REMOTE_ADDR"],
			        $_POST["g-recaptcha-response"]
			    );
			}
			return $response;
		}
	}
 ?>
