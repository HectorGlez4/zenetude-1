<?php
	class AccountController {
		public function	controlRecoverPassword() {
			$accountModel = new AccountModel();
			$accountView = new AccountView();			
		
			$mail = htmlspecialchars($_POST['mail']);
			
			if($accountModel -> getData('*', $mail) !='' ) {
				$accountModel -> recoverPassword($mail);
			}
			else
				$accountView -> showErrors(1);
		}
	}
