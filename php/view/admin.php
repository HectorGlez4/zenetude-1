<?php
    session_start();
    if (isset($_GET['erreur'])){
        echo "<script>alert('Erreur d\'authentification !');</script>";
    }
    include_once('./PageView.php');
    include_once('../controller/PageController.php');
    include_once('../model/db.php');

    $pageController = new PageController();
    $pageView = new PageView();
    $db = connect();

?>
<!DOCTYPE html>
<html>
    <body>
        <?php
            $pageView -> showHead();
            $pageController -> controlHeader();
            $pageController -> controlDynamicMenu();
        ?>
        <div class="container">
            <div class="row">
                <div class="col s12 m8">
                    <div class="card-panel teal" id="bloc2">
                        <div class="card-title"> <h3>Profil</h3></div>
                        <?php
                            $pageView->showAdministration();
                        ?>
                    </div>
                </div>
                <?php
                    $pageView->showCalendar();
                ?>
            </div>
        </div><!-- Fin container -->
        <?php
            $pageView->showFooter();
            $pageView->showjavaLinks();
        ?>
    </body>
</html>
