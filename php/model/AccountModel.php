<?php
	class AccountModel {


		/**
			* Get user's informations about an user.
		**/
		public  function getDataUser($param, $mail) {
            $db = connect();
            $request = $db->query('SELECT '.$param.' FROM User WHERE user_instituteemail = "'.$mail.'"');
            $result = $request->fetchAll();
            return $result;
        }

		/**
			* Get student's informations (a parameter) about an student selected by its id.
		**/
		public function getDataStudent($param, $userId) {
			$db = connect();
			$request = $db->query('SELECT '.$param.' FROM Student WHERE user_id = "'.$userId.'"');
            $result = $request->fetchAll();
            return $result;
		}

		/**
			* Get training manager's informations about an training manager selected by its id.
		**/
		public function getDataTrainingManager($param, $userId) {
			$db = connect();
			$request = $db->query('SELECT '.$param.' FROM Training_manager WHERE user_id = "'.$userId.'"');
            $result = $request->fetchAll();
            return $result;
		}		

		/**
			* Get all informations of a user selected by its mail and its password. 
			* This function is used for test connection for now if a password exits for a mail in the datebase.
		**/
        public function getUserPassword($userMail, $userPassword) {
            $db = connect();
            $request = $db->query('SELECT * FROM User WHERE user_instituteemail = "'.$userMail.'" AND user_password = "'.$userPassword.'"');
            $result = $request->fetchAll();
            return $result;
        }

		/**
			* Generate a new password an update it in the database. Then, a mail is automaticaly send to the user.
		**/
		public function recoverPassword($userMail) {
	    	$accountView = new AccountView();

            $string = "";
			$chaine = "abcdefghijklmnpqrstuvwxy";
			srand((double)microtime()*1000000);
			for($i=0; $i<10; ++$i) {
				$string .= $chaine[rand()%strlen($chaine)];	
		        }

            $db = connect();

            $request = $db->query('UPDATE User SET user_password = "'.$string.'" WHERE user_instituteemail = "'.$userMail.'"');
			$body = "
				<h1>Réinitialisation du mot de passe</h1>
				<hr />
				<p>Bonjour, votre mot de passe a été réinitialisé.</p>
				<p>Votre nouveau mot de passe est : <a href='http://139.124.187.191/cedric/web/index.html'>$string</a></p>
				<hr />
				<p>Ce message à été généré automatiquement. Merci de ne pas y répondre.</p>
			";

			/*$mailer = new PHPMailer();
		        $mailer->IsSMTP();
		        $mailer->SMTPDebug = 0;
		        $mailer->SMTPAuth = true;
		        $mailer->SMTPSecure = 'ssl';
		        $mailer->Host = "smtp.gmail.com";
		        $mailer->Port = 465;
		        $mailer->IsHTML(true);
				$mailer->charSet = "UTF-8"; 	
		        $mailer->Username = "lpsilda2i@gmail.com";
		        $mailer->Password = "Projet2015";
		        $mailer->SetFrom("lpsilda2i@gmail.com");
		        $mailer->AddAddress($userMail ,utf8_encode(""));
		        $mailer->Subject ="Subject: =?UTF-8?B?".base64_encode("Réinitialisation du mot de passe | Zenetude")."?=";
		        $mailer->Body = $body;
		        if(!$mailer->Send())
                    $accountView->showMessage(2);
		        else
                    $accountView->showMessage(3);*/

                //Create a new PHPMailer instance
				$mailer = new PHPMailer;
				//Set who the message is to be sent from
				$mailer->setFrom('Zenetude', 'First Last');
				//Set who the message is to be sent to
				$mailer->addAddress($userMail, '');
				//Set the subject line
				$mailer->Subject = 'PHPMailer mail() test';
				$mailer->isHTML(true);
				//Replace the plain text body with one created manually
				 $mailer->Body = utf8_decode($body);
				//send the message, check for errors
				if (!$mailer->send()) {
				    echo "Mailer Error: " . $mailer->ErrorInfo;
				} else {
				    echo "Message sent!";
				}
		}

		/**
			* Add a new user to the database.
		**/
        public function addUser($userMail, $userPassword) {
            $db = connect();

            $request = $db->query('INSERT INTO User (user_password, user_instituteemail) VALUES ("'.$userPassword.'", "'.$userMail.'")');
        }
	}

