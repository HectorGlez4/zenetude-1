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
                if ($userResult = $accountModel -> getUserPassword($_POST['mail'],  $_POST['pass'])){
                    session_start();
                    $_SESSION['infoUser'] = $userResult;
                 
                   	if($_SESSION['infoUser']['user_type'] == 'RF') {
                   		$rfResult = $accountModel->getDataTrainingManager('*', $_SESSION['infoUser']['user_id']);
                   		$_SESSION['infoRF'] = $rfResult;
                   	}
                   	else {
                   		$studentResult = $accountModel->getDataStudent('*', $_SESSION['infoUser']['user_id']);
						$_SESSION['infoStudent'] = $studentResult;
                        $trainingResult = $accountModel->getTrainingInformationsForUser('description', $_SESSION['infoUser']['user_id']);
                        $_SESSION['infoTraining'] = $trainingResult;
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
            $accountView = new AccountView();
            if(!empty($_POST['mail']))
            {
                $accountModel = new AccountModel();

                $_POST["mail"] = htmlspecialchars($_POST["mail"]);
                $_POST["passe"] = htmlspecialchars($_POST["passe"]);
                $_POST["passe2"]= htmlspecialchars($_POST["passe2"]);

                if($_POST["passe"] !=  $_POST["passe2"])
                {
                    $accountView->showMessage(4);
                }
                else if($userR= $accountModel ->getUserEmail($_POST['mail']))
                {
                    $accountView->showMessage(6);
                }
                else{
                    //$_POST["passe"] = sha1($_POST["passe"]);
                    $accountModel->addUser($_POST["mail"], sha1($_POST["passe"]));
                    $accountModel->sendEmail($_POST["mail"], $_POST["passe"]);
                    header('Location: index.php');
                }

            }
            else{
                $accountView->showMessage(7);
            }
        }
	}
