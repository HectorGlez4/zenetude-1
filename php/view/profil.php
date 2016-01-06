<?php
    session_start();
    if (isset($_GET['erreur'])){
        echo "<script>alert('Erreur d\'authentification !');</script>";
    }
    include_once('./pageview.php');
    include_once('../controller/pagecontroller.php');
    include_once('../model/db.php');
    include_once('../model/accountmodel.php');


    $pageController = new PageController();
    $pageView = new PageView();
    $db = connect();

?>
  <!DOCTYPE html>
  <html>
    <body>
    
        
        <?php
            $pageController -> controlConnexion();
            $pageView -> showHead();
            $pageController -> controlHeader();
            $pageController -> controlDynamicMenu();
            
        ?>

        <div id="filtre"></div>
        <div class="container">

            <div class="row">
            <?php
                $pageController -> controlProfilInformations();
                $pageView->showCalendar();
             ?>

            </div>

        </div><!-- Fin container -->

            
        </div>
           
        <?php
            $pageView->showFooter();
            $pageView->showjavaLinks();
        ?>

    </body>
</html>