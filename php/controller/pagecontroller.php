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
			if(isset($_SESSION['infoUser']) && $_SESSION['infoUser']['user_type'] == 'RF')
				return true;
			else
				return false;
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
			if (isset($_FILES['student_avatar'])) {
	            $maxsize = 5000000000;
	            $maxwidth = 1024;
	            $maxheight = 1024;
	            $extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
	            $extension_upload = strtolower(  substr(  strrchr($_FILES['student_avatar']['name'], '.')  ,1)  );
	            //$image_sizes = getimagesize($_FILES['student_avatar']['tmp_name']);

	            if ($_FILES['student_avatar']['error'] > 0) echo "Erreur lors du transfert";
	            if ($_FILES['student_avatar']['size'] > $maxsize) echo "Le fichier est trop gros";
	            if ( in_array($extension_upload,$extensions_valides) ) echo "Extension correcte";
	            //if ($image_sizes[0] > $maxwidth OR $image_sizes[1] > $maxheight) echo "Image trop grande";

	            $fichier='../../img/avatar/'.uniqid().".$extension_upload";
	            $session = $_SESSION['infoUser']['user_id'];
	            $resultat = move_uploaded_file($_FILES['student_avatar']['tmp_name'],$fichier);
	            if ($resultat) {
	            	$db = connect();
	            	$update = $db->query("UPDATE Student SET student_avatar = '$fichier' where user_id = '$session'");
	            	$_SESSION['infoStudent']['student_avatar'] = $fichier;
	            }
        	}
        }

        public function uploadTrombi(){
			if (isset($_FILES['student_trombi'])) {
	            $maxsize = 5000000000;
	            $maxwidth = 1024;
	            $maxheight = 1024;
	            $extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
	            $extension_upload = strtolower(  substr(  strrchr($_FILES['student_trombi']['name'], '.')  ,1)  );
	            //$image_sizes = getimagesize($_FILES['student_trombi']['tmp_name']);

	            if ($_FILES['student_trombi']['error'] > 0) echo "Erreur lors du transfert";
	            if ($_FILES['student_trombi']['size'] > $maxsize) echo "Le fichier est trop gros";
	            if ( in_array($extension_upload,$extensions_valides) ) echo "Extension correcte";
	            //if ($image_sizes[0] > $maxwidth OR $image_sizes[1] > $maxheight) echo "Image trop grande";

	            $fichier='../../img/trombinoscope/'.uniqid().".$extension_upload";
	            $session = $_SESSION['infoUser']['user_id'];
	            $resultat = move_uploaded_file($_FILES['student_trombi']['tmp_name'],$fichier);
	            if ($resultat) {
	            	$db = connect();
	            	$update = $db->query("UPDATE Student SET student_trombi = '$fichier' where user_id = '$session'");
	            	$_SESSION['infoStudent']['student_trombi'] = $fichier;
	            }
        	}
        }

		public function modifyPassword() {
			include_once('./accountview.php');
			$accountView = new AccountView();
			if (!empty($_POST['old_user_password']) && !empty($_POST['new_user_password']) && !empty($_POST['confirm_new_user_password'])) {
				$session = $_SESSION['infoUser']['user_id'];
				$db = connect();
				$request = $db->prepare('SELECT user_password FROM User WHERE user_id = '.$session);
	      		$request->execute();
	        	$mdp = $request->fetch();


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
					$update = $db->query("UPDATE User SET user_password = '$crypt_new_user_password' where user_id = '$session'");
				}
			}
		}
	}
