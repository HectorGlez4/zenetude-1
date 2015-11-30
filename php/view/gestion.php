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

    if (isset($_SESSION['id'])) {
        $request = $db->prepare('SELECT * FROM Student WHERE user_id = '.$_SESSION['id']);
        $request->execute();
        $result = $request->fetch();
    }


if (isset($_POST['student_update']))
{

$user_id=$_POST['user_id'];
$student_personalemail=$_POST['student_personalemail'];
$student_phone=$_POST['student_phone'];
$student_mobile=$_POST['student_mobile'];
$student_address1=$_POST['student_address1'];
$student_address2=$_POST['student_address2'];
$student_zipcode=$_POST['student_zipcode'];
$student_city=$_POST['student_city'];
$student_country=$_POST['student_country'];
$student_nationality=$_POST['student_nationality'];
$student_birthday=$_POST['student_birthday'];
$student_birtharea=$_POST['student_birtharea'];
$student_birthcountry=$_POST['student_birthcountry'];
$student_facebook=$_POST['student_facebook'];
$student_status=$_POST['student_status'];
$student_educationallevel=$_POST['student_educationallevel'];
$student_origin=$_POST['student_origin'];
$student_grantholder=$_POST['student_grantholder'];
$student_birthcity=$_POST['student_birthcity'];
$student_comment=$_POST['student_comment'];
$student_group=$_POST['student_group'];

$update = $db->prepare("UPDATE Student SET
student_personnalemail = '$student_personalemail',
student_phone = '$student_phone',
student_mobile = '$student_mobile',
student_adresse1 = '$student_address1',
student_adresse2 = '$student_address2',
student_zipcode = '$student_zipcode',
student_city = '$student_city',
student_country = '$student_country',
student_nationnality = '$student_nationality',
student_birthday = '$student_birthday',
student_birtharea = '$student_birtharea',
student_birthcountry = '$student_birthcountry',
student_facebook = '$student_facebook',
student_status = '$student_status',
student_educationnallevel = '$student_educationallevel',
student_origin = '$student_origin',
student_grantholder = '$student_grantholder',
student_comment = '$student_comment',
student_group = '$student_group',
student_birthcity = '$student_birthcity'
where user_id='$user_id'");

$update->execute();

header('Location: gestion.php');

}
?>
  <!DOCTYPE html>
  <html>
    <body>
        
        <?php
            $pageView -> showMetas();
            $pageController -> controlHeader();
            $pageController -> controlScrollMenu();
        ?>


        <div class="container">

            <div class="row">
                
                <div class="col s12 m8">
                <div class="card-panel teal" id="bloc2">
                    <div class="card-title"> <h3>Gestion du compte</h3></div>
                    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" role="form">
                            <div class="form-group">
         
                        <div class="col-md-6">
                            <input type="hidden" class="form-control" value="<?php echo $_SESSION['id'] ?>" name="user_id">
                            <label for="">Mail</label>
                                <input type="email" class="form-control" value="<?php echo $result[3]; ?>" name="student_personalemail">
                                <label for="">Telephone</label>
                                <input type="number" class="form-control" value="<?php echo $result[4]; ?>" name="student_phone">
                                <label for="">Portable</label>
                                <input type="text" class="form-control" value="<?php echo $result[5]; ?>" name="student_mobile">
                                <label for="">Adresse 1</label>
                                <input type="text" class="form-control" value="<?php echo $result[6]; ?>" name="student_address1">
                                <label for="">Adresse 2</label>
                                <input type="text" class="form-control" value="<?php echo $result[7]; ?>" name="student_address2">
                                <label for="">Code postal</label>
                                <input type="text" class="form-control" value="<?php echo $result[8]; ?>" name="student_zipcode" maxlength="5">
                                <label for="">Ville</label>
                                <input type="text" class="form-control" value="<?php echo $result[9]; ?>" name="student_city">
                                <label for="">Pays</label>
                                <input type="text" class="form-control" value="<?php echo $result[10]; ?>" name="student_country">
                                <label for="">Nationalité</label>
                                <input type="text" class="form-control" value="<?php echo $result[11]; ?>" name="student_nationality">
                                <label for="">Date de naissance</label>
                                <input type="date" class="form-control" value="<?php echo $result[12]; ?>" name="student_birthday">
                        </div>
                        <div class="col-md-6">
                            <label for="">Ville de naissance</label>
                                <input type="text" class="form-control" value="<?php echo $result[13]; ?>" name="student_birthcity">
                                <label for="">Region de naissance</label>
                                <input type="text" class="form-control" value="<?php echo $result[14]; ?>" name="student_birtharea">
                                <label for="">Pays de naissance</label>
                                <input type="text" class="form-control" value="<?php echo $result[15]; ?>" name="student_birthcountry">
                                <label for="">Facebook</label>
                                <input type="text" class="form-control" value="<?php echo $result[16]; ?>" name="student_facebook">
                                <label for="">Status</label>
                                <select class="form-control" name="student_status">
                                    <option value="FI">FI</option>
                                    <option value="FC">FC</option>
                                    <option value="CP">CP</option>
                                    <option value="AP">AP</option>
                                </select>
                                <label for="">Niveau d'études</label>
                                <select class="form-control" name="student_educationallevel">
                                    <option value="BacS">BacS</option>
                                    <option value="BacTechno">BacTechno</option>
                                </select>
                                <label for="">Origine</label>
                                <input type="text" class="form-control" value="<?php echo $result[19]; ?>" name="student_origin">
                                <label for="">Bourse</label>
                                <input id="oui" class="with-gap" name="student_grantholder" type="radio" value="Oui"/>
                                <label for="oui">Oui</label>                        
                                <input id="non" class="with-gap" name="student_grantholder" type="radio" value="Non"/>    
                                <label for="non">Non</label> <br>
                                <label for="">Groupe</label>
                                <input type="text" class="form-control" value="<?php echo $result[23]; ?>" name="student_group">
                                <label for="">Commentaires</label>
                                <input type="text" class="form-control" value="<?php echo $result[22]; ?>" name="student_comment"> <br>
                                <button type="submit" name="student_update" class="btn btn-primary">Enregistrer</button>
                        </div>    
                    </div>  
                    </form>

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