<?php


    session_start();
	


    if ($_POST['deco'] == "deco"){
        session_destroy();

        header('Location: index.php?logout=true');

    }
?>
<!doctype html>
<html lang="fr">
<head>
    <title>Zenetude</title>
    <link rel="stylesheet" href="../../vendor/css/bootstrap.css">
    <link rel="stylesheet" href="../../css/index.css">
    

    <meta charset="utf-8">
</head>
<body>
<div class="container-fluid">

    <div class="nav row">
        <div class='col-md-3 logo'>
            <a href='./index-connecte.php'>
                <img src='../../img/logo.jpg' alt='Logo'/>
            </a>
        </div>
        <div class='col-md-9 titre'>
            <h1>Bannière ZENETUDE</h1>
        </div>
    </div>

    <div class='col-md-8 content'>
        <h2>Lorem Ipsum</h2>
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

        <div class='row'>
            <div class="col-md-4 profil">
                <img src='../../img/avatar.png' alt="Avatar"/>
            </div>
            <div class="col-md-8 profil">
                <ul>
                    <li>
                        <a class='lien' href='profil.php'>Pseudo</a>
                    </li>
                    <li>
                        <?php if (isset($_SESSION)){ echo $_SESSION['nom']." ".$_SESSION['prenom']; }else{ echo "Prénom Nom"; } ?>
                    </li>
                    <li>
                        <?php if (isset($_SESSION)){ echo 'Groupe '. $_SESSION['class']; } ?>
                    </li>
                    <li class='deco'>
                        <form action="" method="post" id="deconnexion">
                            <input hidden="hidden" type="text" name="deco" value="deco">
                            <a onclick="deconnect()">Déconnexion</a>
                        </form>
                    </li>
                </ul>
            </div>
        </div>

        <div class="pedago">
            <a href="trombi.php">Documents pédagogiques</a>
        </div>
        <div class="calendrier">
            <img src="../../img/calendrier.jpg" alt='Calendrier'/>
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
