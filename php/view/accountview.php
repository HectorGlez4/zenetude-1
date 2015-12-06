<?php
	/**
		* Show messages. 
	**/
	class AccountView {
		public function showMessage($msg, $send = "", $redirection ="") {
			// Les messages d"erreurs ci-dessus s'afficheront si Javascript est désactivé
    		header('Cache-Control: no-cache, must-revalidate');
   			header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
    		header('Content-type: application/json');
            $retour['msg'] = $msg;/*"Une erreur est survenue !";*/
            $retour['send'] = $send;
            $retour['redirection'] = $redirection;
            echo json_encode($retour);
			
            /*if($num == 1){
				echo "Votre adresse e-mail est incorrecte. ";
			}
            else if($num ==2){
                $retour['msg'] = $msg;
                echo json_encode($retour);
            }
            else if($num ==3){
                $retour['msg'] = "Votre mot de passe a été réinitialisé. Un message contenant le nouveau mot de passe vous à été envoyé.";
                $retour['send'] = "ok";
                echo json_encode($retour);
            }
            else if($num ==4){
            	$retour['msg'] = "Mot de passe non identique";
            	echo json_encode($retour);
            }
			else if($num ==5){
                header('Location: index.php?erreur=true');
			}
            else if($num ==6){
            	$retour['msg'] = "Adresse email existe déjà.";
            	echo json_encode($retour);
            }
            else if($num ==7){
                echo "Mot de passe actuel incorrect.";
            }
            else if($num ==8){
                $retour['send'] = "ok";
                $retour['msg'] = "Inscription terminée.";
                echo json_encode($retour);
            }*/
		}
	}
