<!doctype html>
<html lang="fr">
<head>
    <title>Zenetude</title>
	<link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/test.css">

    <meta charset="utf-8">
</head>
<body>
<?php
	
?>
<div class="container-fluid">

	<div class="nav row">
        <div class='col-md-3 logo'>
        <a href='../web/index.html'>
        <img src='../img/logo.jpg' alt='Logo'/>
        </a>
		</div>
    <div class='col-md-9 titre'>
       <h1>Bannière ZENETUDE</h1>
    </div>
    </div>
	<div class='col-md-8 content'>


            <form id="inscription" action ="valider.php" method="post" onsubmit="">
                <fieldset>
                    <legend><h2>Inscription</h2></legend>
                <label for="mail"> Adresse email <em>*</em></label>
                <input id="email" type="email" name="mail"  ><br>
                <label for="passe">Mot de passe: <em>*</em> </label>
                <input id ="passe" type="password"  name="passe"/><br/>
                <label for="passe2">Confirmation du mot de passe: </label>
                <input id="passe" type="password"  name="passe2"/><br/>
                <input value="S'inscrire" type="submit">
                </fieldset>
            </form>


	</div>
		<div id="footer">
        <p>
			ZENETUDE - Projet réalisé par les étudiants de LP SIL DA2I 2015/2016
		</p>

		</div>
		
</div>		
</body>
</html>