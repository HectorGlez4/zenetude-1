<?php
    session_start();
    if (isset($_GET['erreur'])){
        echo "<script>alert('Erreur d\'authentification !');</script>";
    }
    include_once('./pageview.php');
    include_once('../controller/pagecontroller.php');
    include_once('../model/db.php');
    include_once('../model/accountmodel.php');
    include_once('../view/accountview.php');

    $accountmodel = new AccountModel();
    $pageController = new PageController();
    $pageView = new PageView();
    $accountView = new AccountView();
    $db = connect();
    $pageController -> controlConnexion();

?>
<!DOCTYPE html>
<html>
    <body>

        <?php
            $pageView -> showHead("Gestion du compte");
            $pageController -> controlHeader();
            $pageController -> controlDynamicMenu();
        ?>

        <div id="filtre"></div>

        <div class="container">
            <div class="row">
                <div class="col s12 m8">
                    <div class="card-panel teal" id="bloc2">
                        <div class="card-title"> <h3>Gestion du compte</h3></div>
                        <?php
                            $pageController -> controlGestion();
                        ?>
                    </div><!-- Fin div col -->
                </div>

                <?php
                $pageView->showCalendar();
                ?>
            </div><!-- Fin row -->
        </div><!-- Fin container -->

        <?php
        $pageView->showFooter();
        $pageView->showjavaLinks();
        ?>

    </body>
</html>