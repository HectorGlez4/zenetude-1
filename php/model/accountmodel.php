<?php
	class AccountModel {


        public function getTrainingInformationsForUser($param, $userId) {
            $db = connect();
            $request = $db->query('SELECT '.$param.' FROM Training WHERE training_id IN(SELECT training_id
                                                                                         FROM Student
                                                                                         WHERE user_id = '.$userId.'
                                                                                        )
            ');
            $result = $request->fetch();
            return $result;
        }

		/**
			* Get user's informations about an user.
		**/
		public  function getDataUser($param, $mail) {
            $db = connect();
            $request = $db->query('SELECT '.$param.' FROM User WHERE user_instituteemail = "'.$mail.'"');
            $result = $request->fetch();
            return $result;
        }

		/**
			* Get student's informations (a parameter) about an student selected by its id.
		**/
		public function getDataStudent($param, $userId) {
			$db = connect();
			$request = $db->query('SELECT '.$param.' FROM Student WHERE user_id = "'.$userId.'"');
            $result = $request->fetch();
            return $result;
		}

		/**
			* Get training manager's informations about an training manager selected by its id.
		**/
		public function getDataTrainingManager($param, $userId) {
			$db = connect();
			$request = $db->query('SELECT '.$param.' FROM Training_manager WHERE user_id = "'.$userId.'"');
            $result = $request->fetch();
            return $result;
		}		

		/**
			* Get all informations of a user selected by its mail and its password. 
			* This function is used for test connection for now if a password exits for a mail in the datebase.
		**/
        public function getUserByPassword($userMail, $userPassword) {
            $db = connect();
            $request = $db->query('SELECT * FROM User WHERE user_instituteemail = "'.$userMail.'" AND user_password = "'.$userPassword.'"');
            $result = $request->fetch();
            return $result;
        }

        /**
         * Get the user password
         **/

        public function getUserPassword($session) {
            $db = connect();
            $request = $db->prepare('SELECT user_password FROM User WHERE user_id = '.$session);
            $request->execute();
            $result = $request->fetch();
            return $result;
        }

        /**
         * Get the user email to check if it's already on the database.
         **/

        public function getUserEmail($userMail) {
            $db = connect();
            $request = $db->query('SELECT * FROM User WHERE user_instituteemail = "'.$userMail.'"');
            $result = $request->fetch(PDO::FETCH_ASSOC);
            return $result;
        }
        
        /**
            * Return true if the user is a training manager.
        **/
        public function isTrainingManager($id_user = null){
            if($id_user == null)
                return false;
                
            $db = connect();


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
		public function recoverPassword($userMail) {
	    	$accountView = new AccountView();

            $string = "";
			$chaine = "abcdefghijklmnpqrstuvwxy";
			srand((double)microtime()*1000000);
			for($i=0; $i<10; ++$i) {
				$string .= $chaine[rand()%strlen($chaine)];	
		        }

            $db = connect();

            $request = $db->query('UPDATE User SET user_password = "'.sha1($string).'" WHERE user_instituteemail = "'.$userMail.'"');
			$body = "
				<h1>Réinitialisation du mot de passe</h1>
				<hr />
				<p>Bonjour, votre mot de passe a été réinitialisé.</p>
                <p>Votre nouveau mot de passe est : <a href='http://zenetude.esy.es/php/view/'>$string</a></p>
 				<hr />
				<p>Ce message a été généré automatiquement. Merci de ne pas y répondre.</p>
			";

            $mailer = new PHPMailer();
            $mailer->CharSet = "utf-8";
            $mailer->IsHTML(true);
            // De qui vient le message, e-mail puis nom
            $mailer->From = "noreply@zenetude.esy.es";
            $mailer->FromName = "Noreply - Zenetude";
             
            // Définition du sujet/objet
            $mailer->Subject = "Zenetude - Nouveau mot de passe";
             
 


            $mailer->AddAddress($userMail);
            //$mailer->Subject ="Subject: =?UTF-8?B?".base64_encode("Réinitialisation du mot de passe | Zenetude")."?=";
            $mailer->Body = $body;
            if(!$mailer->Send())
                $accountView->showMessage("erreur mot de passe !");
            else
                $accountView->showMessage("Votre mot de passe a été réinitialisé. Un message contenant le nouveau mot de passe vous à été envoyé.","ok","index.php");
		}

		/**
			* Add a new user to the database.
		**/
        public function addUser($userMail, $userfirstname, $userlastname, $userPassword) {
            $db = connect();
            $usercorrectfirstname = str_replace(" ", "-", $userfirstname);
            $usercorrectlastname = str_replace(" ", "-", $userlastname);
            $request = $db->query('INSERT INTO User (user_password, user_firstname, user_name, user_instituteemail) VALUES ("'.$userPassword.'", "'.$usercorrectfirstname.'", "'.$usercorrectlastname.'", "'.$userMail.'")');
            $request0 = $db->query("SELECT user_id FROM User WHERE user_instituteemail = '$userMail'");
            $result0 = $request0->fetch();
            $id = $result0[0];
            $request2 = $db->query('INSERT INTO Student (user_id, student_instituteemail, student_avatar, student_trombi) VALUES ("'.$id.'", "'.$userMail.'", "../../img/avatar.png", "../../img/avatar.png")');

        }

        public function sendEmail($userMail){
            $accountView = new AccountView();
            $body = "
               <p>Bienvenue !! vous êtes inscrit sur la page Zenetude.</p>
               <p> Votre identifiant : ".$_POST['mail']."</p>
               <p>Votre mot de passe : ".$_POST['passe']."</p>
               <p>Accédez au site : <a href='http://zenetude.esy.es/php/view/'>Zenetude</a></p>
               <hr/>
               <p>Ce message a été généré automatiquement. Merci de ne pas y répondre.</p>
           ";
        

            $mailer = new PHPMailer();
            $mailer->CharSet = "utf-8";
            $mailer->IsHTML(true);
            $mailer->From = "noreply@zenetude.esy.es";
            $mailer->FromName = "Noreply - Zenetude";
         
            // Définition du sujet/objet
            $mailer->Subject = "Zenetude - Inscription";

            $mailer->AddAddress($userMail);
            //$mailer->Subject =/*"Subject: =?UTF-8?B?".*/base64_encode("Inscription au site Zenetude");
            $mailer->Body = $body;
            if(!$mailer->Send())
                $accountView->showMessage("Erreur d'envoie du mail !");
            else
                $accountView->showMessage("Inscription terminée.","ok","index.php");
        }

 		public function isAdministrator(){
 			$db = connect();
            $request = $db->query('SELECT admin_id FROM Administrator WHERE user_id IN (SELECT user_id FROM User WHERE user_id ='.$_SESSION['infoUser']['user_id'].')');
            $result = $request -> fetch();

            return $result;
 		}

        public function recupAllUser(){
            $db = connect();
            $request = $db->query("SELECT user_id, user_name, user_firstname, user_instituteemail FROM User WHERE user_id != 1");

            return $request; 
        }

        public function recupAllInfoUserSelect(){
            $db = connect();
            $request = $db->query("SELECT user_id, user_name, user_firstname, user_instituteemail, user_type  FROM User WHERE user_id='".$_POST['register']."'");

            return $request;
        }

 		public function nbDocuments(){
 			$db = connect();
 			$nbGroupForRF = $db->query("SELECT count(training_id) FROM Student WHERE training_id IN (SELECT training_id FROM Training WHERE training_manager_id = '".$_SESSION['infoRF']['training_manager_id']."')");
			$result = $nbGroupForRF -> fetch();

			return $result;
 		}

        public function infoMyTrainingManager(){
            $db = connect();
            $request = $db->prepare('SELECT user_name,user_firstname,user_instituteemail
                                      FROM User U , Student S, Training T ,Training_manager TM
                                      WHERE S.training_id = T.training_id AND
                                      T.training_manager_id = TM.training_manager_id AND
                                      TM.user_id = U.user_id AND S.user_id ='.$_SESSION['infoUser']['user_id']);
            $request->execute();
            $result = $request->fetch();

            return $result;
        }

        public function addAvatar($fichier, $session){
            $db = connect();
            $request = $db->prepare("UPDATE Student SET student_avatar = '$fichier' where user_id = '$session'");
            $request->execute();
            $result = $request->fetch();

            return $result;
        }

        public function addTrombi($fichier, $session){
            $db = connect();
            $request = $db->prepare("UPDATE Student SET student_trombi = '$fichier' where user_id = '$session'");
            $request->execute();
            $result = $request->fetch();

            return $result;
        }

        public function updateUserPassword($password, $session){
            $db = connect();
            $request = $db->prepare("UPDATE User SET user_password = '$password' where user_id = '$session'");
            $request->execute();
            $result = $request->fetch();

            return $result;
        }

	}