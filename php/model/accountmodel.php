<?php
	class AccountModel {

        /**
        * This function gets the training's information using the attribute userId
        * @param $param string contains the attribute needed
        * @param $userId int contains the user id
        * @return request's result
        */
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
		* This function makes a request to get the user information.
        * @param $param string contains the attribute needed
        * @param $mail string contains the user mail adress
        * @return request's result
		**/
		public  function getDataUser($param, $mail) {
            $db = connect();
            $request = $db->query('SELECT '.$param.' FROM User WHERE user_instituteemail = "'.$mail.'"');
            $result = $request->fetch();
            return $result;
        }

		/**
        * This function gets the information of a student selected by his/her id.
        * @param $param string contains the attribute needed
        * @param $userId int contains the user id
        * @return request's result
		**/
		public function getDataStudent($param, $userId) {
			$db = connect();
			$request = $db->query('SELECT '.$param.' FROM Student WHERE user_id = "'.$userId.'"');
            $result = $request->fetch();
            return $result;
		}

		/**
         * This function gets the information of a training manager selected by its id.
         * @param $param string contains the attribute needed
         * @param $userId int contains the user id
         * @return request's result
		**/
		public function getDataTrainingManager($param, $userId) {
			$db = connect();
			$request = $db->query('SELECT '.$param.' FROM Training_manager WHERE user_id = "'.$userId.'"');
            $result = $request->fetch();
            return $result;
		}		

		/**
         * This function gets all the information of a user selected by his mail and password.
         * This function is used to test the connection, if a password exists for a mail in the database.
         * @param $userMail string contains the user mail adress
         * @param $userPassword string contains the user's cripted password
         * @return request's result
		**/
        public function getUserByPassword($userMail, $userPassword) {
            $db = connect();
            $request = $db->query('SELECT * FROM User WHERE user_instituteemail = "'.$userMail.'" AND user_password = "'.$userPassword.'"');
            $result = $request->fetch(PDO::FETCH_ASSOC);
            return $result;
        }

        /**
         * This function gets the user_id, user_name, user_firstname and user_instituteemail of a specified user using his user_id
         * @param int $userId contains the user id
         * @return array contains user's principal informations
         */
        public function getUserById($userId = null){
            if($userId == null)
                return false;

            $db = connect();
            $request = $db->query('SELECT user_id, user_name, user_firstname, user_instituteemail
                                   FROM User
                                   WHERE user_id = "'.$userId.'"');
            $result = $request->fetch(PDO::FETCH_ASSOC);

            return $result;
        }

        /**
         * This function gets the user's cripted password
         * @param $userId int contains the user id
         * @return request's result
         **/
        public function getUserPassword($userId) {
            $db = connect();
            $request = $db->prepare('SELECT user_password FROM User WHERE user_id = '.$userId);
            $request->execute();
            $result = $request->fetch();
            return $result;
        }

        /**
         * This function gets the user email to check if it's already on the database.
         * @param $userMail string contains the user mail adress
         * @return request's result
         **/
        public function getUserEmail($userMail) {
            $db = connect();
            $request = $db->query('SELECT * FROM User WHERE user_instituteemail = "'.$userMail.'"');
            $result = $request->fetch(PDO::FETCH_ASSOC);
            return $result;
        }
        
        /**
         * This function returns true if the user is a training manager.
         * @param $id_user int contains the user id
         * @return boolean
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
         * This function gets all the information of the student who is currently connected.
         * @return request's result
        **/

        public function getInfoStudent(){
            $db = connect();
            $request = $db->prepare('SELECT * FROM Student WHERE user_id = '.$_SESSION['infoUser']['user_id']);
            $request->execute();
            return $result = $request->fetch();
        }


        /**
         * This function shows the description and the id of the training.
         * @return request's result
        **/

        public function getDescritpionTraining(){
            $db = connect();
            $request = $db->prepare('SELECT description, training_id FROM Training');
            $request->execute();
            return $result = $request->fetchAll();
        }

          /**
         * This function shows all the information of the user who is currently connected.
         * @return request's result
        **/

        public function getAllInfoUser(){
            $db = connect();
            $request = $db->prepare('SELECT * FROM User WHERE user_id = '.$_SESSION['infoUser']['user_id']);
            $request->execute();
            return $result4 = $request->fetch();
        }

		/**
         * This function generates a new password and updates it in the database. Then, a mail is automaticaly sent to the user.
         * @param $userMail string contains the user mail adress
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
                <p>Votre nouveau mot de passe est : <a href='http://zenetude.esy.es'>$string</a></p>
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
                $accountView->showMessage("Erreur mot de passe !");
            else
                $accountView->showMessage("Votre mot de passe a été réinitialisé. Un message contenant le nouveau mot de passe vous à été envoyé.","ok","index.php");
		}

		/**
         * This function adds a new user to the database.
         * @param $userMail string contains the user's id
         * @param $userfirstname string contains the user first name
         * @param $userlastname string contains the user last name
         * @param $userPassword string contains the user's cripted password
         * @return int contains the user id of the new user
		**/
        public function addUser($userMail, $userfirstname, $userlastname, $userPassword) {
            $db = connect();
            $usercorrectfirstname = str_replace(" ", "-", $userfirstname);
            $usercorrectlastname = str_replace(" ", "-", $userlastname);
            $db->query('INSERT INTO User (user_password, user_firstname, user_name, user_instituteemail)
                        VALUES ("'.$userPassword.'", "'.$usercorrectfirstname.'", "'.$usercorrectlastname.'", "'.$userMail.'")');
            $request0 = $db->query("SELECT user_id
                                    FROM User
                                    WHERE user_instituteemail = '$userMail'");
            $db->query('INSERT INTO Student (user_id, student_instituteemail, student_avatar, student_trombi)
                        VALUES ("'.$id.'", "'.$userMail.'", "../../img/avatar.png", "../../img/avatar.png")');

            return $request0->fetch(PDO::FETCH_ASSOC);
        }

        /**
         * This function sends an e-mail to the user mail address
         * @param $userMail string containing the user mail address
         */
        public function sendEmail($userMail){
            $accountView = new AccountView();
            $body = "
               <p>Bienvenue !! vous êtes inscrit sur la page Zenetude.</p>
               <p> Votre identifiant : ".$_POST['mail']."</p>
               <p>Votre mot de passe : ".$_POST['passe']."</p>
               <p>Accédez au site : <a href='http://zenetude.esy.es'>Zenetude</a></p>
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
                $accountView->showMessage("Erreur d'envoie du mail de récapitulation ! Mais l'inscription a réussie.");
            else
                $accountView->showMessage("Inscription terminée.","ok","index.php");
        }

        /**
         * This function checks if the user is an administrator using session data $_SESSION['infoUser']['user_id']
         * @return user's admin_id
         */
 		public function isAdministrator(){
 			$db = connect();
            $request = $db->query('SELECT admin_id FROM Administrator WHERE user_id IN (SELECT user_id FROM User WHERE user_id ='.$_SESSION['infoUser']['user_id'].')');
            $result = $request -> fetch();

            return $result;
 		}

        /**
         * This function gets the user_id, user_name, user_firstname, user_instituteemail of all users
         * @return request's result
         */
        public function recupAllUser(){
            $db = connect();
            $request = $db->query("SELECT user_id, user_name, user_firstname, user_instituteemail FROM User WHERE user_id != 1");

            return $request; 
        }

        /**
         * This function gets the user_id, user_name, user_firstname, user_instituteemail, user_type of the user where id is in $_POST['register']
         * @return request's result
         */
        public function recupAllInfoUserSelect(){
            $db = connect();
            $request = $db->query("SELECT user_id, user_name, user_firstname, user_instituteemail, user_type  FROM User WHERE user_id='".$_POST['register']."'");

            return $request;
        }
        
        /**
         * This function 
         * @return request's result
         */

        public function uploadInfoUser(){
            $accountView = new AccountView();
            $db = connect();
            if(isset($_SESSION['infoUser']) && $_SESSION['infoUser']['user_type'] == 'RF')
                $rf = true;
            else
                $rf = false;
            $user_id=$_POST['user_id'];
            $user_civility=$_POST['user_civility'];
            if(!$rf) {
                $student_personalemail=$_POST['student_personalemail'];
                $student_phone=$_POST['student_phone'];
                $student_mobile=$_POST['student_mobile'];
                $student_address1=$_POST['student_address1'];
                $student_address2=$_POST['student_address2'];
                $student_zipcode=$_POST['student_zipcode'];
                $student_city=$_POST['student_city'];
                $student_country=$_POST['student_country'];
                $student_nationality=$_POST['student_nationality'];
                $student_birthday=$_POST['student_birthday'];
                $student_birtharea=$_POST['student_birtharea'];
                $student_birthcountry=$_POST['student_birthcountry'];
                $student_status=$_POST['student_status'];
                $student_educationallevel=$_POST['student_educationallevel'];
                $student_origin=$_POST['student_origin'];
                $student_birthcity=$_POST['student_birthcity'];
                $student_comment=$_POST['student_comment'];
                $student_group=$_POST['student_group'];
                $training_description=$_POST['training_description'];
                $student_grantholder=$_POST['student_grantholder'];

                $request = $db->prepare('SELECT training_id FROM Training WHERE description = "'.$training_description.'"');
                $request->execute();
                $result3 = $request->fetchAll();
                $training_id = $result3[0][0];
            }

            if(!$rf){
                $values = array(htmlspecialchars($user_civility),
                    htmlspecialchars($student_personalemail),
                    htmlspecialchars($student_phone),
                    htmlspecialchars($student_mobile),
                    htmlspecialchars($student_address1),
                    htmlspecialchars($student_address2),
                    htmlspecialchars($student_zipcode),
                    htmlspecialchars($student_city),
                    htmlspecialchars($student_country),
                    htmlspecialchars($student_nationality),
                    htmlspecialchars($student_birthday),
                    htmlspecialchars($student_birtharea),
                    htmlspecialchars($student_birthcountry),
                    htmlspecialchars($student_status),
                    htmlspecialchars($student_educationallevel),
                    htmlspecialchars($student_origin),
                    htmlspecialchars($student_comment),
                    htmlspecialchars($student_group),
                    htmlspecialchars($student_birthcity),
                    htmlspecialchars($training_id),
                    htmlspecialchars($student_grantholder)
                );
            }
            else
                $values = array($user_civility);

            foreach ($values as $key => $value) {
                if (empty($value)) {
                    $values[$key] = null;
                } else {
                    $values[$key] = $value;
                }
            }
            $idUser = $_SESSION['infoUser']['user_id'];
            if(!$rf){
                if ($_SESSION['infoTraining']['training_max_group'] >= $values[17]  || empty($values[17]) || $values[17] == NULL  ) {
                    $update = $db->query("UPDATE Student SET
                    student_personalemail = '$values[1]',
                    student_phone = '$values[2]',
                    student_mobile = '$values[3]',
                    student_address1 = '$values[4]',
                    student_address2 = '$values[5]',
                    student_zipcode = '$values[6]',
                    student_city = '$values[7]',
                    student_country = '$values[8]',
                    student_nationality = '$values[9]',
                    student_birthdate = '$values[10]',
                    student_birtharea = '$values[11]',
                    student_birthcountry = '$values[12]',
                    student_status = '$values[13]',
                    student_educationallevel = '$values[14]',
                    student_origin = '$values[15]',
                    student_comment = '$values[16]',
                    student_group = '$values[17]',
                    student_birthcity = '$values[18]',
                    training_id = '$values[19]',
                    student_grantholder = '$values[20]'
                    WHERE user_id='$idUser'");
                }
            }

            $update2 = $db->query("UPDATE User SET
            user_civility = '$values[0]'
            WHERE user_id='$idUser'");

            if(!$rf){
                $_SESSION['infoStudent']['student_personalemail'] = $values[1];
                $_SESSION['infoStudent']['student_phone'] = $values[2];
                $_SESSION['infoStudent']['student_mobile'] = $values[3];
                $_SESSION['infoStudent']['student_address1'] = $values[4];
                $_SESSION['infoStudent']['student_address2'] = $values[5];
                $_SESSION['infoStudent']['student_zipcode'] = $values[6];
                $_SESSION['infoStudent']['student_city'] = $values[7];
                $_SESSION['infoStudent']['student_country'] = $values[8];
                $_SESSION['infoStudent']['student_nationality'] = $values[9];
                $_SESSION['infoStudent']['student_birthdate'] = $values[10];
                $_SESSION['infoStudent']['student_birtharea'] = $values[11];
                $_SESSION['infoStudent']['student_birthcountry'] = $values[12];
                $_SESSION['infoStudent']['student_status'] = $values[13];
                $_SESSION['infoStudent']['student_educationallevel'] = $values[14];
                $_SESSION['infoStudent']['student_origin'] = $values[15];
                $_SESSION['infoStudent']['student_comment'] = $values[16];
                $_SESSION['infoStudent']['student_group'] = $values[17];
                $_SESSION['infoStudent']['student_birthcity'] = $values[18];
                $_SESSION['infoStudent']['training_id'] = $values[19];
                $_SESSION['infoStudent']['student_grantholder'] = $values[20];
                $_SESSION['infoTraining']['description'] = $training_description;
            }
            $_SESSION['infoUser']['user_civility'] = $values[0];

            //$accountView->showMessage(null, "ok", "profil.php");
            header('Location: profil.php');
        }

        /**
         * This function counts the number of trainings of the training manager where there is at least one student
         * @return request's result
         */
 		public function nbDocuments(){
 			$db = connect();
 			$nbGroupForRF = $db->query("SELECT count(training_id) FROM Student WHERE training_id IN (SELECT training_id FROM Training WHERE training_manager_id = '".$_SESSION['infoRF']['training_manager_id']."')");
			$result = $nbGroupForRF -> fetch();

			return $result;
 		}

        /**
         * This function gets the user's name, firstname and instituteemail using $_SESSION['infoUser']['user_id']
         * @return request's result
         */
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

        /**
         * This function updates the student avatar path in the DB
         * @param $fichier string contains the picture's path
         * @param $userId int contains the user id
         * @return request's result
         */
        public function addAvatar($fichier, $userId){
            $db = connect();
            $request = $db->prepare("UPDATE Student SET student_avatar = '$fichier' where user_id = '$userId'");
            $request->execute();
            $result = $request->fetch();

            return $result;
        }

        /**
         * This function updates the student's picture's path of the trombinoscope in DB
         * @param $fichier string contains the picture's path
         * @param $userId int contains the user id
         * @return request's result
         */
        public function addTrombi($fichier, $userId){
            $db = connect();
            $request = $db->prepare("UPDATE Student SET student_trombi = '$fichier' where user_id = '$userId'");
            $request->execute();
            $result = $request->fetch();

            return $result;
        }

        /**
         * This function updates the user's cripted password
         * @param $password string contains the cripted password
         * @param $userId int contains the user id
         * @return mixed
         */
        public function updateUserPassword($password, $userId){
            $db = connect();
            $request = $db->prepare("UPDATE User SET user_password = '$password' where user_id = '$userId'");
            $request->execute();
            $result = $request->fetch();

            return $result;
        }

	}