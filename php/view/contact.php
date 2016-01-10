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
            $pageController -> controlContact();
            $pageView -> showHead();
            $pageController -> controlHeader();
            $pageController -> controlDynamicMenu();
        ?>

        <div id="filtre"></div>
        <div class="container">

            <div class="row">

                <div class="col s12 m8">
                    <div class="card-panel teal" id="bloc2">
                        <div class="card-title"> <h3>Contact</h3></div>
                        <?php
                        $pageController -> controlShowContact();
                        ?>
                        <p></p>
                    </div>
                </div>

                <?php
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