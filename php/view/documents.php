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

  $studentsGroup = getStudentsGroup();
print_r($studentsGroup);

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
                            $description;
                            for($i = 0 ; $i < count($studentsGroup) ; $i++)
                            {
                        ?>
                            <ul>
                                <?php if($description != $studentsGroup[$i]['description']){?>
                                    <li><?php echo $studentsGroup[$i]['description']?></li>
                                <?php } $description = $studentsGroup[$i]['description'] ?>
                                <li><a href="#" onclick="actualiserTrombi(<?php echo $studentsGroup[$i]['training_id']?>, <?php echo $studentsGroup[$i]['student_group']?>)">Groupe <?php echo $studentsGroup[$i]['student_group']?></a></li>
                            </ul>
                        <?php
                            }
                        ?>

                      </div>
                  </div>

                  <div class="card-panel teal" id="bloc1">
                      <div class="card-header"> <h3>Documents</h3></div>
                      <div id="docchoice" class="card-content center-align"></div>
                  </div>
              </div>
              
              <!-- Trombinoscope picture -->
              <div id="trombi" class="col m8 s12"></div>
              
          </div>
        </div><!-- CONTAINER -->   
        <?php
          $pageView->showFooter();
          $pageView->showjavaLinks();
        ?>
      
    </body>
  </html>