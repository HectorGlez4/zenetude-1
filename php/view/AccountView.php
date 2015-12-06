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
            else if($num ==3){
                echo "Votre mot de passe a été réinitialisé. Un message contenant le nouveau mot de passe vous à été envoyé.";
            }
            else if($num ==4){
            	//$retour['send'] = "ok";
            	//$retour['msg'] = "Mot de passe non identique";
            	//echo json_encode($retour);
                header('Location: inscription.php?mdp=true');
            }
			else if($num ==5)
                header('Location: index.php?erreur=true');
            else if($num ==6)
            	header('Location: inscription.php?erreur=true');
            /*else if($num == 7)
            	header('Location: inscription.php?error=true');*/
            	//echo utf8_encode("<script>alert('Votre adresse e-mail existe déjà.');</script>");
                //echo "Votre adresse e-mail existe d&eacutej&agrave.";
		}
	}
