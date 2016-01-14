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
            $pageView -> showHead("Récupération du mot de passe");
            $pageController -> controlHeader();
            $pageController -> controlDynamicMenu();
            $pageView -> showRecuperation();
        ?>

    <?php
        $pageView->showFooter();
        $pageView->showjavaLinks();
    ?>
    
</body>
</html>