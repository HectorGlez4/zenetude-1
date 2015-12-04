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

		public function controlAdmin(){
            $accountmodel = new AccountModel();
            $result = $accountmodel -> isAdministrator();
			if(!(isset($_SESSION['infoUser']) && isset($result[0])))
				echo '<script>document.location.href="../view/index.php"</script>';				
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
	}
