<?php
	class PageController {

        public function controlConnexion() {
            if(!isset($_SESSION['infoUser'])) {
                echo '<script>document.location.href="../view/index.php"</script>';
                exit;
            }
        }


		public function controlProfilInformations() {
			$pageView = new PageView();
			$result = 0;
			if(isset($_SESSION['infoUser']) && $_SESSION['infoUser']['user_type'] == 'RF'){
				$accountmodel = new AccountModel();
				$result = $accountmodel -> nbDocuments();
				$pageView -> showProfilInformations($_SESSION, true, $result);
			}
			else
				$pageView -> showProfilInformations($_SESSION, false, $result);

		}

		public function controlGestion(){
			$pageView = new PageView();
			$accountmodel = new AccountModel();
			if(isset($_SESSION['infoUser']) && $_SESSION['infoUser']['user_type'] == 'RF') {
				$rf = true;
				$result4 = $accountmodel->getAllInfoUser();
				$pageView -> showGestion($rf, null, null, $result4);
			}
			else {
				$rf = false;
				$result = $accountmodel->getInfoStudent();
				$result2 = $accountmodel->getDescritpionTraining();
				$result4 = $accountmodel->getAllInfoUser();
				$pageView -> showGestion($rf, $result, $result2, $result4);
			}
		}

		public function controlContact(){
			$pageView = new PageView();
			if(isset($_SESSION['infoUser']) && $_SESSION['infoUser']['user_type'] == 'RF')
				echo '<script>document.location.href="../view/index.php"</script>';
		}

		public function controlShowContact(){
			$pageView = new PageView();
			$accountmodel = new AccountModel();
			$result = $accountmodel -> infoMyTrainingManager();
			$pageView -> showContact($_SESSION, $result);
		}

		public function controlAdministration(){
            $accountmodel = new AccountModel();
            $result = $accountmodel -> isAdministrator();
			if(!(isset($_SESSION['infoUser']) && isset($result[0])))
				echo '<script>document.location.href="../view/index.php"</script>';				
		}

		public function controlShowAdministration(){
			$pageView = new PageView();
			$accountmodel = new AccountModel();
			$allUser = $accountmodel -> recupAllUser();
			//$allInfoUserSelect = $accountmodel -> recupAllInfoUserSelect();

			$pageView -> showAdministration($allUser/*, $allInfoUserSelect*/);
		}

		public function controlDocuments(){
			$pageView = new PageView();
			if(isset($_SESSION['infoUser']) && $_SESSION['infoUser']['user_type'] == 'Etudiant')
				echo '<script>document.location.href="../view/index.php"</script>';
			else{
				$accountmodel = new AccountModel();
				$result = $accountmodel -> nbDocuments();
				if($result[0] == 0)
					echo '<script>document.location.href="../view/index.php"</script>';
			}	
		}


		/**
			* Test if a session exists before show the index's description. 
		**/
		public function controlIndexDescription() {
			$pageView = new PageView();
			if(isset($_SESSION['infoUser']))
				$pageView -> showIndexDescription(true);
			else
				$pageView -> showIndexDescription(false);
		}


		/**
			* Test if a session exists before show the header. 
		**/
		public function controlHeader() {
			$pageView = new PageView();
			if(isset($_SESSION['infoUser']))
				$pageView -> showHeader(true);
			else
				$pageView -> showHeader(false);
		}


		/**
			* Test if a session exists before show the static menu. 
		**/
		public function controlMenu() {
			$pageView = new PageView();
			if(isset($_SESSION['infoUser'])) {
				if(isset ($_SESSION['class']))
				$pageView -> showMenu(true);
			}
				
			else 
				$pageView -> showMenu(false);
		}


		/**
			* Test if a session exists before show the dynamic menu bar. 
		**/
		public function controlDynamicMenu() {
			$pageView = new PageView();
			if(isset($_SESSION['infoUser'])) {
				if($_SESSION['infoUser']['user_type'] == 'RF') {
					$pageView -> showScrollMenu(true, $_SESSION, true);
				}
				else 
					$pageView -> showScrollMenu(true, $_SESSION, false);
			}	
			else 
				$pageView -> showScrollMenu(false, $_SESSION);
		}

		public function uploadPhoto(){
			$accountmodel = new AccountModel();
			$accountView = new AccountView();
			$erreur = 0;
			if (isset($_FILES['student_avatar'])) {
				//$accountView->showMessage("on passe par la");
	            $maxsize = 2097152;
				$extensions_valides =  array('gif','png' ,'jpg', 'jpeg');
				$filename = $_FILES['student_avatar']['name'];
				$ext = pathinfo($filename, PATHINFO_EXTENSION);
				$extension_upload = strtolower(  substr(  strrchr($_FILES['student_avatar']['name'], '.')  ,1)  );

				if ($_FILES['student_avatar']['error'] > 0) {
					//$accountView -> showMessage("C'est l'erreur 1.");
					//$erreur += 1;
					echo 'error';
				}
				else if (($_FILES['student_avatar']['size'] >= $maxsize) || ($_FILES["student_avatar"]["size"] == 0)) {
					//$accountView -> showMessage("Le poids de l'avatar est trop lourd (max : 2 Mo).");
					//$erreur += 1;
					echo 'erreur size';
				}
				else if (!in_array($ext,$extensions_valides)) {
					//$accountView -> showMessage("Mauvaise extension pour l'avatar.");
					//$erreur += 1;
					echo 'erreur extension';
				}
				else {
					//$accountView->showMessage("on passe par la", "ok", "gestion.php");
					$fichier='../../img/avatar/'.$_SESSION['infoStudent']['student_id'].".$extension_upload";
					$session = $_SESSION['infoUser']['user_id'];
					$resultat = move_uploaded_file($_FILES['student_avatar']['tmp_name'],$fichier);
					if ($resultat) {
						$accountmodel -> addAvatar($fichier, $session);
						$_SESSION['infoStudent']['student_avatar'] = $fichier;
					}
				}
        	}

			return $erreur;
        }

        public function uploadTrombi(){
        	$accountmodel = new AccountModel();
			//$accountView = new AccountView();
			$erreur = 0;
			if (isset($_FILES['student_trombi'])) {
	            $maxsize = 2097152;
				$extensions_valides =  array('png' ,'jpg', 'jpeg');
				$filename = $_FILES['student_trombi']['name'];
				$ext = pathinfo($filename, PATHINFO_EXTENSION);
				$extension_upload = strtolower(  substr(  strrchr($_FILES['student_trombi']['name'], '.')  ,1)  );

				if ($_FILES['student_trombi']['error'] > 0) {
					//echo 'error';
				} else if (($_FILES['student_trombi']['size'] >= $maxsize) || ($_FILES["student_trombi"]["size"] == 0)) {
					//$accountView -> showMessage("Le poids de la photo du trombinoscope est trop grosse (max : 2 Mo).");
					echo 'erreur size';
					$erreur += 1;
				}
				else if (!in_array($ext,$extensions_valides)) {
					//$accountView -> showMessage("Mauvaise extension pour la photo du trombinoscope.");
					echo 'erreur extension';
					$erreur += 1;
				}

				else {
		            $fichier='../../img/trombi/'.$_SESSION['infoStudent']['student_id'].".$extension_upload";
		            $session = $_SESSION['infoUser']['user_id'];
		            $resultat = move_uploaded_file($_FILES['student_trombi']['tmp_name'],$fichier);
		            if ($resultat) {
		            	$accountmodel -> addTrombi($fichier, $session);
		            	$_SESSION['infoStudent']['student_trombi'] = $fichier;
		            }
	            }
        	}
			return $erreur;
        }

		public function modifyPassword() {
			$accountView = new AccountView();
			$accountmodel = new AccountModel();
			$erreur = 0;
			include_once('./accountview.php');
			if (!empty($_POST['old_user_password']) && !empty($_POST['new_user_password']) && !empty($_POST['confirm_new_user_password'])) {
				$session = $_SESSION['infoUser']['user_id'];

	        	$mdp = $accountmodel -> getUserPassword($session);

				$old_user_password=$_POST['old_user_password'];
				$new_user_password=$_POST['new_user_password'];
				$confirm_new_user_password=$_POST['confirm_new_user_password'];
				$crypt_old_user_password = sha1($old_user_password);
				if ($crypt_old_user_password != $mdp[0]) {
					//$accountView->showMessage("Mot de passe actuel incorrect.");
					$erreur += 1;
				}
				else if ($new_user_password != $confirm_new_user_password) {
					//$accountView->showMessage("Mots de passe non identiques.");
					$erreur += 1;
				}
				else {
					$crypt_new_user_password = sha1($new_user_password);
					//$accountmodel -> updateUserPassword($crypt_new_user_password, $session);
				}
			}
			else {
				if(!empty($_POST['old_user_password']) && empty($_POST['new_user_password']) && empty($_POST['confirm_new_user_password'])){
					//$accountView->showMessage("Veuillez renseigner le nouveau mot de passe");
					$erreur += 1;
				}
				else if(!empty($_POST['old_user_password']) && (empty($_POST['new_user_password']) || empty($_POST['confirm_new_user_password']))){
					//$accountView->showMessage("Veuillez renseigner le nouveau mot de passe et le confirmer");
					$erreur += 1;
				}
				else if(empty($_POST['old_user_password']) && !empty($_POST['new_user_password']) && !empty($_POST['confirm_new_user_password'])){
					//$accountView->showMessage("Veuillez renseigner l'ancien mot de passe");
					$erreur += 1;
				}
			}
			return $erreur;
		}
	}