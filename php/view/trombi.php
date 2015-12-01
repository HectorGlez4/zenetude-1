<?php
    session_start();
    if(!isset($_SESSION['name'])) {
        echo '
        <script>
            document.location.href="../view/index.php"
        </script>';
    }
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
        <!-- CONTAINER -->
        <div class="container">
            <div class="row">

            <div id="formation" class='col m4 s12'>
                <div class="card-panel teal" id="bloc1">
                    <div class="card-header"> <h3>Formations</h3></div>
                    <div class="card-content center-align">
                        <ul>
                            <li>Formation 1</li>
                            <li>Formation 2</li>
                            <li>Formation 3</li>
                            <li>Formation 4</li>
                            <li>Formation 5</li>
                            <li>Formation 6</li>
                            <li>Formation 7</li>
                            <li>Formation 8</li>
                            <li>Formation 9</li>
                            <li>Formation 10</li>
                            <li>Formation 11</li>
                            <li>Formation 12</li>
                            <li>Formation 13</li>
                            <li>Formation 14</li>
                            <li>Formation 15</li>
                            <li>Formation 16</li>
                            <li>Formation 17</li>
                            <li>Formation 18</li>
                            <li>Formation 19</li>
                            <li>Formation 20</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col m8 s12">
                <img src="../../img/trombinoscope-LP-SIL.jpg" alt="Trombi"/>
                <p><a href="#">Imprimer la feuille d'émargement</a></p>
                <p><a href="trombi.php">Documents pédagogiques</a></p>
            </div>
            
        </div>
        </div><!-- CONTAINER -->   
        <?php
          $pageView->showFooter();
          $pageView->showjavaLinks();
        ?>
      
    </body>
  </html>