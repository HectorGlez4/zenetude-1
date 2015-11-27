<!doctype html>
<html lang="fr">
    <head>
        <title>ZenEtude</title>
        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" href="../css/index.css">

        <meta charset="utf-8">
    </head>
    <body>
        <div class="container-fluid">

            <div class="nav row">
                <div class='col-md-3 logo'>
                   <a href='../index.html'>
                    <img src='../img/logo.jpg' alt='Logo'/>
                    </a>
                </div>
                <div class='col-md-9 titre'>
                    <h1>Bannière ZENETUDE</h1>
                </div>
            </div>

            <div class='col-md-8 content'>
           	<form method="post" action="./recuperation.php">
			<label for="mail">Entrez votre adresse mail : </label><input type="email" id="mail" name="mail" />
			<input type="submit" name="submit" value ="Envoyer" />
		</form> 
	   	<?php
			ini_set('display_errors', '1');	
			if(isset($_POST['mail'])) {
				include_once('../php/controller/AccountController.php');
				include_once('../php/model/AccountModel.php');
				include_once('../php/view/AccountView.php');
				include_once('../PHPMailer/PHPMailerAutoload.php');
                include_once( '../php/model/db.php');
				$accountController = new AccountController();
				$accountController -> controlRecoverPassword();
			}
		?>
	   </div>
            <div class='footer'>
                <p>
                    ZENETUDE - Projet réalisé par les étudiants de LP SIL DA2I 2015/2016
                </p>

            </div>
        </div>
    </body>
</html>

