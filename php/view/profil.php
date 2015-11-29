<!doctype html>
<html lang="fr">
    <head>
        <title>Zenetude</title>
        <link rel="stylesheet" href="../../css/bootstrap.css">
        <link rel="stylesheet" href="../../css/index.css">
        <link rel="stylesheet" href="../../css/profil.css">

        <meta charset="utf-8">
    </head>
    <body>
        <div class="container-fluid">

            <div class="nav row">
                <div class='col-md-3 logo'>
                    <a href='./index-connecte.php'>
                        <img src='../img/logo.jpg' alt='Logo'/>
                    </a>
                </div>
                <div class='col-md-9 titre'>
                    <h1>Bannière ZENETUDE</h1>
                </div>
            </div>

            <div class='col-md-8 content'>

                <div class='row profil-main'>
                    <div class='col-md-4 col-md-offset-2 image'>
                        <img src='../img/avatar.png' alt="Avatar"/>
                    </div>
                    <div class='col-md-4 liste'>
                        <h2>Prénom Nom</h2>
                        <div class='renseignements'>
                            <ul>
                                <li>
                                    <label>Sexe :</label>
                                    <input type= "radio" name="Sexe" value="Homme" checked> Homme
                                    <input type= "radio" name="Sexe" value="Femme"> Femme
                                </li>
                                <li>
                                    Formation :
                                </li>
                                <li>
                                    Classe :
                                </li>
                                <li>
                                    Date de naissance :
                                </li>
                                <li>
                                    Lieu de naissance :
                                </li>
                                <li>
                                    Mail :
                                </li>
                                <li>
                                    Télephone :
                                </li>
                                <li>
                                    Adresse personnelle :
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                </div>

            </div>
            <div class="col-md-4 aside">

                <div class='row'>
                    <div class="col-md-4 profil">
                        <img id='avatar' src='../img/avatar.png' alt="Avatar"/>
                    </div>
                    <div class="col-md-8 profil">
                        <ul>
                            <li>
                                <a class='lien' href='profil.php'>Pseudo</a>
                            </li>
                            <li>
                                Prénom Nom 
                            </li>
                            <li>
                                Classe
                            </li>
                            <li class='deco'>
                                <a  href='../web/index.html'>Déconnexion</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="pedago">
                    <a href="contact.php">Contact responsable de formation</a>
                </div>

                <div class="pedago">
                    <a href="trombi.php">Documents pédagogiques</a>
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