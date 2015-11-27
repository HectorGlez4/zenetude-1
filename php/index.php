<?php
	if (isset($_GET['erreur'])){
		echo "<script>alert('Erreur d\'authentification !');</script>";
	}

	if (isset($_GET['logout'])){
		echo "<script>alert('Déconnexion !');</script>";
	}


?>
<!doctype html>
<html lang="fr">
    <head>
        <title>Zenetude</title>
        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" href="../css/index.css">
        <meta charset="utf-8">
	<script src="../js/fonctions.js"></script>+
    </head>
    <body>

        <div class="container-fluid">

            <div class="nav row">
                <div class='col-md-3 logo'>
                    <img src="../img/logo.jpg" alt="Logo"/>
                </div>
                <div class='col-md-9 titre'>
                    <h1>Bannière ZENETUDE</h1>
                </div>
            </div>

            <div class='col-md-8 content'>
                <h2>Salut LP SIL</h2>
                <p>

                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
                <h2>Lorem Ipsum</h2>
                <p>

                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptat Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptat
                </p>
            </div>
            <div class="col-md-4 aside">
                <div class="connexion">
                    <center>
                    <form onsubmit="return verif(this);" method="POST" action="../maquette/connexion.php">
                        <p> Connectez-vous ! </p>
                            <label for="pseudo">Pseudo </label>
                            <input class='cadre' type="text" name="pseudo" id="pseudo" />
                        </p>

                        <p>
                            <label for="pass">Mot de passe </label>
                            <input class='cadre' type="password" name="pass" id="pass" style="margin-right: 35px;"/>
                        </p>
                        <p>
                            <input type="submit" value="Connexion" />
                        </p>
                        <a href="./web/recuperation.php">Mot de passe oublié ?</a>
                        <a href="./web/inscription.php">Inscrivez-vous !</a>
                    </form>
                    ou<br />




		<?php
			               
		      include('view/socialmedia.php'); 
		?>


                    
                    </center>
                </div>
                <div class="pedago">
                    <a href="../web/trombi.html">Documents pédagogiques</a>
                </div>
                    <div class="calendrier">
                        <img src="../img/calendrier.jpg" alt='Calendrier'/>
                </div>
            </div>
            <div class='footer'>
                <p>
                    ZENETUDE - Projet réalisé par les étudiants de LP SIL DA2I 2015/2016
                </p>

            </div>
        </div>
    </body>
</html>