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

    <div class="row">
      <?php
        $pageView->showInscriptionForm();
      ?>
  </div>
</div>
    <?php
      $pageView->showFooter();
      $pageView->showjavaLinks();
    ?>
</body>
</html>