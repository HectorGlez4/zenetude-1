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
            $pageView -> showMetas();
            $pageController -> controlHeader();
            $pageController -> controlScrollMenu();
        ?>

        <!-- CONTAINER -->
        <div class="container-fluid">



            <div class="row">
                <?php
               
                ?>
            </div>


        </div>



    <!-- FIN CONTAINER -->
    <!--<div class="footer">
        <p> ZENETUDE - Projet réalisé par les étudiants de LP SIL DA2I 2015/2016 </p>
    </div> -->
    <?php
    $pageView->showFooter();
    $pageView->showjavaLinks();
    ?>
</body>
</html>