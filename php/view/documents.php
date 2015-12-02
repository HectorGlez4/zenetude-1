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
            $pageController -> controlConnexion();
            $pageView -> showHead();
            $pageController -> controlHeader();
            $pageController -> controlDynamicMenu();
        

  include(dirname(__FILE__).'/../model/DocumentsModel.php');

  $studentsGroup = getStudentsGroupByTrainingGroup(1,1);
?>


        <!-- CONTAINER -->
        <div class="container">
            <div class="row">

              <div id="formation" class='col m4 s12'>
                  <div class="card-panel teal" id="bloc1">
                      <div class="card-header"> <h3>Formations</h3></div>
                      <div class="card-content center-align">

                        <?php
                          $formation = $studentsGroup[0]["description"];
                          $group = $studentsGroup[0]["student_group"];
                        ?>

                          <ul>
                            <li><?php echo $formation ?></li>
                            <li class="indent"><a href="documents.php/<?php echo $formation ?>/<?php echo $group ?>">Groupe <?php echo $group ?></a></li>
                          </ul>

                        <?php
                        for($iX = 0; $iX < count($studentsGroup); ++$iX) {

                          if (!($formation == $studentsGroup[$iX]["description"])) {
                            $formation = $studentsGroup[$iX]["description"];
                        ?>

                          <ul>
                            <li><?php echo $studentsGroup[$iX]["description"] ?></li>
                          </ul>

                        <?php
                          }

                          if (!($group == $studentsGroup[$iX]["student_group"])) {
                            $group = $studentsGroup[$iX]["student_group"];
                        ?>
                        
                          <ul>
                            <li class="indent"><a href="documents.php/<?php echo $formation ?>/<?php echo $group ?>">Groupe <?php echo $group ?></a></li>
                          </ul>

                        <?php
                          }
                        }
                        ?>

                      </div>
                  </div>
              </div>
              
              <!-- Trombinoscope picture -->
              <div class="col m8 s12">
                  <img src="../../img/trombinoscope-LP-SIL.jpg" alt="Trombi"/>
                  <p><a href="../controller/documents/generateTrombi.php" target="_blank">Imprimer le trombinoscope</a></p>
                  <p><a href="../controller/documents/generateSheet.php" target="_blank">Imprimer la feuille d'émargement</a></p>
              </div>
              
          </div>
        </div><!-- CONTAINER -->   
        <?php
          $pageView->showFooter();
          $pageView->showjavaLinks();
        ?>
      
    </body>
  </html>