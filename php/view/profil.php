<?php
    session_start();
    if (isset($_GET['erreur'])){
        echo "<script>alert('Erreur d\'authentification !');</script>";
    }
    include_once('./PageView.php');
    include_once('../controller/PageController.php');

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


        <div class="container">

            <div class="row">
                
                <div class="col s12 m8">
                <div class="card-panel teal" id="bloc2">
                    <div class="card-title"> <h3>Profil</h3></div>
                    <ul>
                        <li class="infos">Sexe :
                            <input class="with-gap" name="sexe" type="radio" id="h" value="1"/>
                            <label for="h">Homme</label>
                        
                            <input class="with-gap" name="sexe" type="radio" id="f" value="2"/>
                            <label for="f">Femme</label>
                        </li>
                        <li class="infos">Formation : ...</li>
                        <li class="infos">Classe : </li>
                        <li class="infos">Date de naissance : </li>
                        <li class="infos">Lieu de naissance : </li>
                        <li class="infos">Mail : </li>
                        <li class="infos">Téléphone : </li>
                        <li class="infos">Adresse personnelle : </li>
                        <li class="infos">
                            <a href="contact.php">Contacter un responsable de formation</a>
                        </li>
                        <li class="infos">
                            <a class="right-align" href="trombi.php">Documents pédagogiques</a>
                        </li>
                    </ul>
                    <p>
                    </p>
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