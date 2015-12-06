<?php
    session_start();
    if (isset($_GET['erreur'])){
        echo "<script>alert('Erreur d\'authentification !');</script>";
    }
    include_once('./pageview.php');
    include_once('../controller/pagecontroller.php');

    $pageController = new PageController();
    $pageView = new PageView();
?>
  <!DOCTYPE html>
  <html>
    <body>
        
        <?php
            $pageView -> showHead();
            $pageController -> controlHeader();
            $pageController -> controlDynamicMenu();
        ?>
    <!-- CONTAINER -->
    <div class="container-fluid">

    <div class="row">
      <!-- Debut card -->
      <div class="card-panel inscription col m4 push-m4 s12 center-align">
        <!-- Formulaire -->
        <form id="formula" class="col formulaire s10 push-s1" action="validationrecuperation.php" method="POST" onsubmit="">

          <!-- Titre de la carte -->
          <div class="card-header header-small"> <h2>Récupération de mot de passe</h2></div>
          <!-- Fin titre -->

          <!-- Contenu card -->
          <div class="card-content">

          <!-- email -->
          <div class="row">
            <div class="input-field col s12">
              <input id="email" type="email" class="validate" name="mail" required="required">
              <label for="email">Entrer l'adresse email de récupération </label>
            </div>
          </div><!-- fin email -->

        </div><!-- Fin contenu card -->

          <!-- bouton s'inscrire -->
          <div class="card-action bouton-connection">  
            <input class="btn center-align" type="submit" value="Valider" />
          </div>

        </form><!-- Fin formulaire -->
        <div id="result"></div><!-- Retour de l'erreur en json -->
      </div><!-- Fin card -->
  </div>

    <?php
        $pageView->showFooter();
        $pageView->showjavaLinks();
    ?>
</div><!-- FIN CONTAINER -->
    
</body>
</html>