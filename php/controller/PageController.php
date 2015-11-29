<?php
	class PageController {
		public function controlIndexDescription() {
			$pageView = new PageView();
			if(isset($_SESSION['nom']))
				$pageView -> showIndexDescription(true);
			else
				$pageView -> showIndexDescription(false);
		}

		public function controlHeader() {
			$pageView = new PageView();
			if(isset($_SESSION['nom']))
				$pageView -> showHeader(true);
			else
				$pageView -> showHeader(false);
		}

		public function controlMenu() {
			$pageView = new PageView();
			if(isset($_SESSION['nom'])) {
				$_SESSION['nom'] = htmlspecialchars($_SESSION['nom']);
				$_SESSION['prenom'] = htmlspecialchars($_SESSION['prenom']);
				$_SESSION['class'] = htmlspecialchars($_SESSION['class']);
				$pageView -> showMenu(true);
			}
				
			else 
				$pageView -> showMenu(false);
		}

		public function controlScrollMenu() {
			$pageView = new PageView();
			if(isset($_SESSION['nom'])) {
				$_SESSION['nom'] = htmlspecialchars($_SESSION['nom']);
				$_SESSION['prenom'] = htmlspecialchars($_SESSION['prenom']);
				$_SESSION['class'] = htmlspecialchars($_SESSION['class']);
				$pageView -> showScrollMenu(true);
			}	
			else 
				$pageView -> showScrollMenu(false);
		}
	}
