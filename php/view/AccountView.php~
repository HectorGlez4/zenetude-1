<?php
	/**
		* Show messages. 
	**/
	class AccountView {
		public function showMessage($num) {
			if($num == 1)
				echo "Votre adresse e-mail est incorrecte. ";
            else if($num ==2)
                echo "Une erreur est survenue. ";
            else if($num ==3)
                echo "Votre mot de passe a été réinitialisé. Un message contenant le nouveau mot de passe vous à été envoyé.";
            else if($num ==4)
                echo "Mot de passe non identique.";
			else if($num ==5)
                header('Location: index.php?erreur=true');	
		}
	}
