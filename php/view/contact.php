<?php
/*
// public function Renseignement($idStudent)
        // Connection à la base de données
        $bdd = new PDO('mysql:host=localhost;dbname=zenetude', 'root', 'root');

        $bdd->query('SELECT user_name,user_firstname,user_instituteemail FROM users ');
        $req=$bdd->query('SELECT user_name,user_firstname,user_instituteemail FROM users U , students S, training T ,
                      training_manager TM WHERE S.training_id = T.training_id AND
                      T.training_manager_id = TM.training_manager_id AND
                      TM.user_id = U.user_id AND
                      student_id = :idStudent');

        $result = $req->fetchAll(PDO::FETCH_ASSOC);
        $result= $req->rowcount();

        // Redirection vers la page d'accueil
        header('Location: index.php');
*/
?>

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
            //$pageController -> showScrollMenu();
        ?>

        <div class="container-fluid">

            <div class="nav row">
                <!-- <div class='col-md-3 logo'>
                    <a href='../index.html'>
                        <img src='../../img/logo.jpg' alt='Logo'/>
                    </a>
                </div> -->
                <!-- <div class='col-md-9 titre'>
                    <h1>Bannière ZENETUDE</h1>
                </div> -->
            </div>
            <div class='col-md-8 content'>
                <form id="contact" action ="" method="post" onsubmit="">

                </form>
            </div>
            <div id="footer">
                <p>
                    ZENETUDE - Projet réalisé par les étudiants de LP SIL DA2I 2015/2016
                </p>

            </div>

        </div>
    </body>
</html>