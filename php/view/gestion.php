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

$idUser = $_SESSION['infoUser']['user_id'];
    if(isset($idUser)) {
        $request = $db->prepare('SELECT * FROM Student WHERE user_id = '.$idUser);
        $request->execute();
        $result = $request->fetch();
    }



if (isset($_POST['student_update']) ) //SI LE FORMULAIRE A ETE ENVOYE
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
$student_status=$_POST['student_status'];
$student_educationallevel=$_POST['student_educationallevel'];
$student_origin=$_POST['student_origin'];
$student_birthcity=$_POST['student_birthcity'];
$student_comment=$_POST['student_comment'];
$student_group=$_POST['student_group'];


$values = array($student_personalemail,
                $student_phone,
                $student_mobile,
                $student_address1,
                $student_address2,
                $student_zipcode,
                $student_city,
                $student_country,
                $student_nationality,
                $student_birthday,
                $student_birtharea,
                $student_birthcountry,
                $student_status,
                $student_educationallevel,
                $student_origin,
                $student_birthcity,
                $student_comment,
                $student_group);


    foreach ($values as $key => $value) {
        if (empty($value)) {
            $values[$key] = null;
    } else {
        $values[$key] = $value;
    }
}

$update = $db->query("UPDATE Student SET 
student_personalemail = '$values[0]',
student_phone = '$values[1]',
student_mobile = '$values[2]',
student_address1 = '$values[3]',
student_address2 = '$values[4]',
student_zipcode = '$values[5]',
student_city = '$values[6]',
student_country = '$values[7]',
student_nationality = '$values[8]',
student_birthdate = '$values[9]',
student_birtharea = '$values[10]',
student_birthcountry = '$values[11]',
student_status = '$values[12]',
student_educationallevel = '$values[13]',
student_origin = '$values[14]',
student_comment = '$values[15]',
student_group = '$values[16]',
student_birthcity = '$values[17]'
WHERE user_id='$idUser'");

$userInfos['infoStudent']['student_personalemail'] = $values[0];

header('Location: profil.php');
}

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
                    <div class="card-title"> <h3>Gestion du compte</h3></div>
                    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" role="form">
                            <div class="form-group">
                            <input type="hidden" class="form-control" value="<?php echo $_SESSION['infoUser']['user_id']; ?>" name="user_id">
                                <div class="col s6">
                                    <label for="">Mail</label>
                                    <input type="email" class="form-control" placeholder="Placeholder"value="<?php echo $result[4]; ?>" name="student_personalemail">
                                    <label for="">Telephone</label>
                                    <input type="number" class="form-control" placeholder="Placeholder" value="<?php echo $result[5] ?>" name="student_phone">
                                    <label for="">Portable</label>
                                    <input type="text" class="form-control" placeholder="Placeholder" value="<?php echo $result[6]; ?>" name="student_mobile">
                                    <label for="">Adresse 1</label>
                                    <input type="text" class="form-control" placeholder="Placeholder" value="<?php echo $result[7]; ?>" name="student_address1">
                                    <label for="">Adresse 2</label>
                                    <input type="text" class="form-control" placeholder="Placeholder" value="<?php echo $result[8]; ?>" name="student_address2">
                                    <label for="">Code postal</label>
                                    <input type="text" class="form-control" placeholder="Placeholder" value="<?php echo $result[9]; ?>" name="student_zipcode" maxlength="5">
                                    <label for="">Ville</label>
                                    <input type="text" class="form-control" placeholder="Placeholder" value="<?php echo $result[10]; ?>" name="student_city">
                                    <label for="">Pays</label>
                                    <input type="text" class="form-control" placeholder="Placeholder" value="<?php echo $result[11]; ?>" name="student_country">
                                    <label for="">Nationalité</label>
                                    <input type="text" class="form-control" placeholder="Placeholder" value="<?php echo $result[12]; ?>" name="student_nationality">
                                </div>
                                <div class="col s6">
                                    <label for="">Date de naissance</label>
                                    <input type="date" class="form-control" placeholder="Placeholder" value="<?php echo $result[13]; ?>" name="student_birthday">
                                    <label for="">Ville de naissance</label>
                                    <input type="text" class="form-control" placeholder="Placeholder" value="<?php echo $result[14]; ?>" name="student_birthcity">
                                    <label for="">Region de naissance</label>
                                    <input type="text" class="form-control" placeholder="Placeholder" value="<?php echo $result[15]; ?>" name="student_birtharea">
                                    <label for="">Pays de naissance</label>
                                    <input type="text" class="form-control" placeholder="Placeholder" value="<?php echo $result[16]; ?>" name="student_birthcountry">
                                    <label for="">Niveau d'études</label>
                                        <select name="student_educationallevel">
                                            <option value="BAC">
                                                BAC
                                            </option>
                                            <option value="BAC+1">
                                                BAC+1
                                            </option>
                                            <option value="BAC+2">
                                                BAC+2
                                            </option>
                                            <option value="BAC+3">
                                                BAC+3
                                            </option>
                                            <option value="BAC+4">
                                                BAC+4
                                            </option>
                                            <option value="BAC+5">
                                                BAC+5
                                            </option>
                                            <option value="BAC+6">
                                                BAC+6
                                            </option>
                                            <option value="BAC+7">
                                                BAC+7
                                            </option>
                                            <option value="BAC+8">
                                                BAC+8
                                            </option>
                                        </select>
                                    <label for="">Origine</label>
                                    <input type="text" class="form-control" placeholder="Placeholder" value="<?php echo $result[20]; ?>" name="student_origin">
                                    <label for="">Bourse</label></br>
                                    <input id="oui" class="with-gap" name="student_grantholder" type="radio" value="Oui"/>
                                    <label class="button" for="oui">Oui</label>                       
                                    <input id="non" class="with-gap" name="student_grantholder" type="radio" value="Non"/>  
                                    <label class="button" for="non">Non</label> </br>
                                    <label for="">Groupe</label>
                                    <input type="text" class="form-control" placeholder="Placeholder" value="<?php echo $result[22]; ?>" name="student_group">
                                    <label for="">Commentaires</label>
                                    <input type="text" class="form-control" placeholder="Placeholder" value="<?php echo $result[21]; ?>" name="student_comment">

                                    <label>Type de formation</label>
                                        <select name="student_status">
                                            <option value="FI">
                                                FI
                                            </option>
                                            <option value="FA">
                                                FA
                                            </option>
                                            <option value="FC">
                                                FC
                                            </option>
                                            <option value="CP">
                                                CP
                                            </option>
                                        </select>
                                </div>
                                
                                <button type="submit" name="student_update" class="btn btn-primary">Enregistrer</button>
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