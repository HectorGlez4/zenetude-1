<?php
	class AccountModel {
		/**
			* Get user's informations about an user.
		**/
		public  function getDataUser($param) {
            $db = connect();
            $request = $db->prepare('SELECT '.$param.' FROM User WHERE user_instituteemail = '.$mail.'');
            $request->execute();
            $result = $request->fetchAll();
            return $result;
        }

		/**
			* Get student's informations (a parameter) about an student selected by its id.
		**/
		public function getDataStudent($param, $userId) {
			$db = connect();
			$request = $db->prepare('SELECT '.$param.' FROM Student WHERE user_id = '.$userId.'');
            $request->execute();
            $result = $request->fetchAll();
            return $result;
		}

		/**
			* Get training manager's informations about an training manager selected by its id.
		**/
		public function getDataTrainingManager($param, $userId) {
			$db = connect();
			$request = $db->prepare('SELECT '.$param.' FROM training_manager WHERE user_id = '.$userId.'');
            $request->execute();
            $result = $request->fetchAll();
            return $result;
		}		

		/**
			* Get all informations of a user selected by its mail and its password. 
			* This function is used for test connection for now if a password exits for a mail in the datebase.
		**/
        public function getUserPassword() {
            $db = connect();
            var_dump($db);
            $request = $db->prepare('SELECT * FROM User WHERE user_instituteemail = :mail AND user_password = :pass');
            $request->execute(array('mail' => $_POST['mail'], 'pass' => $_POST['pass']));
            $result = $request->fetchAll();
            return $result;
        }
        
        /**
            * Return true if the user is a training manager.
        **/
        public function isTrainingManager($id_user = null){
            if($id_user == null)
                return false;
                
            $bd = connect();
            $request = $db->prepare('SELECT * 
                                     FROM   Training_manager 
                                     WHERE  user_id = '.$id_user.'');
            if($request->execute())
                return true;
            else
                return false;
        }

		/**
			* Generate a new password an update it in the database. Then, a mail is automaticaly send to the user.
		**/
		public function recoverPassword() {
	    	$accountView = new AccountView();

            $string = "";
			$chaine = "abcdefghijklmnpqrstuvwxy";
			srand((double)microtime()*1000000);
			for($i=0; $i<10; ++$i) {
				$string .= $chaine[rand()%strlen($chaine)];	
		        }

            $db = connect();

            $request = $db->prepare('UPDATE User SET user_password = :password WHERE user_instituteemail = :mail');
			$request->execute(array('password' => sha1($string), 'mail' => $_POST['mail']));
			$body = "
				<h1>Réinitialisation du mot de passe</h1>
				<hr />
				<p>Bonjour, votre mot de passe a été réinitialisé.</p>
				<p>Votre nouveau mot de passe est : <a href='http://139.124.187.191/cedric/web/index.html'>$string</a></p>
				<hr />
				<p>Ce message à été généré automatiquement. Merci de ne pas y répondre.</p>
			";

			$mailer = new PHPMailer();
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
		        $mailer->AddAddress($_POST['mail'] ,utf8_encode(""));
		        $mailer->Subject ="Subject: =?UTF-8?B?".base64_encode("Réinitialisation du mot de passe | Zenetude")."?=";
		        $mailer->Body = $body;
		        if(!$mailer->Send())
                    $accountView->showMessage(2);
		        else
                    $accountView->showMessage(3);
		}

		/**
			* Add a new user to the database.
		**/
        public function addUser() {
            $db = connect();

            $request = $db->prepare('INSERT INTO User (user_password, user_instituteemail) VALUES (:password, :mail)');
            $request->execute(array('password' => $_POST['passe'], 'mail' => $_POST['mail']));
        }
	}

