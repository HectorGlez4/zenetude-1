<!doctype html>
<html lang="fr">
<head>
    <title>Zenetude</title>
    <link rel="stylesheet" href="../../css/materialize.css">
    <link rel="stylesheet" href="../../css/index.css">
    <link rel="stylesheet" href="../../css/style.css">
    <meta charset="utf-8">
</head>
<body>
    <!-- CONTAINER -->
    <div class="container-fluid">

    <!--<div id="content">
        <h2>Inscription</h2>
        <div class='renseignements'>
            <form action ="valider.php" method="post">
                <label>Adresse e-mail: <input type="text" id ="email" name="EMAIL"/></label><br/>
                <label>Mot de passe: <input type="password" id ="passe" name="PASSE"/></label><br/>
                <label>Confirmation du mot de passe: <input type="password" id="passe" name="PASSE2"/></label><br/>
                <input type="submit" value="M'inscrire"/>
            </form>



        </div>
    </div>-->

    <div class="row">
      <!-- Debut card -->
      <div class="card-panel inscription col m4 push-m4 s12 center-align">
        <!-- Formulaire -->
        <form class="col formulaire s10 push-s1" action="valider.php" method="POST" onsubmit="">

          <!-- Titre de la carte -->
          <div class="card-header"> <h2>Inscription</h2></div>
          <!-- Fin titre -->

          <!-- Contenu card -->
          <div class="card-content">

          <!-- email -->
          <div class="row">
            <div class="input-field col s12">
              <input id="email" type="email" class="validate" name="mail">
              <label for="email">Adresse email <em>*</em></label>
            </div>
          </div><!-- fin email -->

          <!-- mot de passe -->
          <div class="row">
            <div class="input-field col s12">
              <input id="passe" type="password" class="validate" name="passe">
              <label for="passe">Mot de passe <em>*</em></label>
            </div>
          </div><!-- fin mot de passe -->

          <!-- confirmation mot de passe -->
          <div class="row">
            <div class="input-field col s12">
              <input id="passe2" type="password" class="validate" name="passe2">
              <label for="passe2">Confirmer votre mot de passe</label>
            </div>
          </div><!-- fin confirmation mot de passe -->

        </div><!-- Fin contenu card -->

          <!-- bouton s'inscrire -->
          <div class="card-action bouton-connection">  
            <input class="btn center-align" type="submit" value="S'inscrire" />
          </div>

        </form><!-- Fin formulaire -->
      </div><!-- Fin card -->
  </div>

    
</div><!-- FIN CONTAINER -->
    <!--<div class="footer">
        <p> ZENETUDE - Projet réalisé par les étudiants de LP SIL DA2I 2015/2016 </p>
    </div> -->
    <script type="text/javascript" src="../../js/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="../../js/materialize.js"></script>
</body>
</html>