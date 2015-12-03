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


  include(dirname(__FILE__).'/../model/DocumentsModel.php');

  $studentsGroup = getStudentsGroupByTrainingGroup();
  $get =  false;
  if(isset($_GET['f']) && isset($_GET['g']))
  {
    $get = true;
    $frm = $_GET['f'];
    $grp = $_GET['g'];
  }

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
                            $formation_id = $studentsGroup[0]["training"];

                            /*if (!empty($formation) || !empty($group)) {*/
                        ?>

                                <ul>
                                    <li><?php echo $formation ?></li>
                                    <li class="indent"><a href="documents.php?f=<?php echo $formation_id ?>&g=<?php echo $group ?>">Groupe <?php echo $group ?></a></li>
                                </ul>

                            <?php
                            for($iX = 0; $iX < count($studentsGroup); ++$iX) {

                                if (!($formation == $studentsGroup[$iX]["description"])) {
                                    $formation = $studentsGroup[$iX]["description"];
                                    $formation_id = $studentsGroup[$iX]["training"];
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
                                    <li class="indent"><a href="documents.php?f=<?php echo $formation_id ?>&g=<?php echo $group ?>">Groupe <?php echo $group ?></a></li>
                                </ul>

                        <?php
                                  }
                                }
                            //}
                        ?>

                      </div>
                  </div>

                  <div class="card-panel teal" id="bloc1">
                      <div class="card-header"> <h3>Documents</h3></div>
                      <div class="card-content center-align">
                      <?php if($get){?>
                          <p><a href="../controller/documents/generateTrombi.php?f=<?php echo $frm ?>&g=<?php echo $grp ?>" target="_blank">Imprimer le trombinoscope</a></p>
                          <p><a href="../controller/documents/generateSheet.php?f=<?php echo $frm ?>&g=<?php echo $grp ?>" target="_blank">Imprimer la feuille d'émargement</a></p>
                      <?php } ?>
                      </div>
                  </div>
              </div>
              
              <!-- Trombinoscope picture -->
              <div class="col m8 s12">
                  <img src="../../img/trombinoscope-LP-SIL.jpg" alt="Trombi"/>
              </div>
              
          </div>
        </div><!-- CONTAINER -->   
        <?php
          $pageView->showFooter();
          $pageView->showjavaLinks();
        ?>
      
    </body>
  </html>