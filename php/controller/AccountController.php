<?php
	class AccountController {
		/**
			* Test if the mail address given by the user exists in the database. 
		**/
		public function	controlRecoverPassword() {
			$accountModel = new AccountModel();
			$accountView = new AccountView();			
			$mail = htmlspecialchars($_POST['mail']);
			
			if($accountModel -> getDataUser('*')) {
				$accountModel -> recoverPassword();
			}
			else
				$accountView -> showMessage(1);
		}

		/**
			* Test if the mail address and the password given by the user exist in the database. 
		**/
        public function controlConnection() {
			$accountView = new AccountView();
            if (count($_POST) > 0){
                $accountModel = new AccountModel();
                $_POST['mail'] = htmlspecialchars($_POST['mail']);
                $_POST['pass'] = htmlspecialchars(sha1($_POST['pass']));
                if ($result = $accountModel -> getUserPassword()){
                    session_start();
                    $_SESSION['nom'] = $result[0]['user_name'];
					$_SESSION['prenom'] = $result[0]['user_firstname'];
					$_SESSION['id'] = $result[0]['user_id'];
					if($result[0]['user_type'] == 'Etudiant') {
						$studentResult = $accountModel->getDataStudent('*', $_SESSION['id']);
						$_SESSION['class'] = $studentResult[0]['student_group'];
						var_dump($_SESSION);
					}
					else if($result[0]['user_type'] == 'RF'){

					}
					else {

					}
                    header('Location: index.php');

                }
				else{
					$accountView -> showMessage(5);	
                }
            }
        }
		
		/**
			* Test if informations given by the user before create a new user in the database. 
		**/
        public function controlInscription() {
            if(!empty($_POST['mail']))
            {
                $accountModel = new AccountModel();
                $accountView = new AccountView();

                $_POST["mail"] = htmlspecialchars($_POST["mail"]);
                $_POST["passe"] = htmlspecialchars($_POST["passe"]);
                $_POST["passe2"]= htmlspecialchars($_POST["passe2"]);

                if($_POST["passe"] !=  $_POST["passe2"])
                {
                    $accountView->showMessage(4);

                }
                else
                {
                    $_POST["passe"] = sha1($_POST["passe"]);
                    $accountModel->addUser();
                    header('Location: index.php');
                }

            }
        }
	}
