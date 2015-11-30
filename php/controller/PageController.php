<?php
	class PageController {


		public function controlProfilForm() {
			
		}


		/**
			* Test if a session exists before show the index's description. 
		**/
		public function controlIndexDescription() {
			$pageView = new PageView();
			if(isset($_SESSION['nom']))
				$pageView -> showIndexDescription(true);
			else
				$pageView -> showIndexDescription(false);
		}


		/**
			* Test if a session exists before show the header. 
		**/
		public function controlHeader() {
			$pageView = new PageView();
			if(isset($_SESSION['nom']))
				$pageView -> showHeader(true);
			else
				$pageView -> showHeader(false);
		}


		/**
			* Test if a session exists before show the static menu. 
		**/
		public function controlMenu() {
			$pageView = new PageView();
			if(isset($_SESSION['nom'])) {
				$_SESSION['nom'] = htmlspecialchars($_SESSION['nom']);
				$_SESSION['prenom'] = htmlspecialchars($_SESSION['prenom']);
				if(isset ($_SESSION['class']))
					$_SESSION['class'] = htmlspecialchars($_SESSION['class']);
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
			if(isset($_SESSION['nom'])) {
				$_SESSION['nom'] = htmlspecialchars($_SESSION['nom']);
				$_SESSION['prenom'] = htmlspecialchars($_SESSION['prenom']);
				if(isset($_SESSION['class']) && !empty($_SESSION['class'])) {
					$_SESSION['class'] = htmlspecialchars($_SESSION['class']);
					$pageView -> showScrollMenu(true, false);
				}
				else 
					$pageView -> showScrollMenu(true, true);
			}	
			else 
				$pageView -> showScrollMenu(false);
		}
	}
