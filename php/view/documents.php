<?php
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

<!doctype html>
<!--Modification Equipe 1!-->
<html lang="fr">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />

        <!--Import Roboto Font-->
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
        <!--Import Google Icon Font-->
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="../../css/materialize.min.css"  media="screen,projection"/>
        <!--Import style.css-->
        <link type="text/css" rel="stylesheet" href="../../css/style.css"/>
        <!--Import menu.css-->
        <link type="text/css" rel="stylesheet" href="../../css/menu.css"/>

        <!-- CALENDAR -->
      <link rel="stylesheet" href="../../css/clndr.css" type="text/css" />
        <link type="text/css" rel="stylesheet" href="../../css/calendar.css"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body>

        <nav>
          <div class="nav-wrapper">
            <a href="" class="brand-logo"><img src="../../img/logo.png" alt="logo du site"></a>
            <img src="../../img/name.png" alt="Zenetude, titre du site">
            <div id="hamburger2" class="hamburglar is-closed">

                <div class="burger-icon">
                  <div class="burger-container">
                    <span class="burger-bun-top"></span>
                    <span class="burger-filling"></span>
                    <span class="burger-bun-bot"></span>
                  </div>
                </div>
                
                <!-- svg ring containter -->
                <div class="burger-ring">
                  <svg class="svg-ring">
                      <path class="path" fill="none" stroke="#7BBA42" stroke-miterlimit="10" stroke-width="4" d="M 34 2 C 16.3 2 2 16.3 2 34 s 14.3 32 32 32 s 32 -14.3 32 -32 S 51.7 2 34 2" />
                  </svg>
                </div>
                <!-- the masked path that animates the fill to the ring -->
                
                    <svg width="0" height="0">
                   <mask id="mask">
                <path xmlns="http://www.w3.org/2000/svg" fill="none" stroke="#ff0000" stroke-miterlimit="10" stroke-width="4" d="M 34 2 c 11.6 0 21.8 6.2 27.4 15.5 c 2.9 4.8 5 16.5 -9.4 16.5 h -4" />
                   </mask>
                 </svg>
                <div class="path-burger">
                  <div class="animate-path">
                    <div class="path-rotation"></div>
                  </div>
                </div>
                  
              </div>
          </div>
        </nav>

        <nav id="menu" class="center-align">
            <ul>
                <img src="../../img/avatar.png" alt="avatar.png" class="circle responsive-img"/><br/>
                <a class="color" href="profil.php">Pseudo</a>
                <li><a class="color" href="">Se déconnecter</a></li>
            </ul>
        </nav>

        <nav id="scroll-nav">
          <div class="nav-wrapper">
            <a href="" class="brand-logo"><img src="../../img/logo.png" alt="logo du site"></a>
            <img src="../../img/name.png" alt="Zenetude, titre du site">
            <div id="hamburger" class="hamburglar is-closed">

                <div class="burger-icon">
                  <div class="burger-container">
                    <span class="burger-bun-top"></span>
                    <span class="burger-filling"></span>
                    <span class="burger-bun-bot"></span>
                  </div>
                </div>
                
                <!-- svg ring containter -->
                <div class="burger-ring">
                  <svg class="svg-ring">
                      <path class="path" fill="none" stroke="#7BBA42" stroke-miterlimit="10" stroke-width="4" d="M 34 2 C 16.3 2 2 16.3 2 34 s 14.3 32 32 32 s 32 -14.3 32 -32 S 51.7 2 34 2" />
                  </svg>
                </div>
                <!-- the masked path that animates the fill to the ring -->
                
                    <svg width="0" height="0">
                   <mask id="mask">
                <path xmlns="http://www.w3.org/2000/svg" fill="none" stroke="#ff0000" stroke-miterlimit="10" stroke-width="4" d="M 34 2 c 11.6 0 21.8 6.2 27.4 15.5 c 2.9 4.8 5 16.5 -9.4 16.5 h -4" />
                   </mask>
                 </svg>
                <div class="path-burger">
                  <div class="animate-path">
                    <div class="path-rotation"></div>
                  </div>
                </div>
                
              </div>
          </div>
        </nav>

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

        <footer></footer>


        <!--Import jQuery before materialize.js-->
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="../../js/materialize.min.js"></script>
        <script type="text/javascript" src="../../js/menu.js"></script>
      <script src="../../js/underscore-min.js"></script>
      <script src="../../js/moment-2.2.1.js"></script>
      <script src="../../js/clndr.js"></script>
      <script src="../../js/site.js"></script>
        <script type="text/javascript">

             $(function(){
               $(window).scroll(function () {//Au scroll dans la fenetre on déclenche la fonction
                  if ($(this).scrollTop() > 200) { //si on a défilé de plus de 200px du haut vers le bas
                    document.getElementById('scroll-nav').style.top='0px';
                  } else{
                    document.getElementById('scroll-nav').style.top='-200px';
                  }
               });
             });

            window.onload=ajuste;
                function ajuste(){
                document.getElementById('aside1').style.minHeight=document.getElementById('bloc1').offsetHeight+"px";
                document.getElementById('aside2').style.minheight=document.getElementById('calendar').offsetHeight+"px";
            }

        </script>
    </body>
  </html>