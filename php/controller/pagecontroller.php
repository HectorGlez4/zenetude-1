<?php
	class PageController {

        /**
         * Test if the visitor is connected, Else, he's redirected to the index.
         **/
        public function controlConnexion() {
            if(!isset($_SESSION['infoUser'])) {
                echo '<script>document.location.href="../view/index.php"</script>';
                exit;
            }
        }

        /**
         * Test if the visitor is connected and shows the form of modification for a training manager or a student.
         **/
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

        /**
         * Test if the visitor is connected and if the visitor is a training manager.
         * @return bool
         */
		public function controlGestion() {
			$pageView = new PageView();
			if(isset($_SESSION['infoUser']) && $_SESSION['infoUser']['user_type'] == 'RF')
				return true;
			else
				return false;
		}

        /**
         * Test if the mail address given by the user is connected and if he is a training manager. if yes, the visitor is redirected to the index page.
         **/
		public function controlContact(){
			$pageView = new PageView();
			if(isset($_SESSION['infoUser']) && $_SESSION['infoUser']['user_type'] == 'RF')
				echo '<script>document.location.href="../view/index.php"</script>';
		}

        /**
         * Show the possible contacts.
         **/
		public function controlShowContact(){
			$pageView = new PageView();
			$accountmodel = new AccountModel();
			$result = $accountmodel -> infoMyTrainingManager();
			$pageView -> showContact($_SESSION, $result);
		}

        /**
         * Test if the visitor is connected and if he's an administrator.
         **/
		public function controlAdministration(){
            $accountmodel = new AccountModel();
            $result = $accountmodel -> isAdministrator();
			if(!(isset($_SESSION['infoUser']) && isset($result[0])))
				echo '<script>document.location.href="../view/index.php"</script>';				
		}

        /**
         * Show the administration.
         **/
		public function controlShowAdministration(){
			$pageView = new PageView();
			$accountmodel = new AccountModel();
			$allUser = $accountmodel -> recupAllUser();
			//$allInfoUserSelect = $accountmodel -> recupAllInfoUserSelect();

			$pageView -> showAdministration($allUser/*, $allInfoUserSelect*/);
		}

        /**
         * Test if the visitor is connected and if he's a training manager and return the documents. Else, return to the index page.
         **/
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
        * Test if a session exists before show the index's descriptions.
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

        /**
         * Add an avatar in the database.
         **/
		public function uploadPhoto(){
			$accountmodel = new AccountModel();
			if (isset($_FILES['student_avatar'])) {
	            $maxsize = 2097152;
				$extensions_valides =  array('gif','png' ,'jpg', 'jpeg');
				$filename = $_FILES['student_avatar']['name'];
				$ext = pathinfo($filename, PATHINFO_EXTENSION);
				$extension_upload = strtolower(  substr(  strrchr($_FILES['student_avatar']['name'], '.')  ,1)  );

			if ($_FILES['student_avatar']['error'] > 0) {
					echo 'error';
				} elseif (($_FILES['student_avatar']['size'] >= $maxsize) || ($_FILES["student_avatar"]["size"] == 0)) {
					echo 'erreur size';
				}
				elseif (!in_array($ext,$extensions_valides)) {
					echo 'erreur extension';
				}

				else {
		            $fichier='../../img/avatar/'.$_SESSION['infoStudent']['student_id'].".$extension_upload";
		            $session = $_SESSION['infoUser']['user_id'];
		            $resultat = move_uploaded_file($_FILES['student_avatar']['tmp_name'],$fichier);
		            if ($resultat) {
		            	$accountmodel -> addAvatar($fichier, $session);
		            	$_SESSION['infoStudent']['student_avatar'] = $fichier;
		            }
	            }
        	}
        }

        /**
         * Upload a group photo to the database.
         **/
        public function uploadTrombi(){
        	$accountmodel = new AccountModel();
			if (isset($_FILES['student_trombi'])) {
	            $maxsize = 2097152;
				$extensions_valides =  array('gif','png' ,'jpg', 'jpeg');
				$filename = $_FILES['student_trombi']['name'];
				$ext = pathinfo($filename, PATHINFO_EXTENSION);
				$extension_upload = strtolower(  substr(  strrchr($_FILES['student_trombi']['name'], '.')  ,1)  );

			if ($_FILES['student_trombi']['error'] > 0) {
					echo 'error';
				} elseif (($_FILES['student_trombi']['size'] >= $maxsize) || ($_FILES["student_trombi"]["size"] == 0)) {
					echo 'erreur size';
				}
				elseif (!in_array($ext,$extensions_valides)) {
					echo 'erreur extension';
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
        }

        /**
         * Tests before modify the password.
         **/
		public function modifyPassword() {
			$accountView = new AccountView();
			$accountmodel = new AccountModel();
			include_once('./accountview.php');
			if (!empty($_POST['old_user_password']) && !empty($_POST['new_user_password']) && !empty($_POST['confirm_new_user_password'])) {
				$session = $_SESSION['infoUser']['user_id'];

	        	$mdp = $accountmodel -> getUserPassword($session);

				$old_user_password=$_POST['old_user_password'];
				$new_user_password=$_POST['new_user_password'];
				$confirm_new_user_password=$_POST['confirm_new_user_password'];
				$crypt_old_user_password = sha1($old_user_password);
				if ($crypt_old_user_password != $mdp[0])
					$accountView->showMessage("Mot de passe actuel incorrect.");
				else if ($new_user_password != $confirm_new_user_password)
					$accountView->showMessage("Mot de passe non identique");
				else {
					$crypt_new_user_password = sha1($new_user_password);
					$accountmodel -> updateUserPassword($crypt_new_user_password, $session);
				}
			}
		}
	}