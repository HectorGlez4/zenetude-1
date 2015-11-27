<?php
	class AccountController {
		public function	controlRecoverPassword() {
			ini_set("display_errors",1);
			$accountModel = new AccountModel();
			$accountView = new AccountView();			
			$mail = htmlspecialchars($_POST['mail']);
			
			if($accountModel -> getDataUser('*')) {
				$accountModel -> recoverPassword();
			}
			else
				$accountView -> showMessage(1);
		}

        public function controlConnection() {
			ini_set('display_error', 1);
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
						$studentResult = $accountModel->getDataStudent("*", $_SESSION['id']);
						$_SESSION['class'] = $studentResult[0]['student_group'];
					}
					else if($result[0]['user_type'] == 'RF'){

					}
					else {

					}
                    header('Location: index-connecte.php');

                }
				else{
					$accountView -> showMessage(5);	
                }
            }
        }

        public function controlInscription() {
            if(!empty($_POST['mail']))
            {
                $accountModel = new AccountModel();
                $accountView = new AccountView();

                // On récupère les données POST
                $_POST["mail"] = htmlspecialchars($_POST["mail"]);
                $_POST["passe"] = htmlspecialchars($_POST["passe"]);
                $_POST["passe2"]= htmlspecialchars($_POST["passe2"]);

                if($_POST["passe"] !=  $_POST["passe2"])
                {
                    $accountView->showMessage(4);

                }
                else
                {
                    // Cryptage du mot de passe
                    $_POST["passe"] = sha1($_POST["passe"]);
                    // Insertion dans la base de données
                    $accountModel->addUser();
                    // Redirection vers la page d'accueil
                    header('Location: index.php');
                }

            }
        }
	}
