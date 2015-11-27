<?php
	class AccountController {
		public function	controlRecoverPassword() {
			$accountModel = new AccountModel();
			$accountView = new AccountView();			
		
			$mail = htmlspecialchars($_POST['mail']);
			
			if($accountModel -> getData('*')) {
				$accountModel -> recoverPassword();
			}
			else
				$accountView -> showEMessage(1);
		}

        public function controlConnection() {
            if (count($_POST) > 0){
                $accountModel = new AccountModel();

                $_POST['mail'] = htmlspecialchars($_POST['mail']);
                $_POST['pass'] = htmlspecialchars(sha1($_POST['pass']));
                $co = connect();
                if ($result = $accountModel -> getUserpassword()){
                    session_start();
                    $_SESSION['nom'][0] = $result[0]['user_name'];
                    header('Location: index-connecte.php');

                }else{
                   header('Location: ../web/index.html');
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
                    $accountView->showEMessage(4);

                }
                else
                {
                    // Cryptage du mot de passe
                    $_POST["passe"] = sha1($_POST["passe"]);
                    // Insertion dans la base de données
                    $accountModel->addUser();
                    // Redirection vers la page d'accueil
                    header('Location: ../web/index.html');
                }

            }
        }
	}
