<?php
	class AccountModel {
		public  function getData($param, $mail) {
			$db = new PDO('mysql:host=localhost; dbname=zenetude', 'root', 'root');			
			
			$request = $db -> prepare('SELECT :param FROM users WHERE user_instituteemail = :mail');
			$request -> execute(array('param' => $param, 'mail' => $mail));
			$result = $request -> fetch();
			if($param != '*')
				return $result[$param];
			else
				return $result;
		}

		public function recoverPassword($mail) {
			$string = "";
			$chaine = "abcdefghijklmnpqrstuvwxy";
			srand((double)microtime()*1000000);
			for($i=0; $i<9; $i++) {
				$string .= $chaine[rand()%strlen($chaine)];	
		        }
			
			$db = new PDO('mysql:host=localhost; dbname=zenetude', 'root', 'root');			
			
			$request = $db -> prepare('UDAPTE user_password SET :password FROM users WHERE user_instituteemail = :mail');
			$request->execute(array('user_password' => $string, 'mail' => $mail));
			$body = "
				<h1>Réinitialisation du mot de passe</h1>
				<hr />
				<p>Bonjour, votre mot de passe à été réitialisé.</p>
				<hr />
				<p>Ce message à été généré autoùatiquement. Merci de ne pas y répondre.</p>
			";

			$mailer = new PHPMailer();
		        $mailer->IsSMTP();
		        $mailer->SMTPDebug = 0;
		        $mailer->SMTPAuth = true;
		        $mailer->SMTPSecure = 'ssl';
		        $mailer->Host = "smtp.gmail.com";
		        $mailer->Port = 465;
		        $mailer->IsHTML(true);
			$mailer->charSet = "UTF-8"; 	
		        $mailer->Username = "cedric.vigne11@gmail.com";
		        $mailer->Password = "paxwwwww";
		        $mailer->SetFrom("cedric.vigne11@gmail.com");
		        $mailer->AddAddress($mail ,utf8_encode(""));
		        $mailer->Subject ="Subject: =?UTF-8?B?".base64_encode("Réinitialisation du mot de passe | Zenetude")."?=";
		        $mailer->Body = $body;
		        if(!$mailer->Send())
		         	echo "Une erreur est survenue tu l'as dans le cul :) ";
		        else
                        	echo "Message has been sent";
		}
	}

