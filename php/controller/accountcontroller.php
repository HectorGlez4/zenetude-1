<?php
	class AccountController {


		/**
			* Test if the mail address given by the user exists in the database.
		**/
		public function	controlRecoverPassword() {
			$accountModel = new AccountModel();
			$accountView = new AccountView();			
			$_POST['mail'] = htmlspecialchars($_POST['mail']);
			
			if($accountModel -> getDataUser('*', $_POST['mail'])) {
				$accountModel -> recoverPassword($_POST['mail']);
			}
			else
				$accountView -> showMessage("Votre adresse e-mail est incorrecte.");
		}

        public function controlGestion(){
            $pageController = new PageController();
            $erreur = $pageController -> uploadPhoto();
            $erreur2 = $pageController -> uploadTrombi();
            $erreur3 = $pageController -> modifyPassword();

            if ($erreur == 0 && $erreur2 == 0 && $erreur3 == 0) {
                $accountModel = new AccountModel();
                $accountModel->uploadInfoUser();
            }
            else{
                header('Location: gestion.php');
            }
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
                if ($userResult = $accountModel -> getUserByPassword($_POST['mail'],  $_POST['pass'])) {
                    $_SESSION['infoUser'] = $userResult;

                    if ($_SESSION['infoUser']['user_type'] == 'RF') {
                        $rfResult = $accountModel->getDataTrainingManager('*', $_SESSION['infoUser']['user_id']);
                        $_SESSION['infoRF'] = $rfResult;
                    } else {
                        $studentResult = $accountModel->getDataStudent('*', $_SESSION['infoUser']['user_id']);
                        $_SESSION['infoStudent'] = $studentResult;
                        $trainingResult = $accountModel->getTrainingInformationsForUser('*', $_SESSION['infoUser']['user_id']);
                        $_SESSION['infoTraining'] = $trainingResult;
                    }
                    $accountView->showMessage(null, "ok", "index.php");
                }
				else{
					$accountView -> showMessage("Erreur d'authentification !");
                }
            }
        }
		

		/**
			* Test if informations given by the user before create a new user in the database. 
		**/
        public function controlInscription() {
            $accountView = new AccountView();
            if(!empty($_POST['mail']))
            {
                $accountModel = new AccountModel();

                $_POST["mail"] = htmlspecialchars($_POST["mail"]);
                $_POST["passe"] = htmlspecialchars($_POST["passe"]);
                $_POST["passe2"]= htmlspecialchars($_POST["passe2"]);

                if($_POST["passe"] !=  $_POST["passe2"])
                {
                    $accountView->showMessage("Mot de passe non identique");
                }
                else if(empty($_POST["passe"]) && empty($_POST["passe2"])){
                    $accountView->showMessage("Veuillez renseigner les deux champs mot de passe");
                }
                else if($userR= $accountModel ->getUserEmail($_POST['mail']))
                {
                    $accountView->showMessage("Adresse email existe déjà.");
                }
                else{
                    //$_POST["passe"] = sha1($_POST["passe"]);
                    $accountModel->addUser($_POST["mail"], $_POST["firstname"], $_POST["lastname"], sha1($_POST["passe"]));
                    $accountModel->sendEmail($_POST["mail"], $_POST["passe"]);
                }
            }
            else{
                $accountView->showMessage("Veuillez remplir le champs adresse email.");
            }
        }
	}