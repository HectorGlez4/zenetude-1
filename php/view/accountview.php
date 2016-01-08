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
            
            $retour['msg'] = $msg;
            $retour['send'] = $send;
            $retour['redirection'] = $redirection;
			$_SESSION['msg']=true;
            echo json_encode($retour);
			
		}
	}
