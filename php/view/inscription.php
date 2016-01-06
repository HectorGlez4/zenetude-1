<?php
  session_start();
  if (isset($_GET['erreur'])){
    echo "<script>alert('Votre adresse e-mail existe déjà.');</script>";
  }

  if (isset($_GET['mdp'])){
    echo "<script>alert('Mot de passe non identique.');</script>";
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
    <div id="filtre"></div>
    <!-- CONTAINER -->
    <div class="container container-fluid">

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
      <?php
        $pageView->showInscriptionForm();
      ?>
  </div>

    
</div><!-- FIN CONTAINER -->
    <!--<div class="footer">
        <p> ZENETUDE - Projet réalisé par les étudiants de LP SIL DA2I 2015/2016 </p>
    </div> -->
    <?php
      $pageView->showFooter();
      $pageView->showjavaLinks();
    ?>
</body>
</html>