<?php

    session_start();

    if (isset($_GET['erreur'])){
        echo "<script>alert('Erreur d\'authentification !');</script>";
    }

    if (isset($_GET['refus'])){
        session_destroy();
        echo "<script>alert('Vous avez refuser l\'accès au réseau social !');</script>";
    }

    if (isset($_GET['failure'])){
        session_destroy();
        echo "<script>alert('Une erreur s\'est produite. Veuillez réessayer ultérieurement');</script>";
    }


    include_once('./pageview.php');
    include_once('../controller/pagecontroller.php');

    $pageController = new PageController();
    $pageView = new PageView();
?>
<!DOCTYPE html>
<html>
    <style type="text/css">
        body{overflow:hidden;}
    </style>
    <body>

    <?php
        $pageView -> showHead("Page d'erreur");
        $pageController -> controlHeader();
    ?>
        <META HTTP-EQUIV="Refresh" CONTENT="3; URL=index.php">
    <?php
        $pageController -> controlDynamicMenu();
    ?>

        <div id="filtre"></div>

        <div class="container">
            <!-- Page Content goes here -->
            <div class="row row1">
                <?php
                    $pageController -> controlShowErrorPage();
                ?>
            </div>
        </div>
        <!-- FIN CONTAINER -->

    <?php
        $pageView->showjavaLinks();
    ?>

    </body>
</html>
