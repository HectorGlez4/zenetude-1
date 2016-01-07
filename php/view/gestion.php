<?php
session_start();
if (isset($_GET['erreur'])){
    echo "<script>alert('Erreur d\'authentification !');</script>";
}
include_once('./pageview.php');
include_once('../controller/pagecontroller.php');
include_once('../model/db.php');
include_once('../model/accountmodel.php');
include_once('../view/accountview.php');

$accountmodel = new AccountModel();
$pageController = new PageController();
$pageView = new PageView();
$accountView = new AccountView();
$db = connect();
$pageController -> controlConnexion();

$rf = $pageController-> controlGestion();

$idUser = $_SESSION['infoUser']['user_id'];
if(!$rf){
    $request = $db->prepare('SELECT * FROM Student WHERE user_id = '.$idUser);
    $request->execute();
    $result = $request->fetch();
    

    $request = $db->prepare('SELECT description, training_id FROM Training');
    $request->execute();
    $result2 = $request->fetchAll();
}
$request = $db->prepare('SELECT * FROM User WHERE user_id = '.$idUser);
$request->execute();
$result4 = $request->fetch();



    if (isset($_POST['student_update']) ) //SI LE FORMULAIRE A ETE ENVOYE
    {

    $pageController -> uploadPhoto();
    $pageController -> uploadTrombi();
    $pageController -> modifyPassword();

    $user_id=$_POST['user_id'];
    $user_name=$_POST['user_name'];
    $user_firstname=$_POST['user_firstname'];
    $user_civility=$_POST['user_civility'];
    if(!$rf){
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
        $training_description=$_POST['training_description'];
        $student_educationallevel=$_POST['student_educationallevel'];
        $student_grantholder=$_POST['student_grantholder'];

        $request = $db->prepare('SELECT training_id FROM Training WHERE description = "'.$training_description.'"');
        $request->execute();
        $result3 = $request->fetchAll();
        $training_id = $result3[0][0];
    }

    if(!$rf){
        $values = array(htmlspecialchars($user_name),
                        htmlspecialchars($user_firstname),
                        htmlspecialchars($user_civility),
                        htmlspecialchars($student_personalemail),
                        htmlspecialchars($student_phone),
                        htmlspecialchars($student_mobile),
                        htmlspecialchars($student_address1),
                        htmlspecialchars($student_address2),
                        htmlspecialchars($student_zipcode),
                        htmlspecialchars($student_city),
                        htmlspecialchars($student_country),
                        htmlspecialchars($student_nationality),
                        htmlspecialchars($student_birthday),
                        htmlspecialchars($student_birtharea),
                        htmlspecialchars($student_birthcountry),
                        htmlspecialchars($student_status),
                        htmlspecialchars($student_educationallevel),
                        htmlspecialchars($student_origin),
                        htmlspecialchars($student_comment),
                        htmlspecialchars($student_group),
                        htmlspecialchars($student_birthcity),
                        htmlspecialchars($training_id),
                        htmlspecialchars($student_educationallevel),
                        htmlspecialchars($student_grantholder)
                        );
    }
    else
        $values = array($user_name,
                        $user_firstname,
                        $user_civility);

        foreach ($values as $key => $value) {
            if (empty($value)) {
                $values[$key] = null;
            } else {
                $values[$key] = $value;
            }
        }
    if(!$rf){
        if ($_SESSION['infoTraining']['training_max_group'] >= $values[19] ) {
            $update = $db->query("UPDATE Student SET 
            student_personalemail = '$values[3]',
            student_phone = '$values[4]',
            student_mobile = '$values[5]',
            student_address1 = '$values[6]',
            student_address2 = '$values[7]',
            student_zipcode = '$values[8]',
            student_city = '$values[9]',
            student_country = '$values[10]',
            student_nationality = '$values[11]',
            student_birthdate = '$values[12]',
            student_birtharea = '$values[13]',
            student_birthcountry = '$values[14]',
            student_status = '$values[15]',
            student_educationallevel = '$values[16]',
            student_origin = '$values[17]',
            student_comment = '$values[18]',
            student_group = '$values[19]',
            student_birthcity = '$values[20]',
            training_id = '$values[21]',
            student_educationallevel = '$values[22]',
            student_grantholder = '$values[23]'
            WHERE user_id='$idUser'");
        }
    }

    $update2 = $db->query("UPDATE User SET
    user_name = '$values[0]',
    user_firstname = '$values[1]',
    user_civility = '$values[2]'
    WHERE user_id='$idUser'");

    if(!$rf){
        $_SESSION['infoStudent']['student_personalemail'] = $values[3];
        $_SESSION['infoStudent']['student_phone'] = $values[4];
        $_SESSION['infoStudent']['student_mobile'] = $values[5];
        $_SESSION['infoStudent']['student_address1'] = $values[6];
        $_SESSION['infoStudent']['student_address2'] = $values[7];
        $_SESSION['infoStudent']['student_zipcode'] = $values[8];
        $_SESSION['infoStudent']['student_city'] = $values[9];
        $_SESSION['infoStudent']['student_country'] = $values[10];
        $_SESSION['infoStudent']['student_nationality'] = $values[11];
        $_SESSION['infoStudent']['student_birthdate'] = $values[12];
        $_SESSION['infoStudent']['student_birtharea'] = $values[13];
        $_SESSION['infoStudent']['student_birthcountry'] = $values[14];
        $_SESSION['infoStudent']['student_status'] = $values[15];
        $_SESSION['infoStudent']['student_educationallevel'] = $values[16];
        $_SESSION['infoStudent']['student_origin'] = $values[17];
        $_SESSION['infoStudent']['student_comment'] = $values[18];
        $_SESSION['infoStudent']['student_group'] = $values[19];
        $_SESSION['infoStudent']['student_birthcity'] = $values[20];
        $_SESSION['infoStudent']['training_id'] = $values[21];
        $_SESSION['infoStudent']['student_educationallevel'] = $values[22];
        $_SESSION['infoStudent']['student_grantholder'] = $values[23];
    }
    $_SESSION['infoUser']['user_name'] = $values[0];
    $_SESSION['infoUser']['user_firstname'] = $values[1];
    $_SESSION['infoUser']['user_civility'] = $values[2];

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

        <div id="filtre"></div>

        <div class="container">
            <div class="row">
                <div class="col s12 m8">
                    <div class="card-panel teal" id="bloc2">
                        <div class="card-title"> <h3>Gestion du compte</h3></div>
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" role="form" enctype="multipart/form-data">
                            <?php if (!$rf){ ?>
                            <div class="form-group">
                                <input type="hidden" class="form-control" value="<?php echo $_SESSION['infoUser']['user_id']; ?>" name="user_id">
                                <div class="row">
                                    <div class="col s6">
                                        <label for="">Nom</label>
                                        <input type="text" class="form-control" value="<?php echo $result4[3];?>" name="user_name">
                                    </div>
                                    <div class="col s6">
                                        <label for="">Prénom</label>
                                        <input type="text" class="form-control" value="<?php echo $result4[4];?>" name="user_firstname">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s6">
                                        <label>Civilité</label>
                                        <select name="user_civility">
                                            <option value="Monsieur" <?php if($result4[5] == "Monsieur") echo " selected='selected'";?>>Monsieur</option>
                                            <option value="Madame" <?php if($result4[5] == "Madame") echo " selected='selected'";?>>Madame</option>
                                            <option value="Mademoiselle"<?php if($result4[5] == "Mademoiselle") echo " selected='selected'";?>>Mademoiselle</option>
                                        </select>
                                    </div>
                                    <div class="col s6">
                                        <label for="">Mail personnel</label>
                                        <input type="email" class="form-control validate" value="<?php echo $result[4]; ?>" name="student_personalemail">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s6">
                                        <label for="">Telephone</label>
                                        <input type="tel" pattern = '[0-9]{10}' placeholder ='0412345678' maxlength = '10' class="form-control" value="<?php echo $result[5]; ?>" name="student_phone">
                                    </div>
                                    <div class="col s6">
                                        <label for="">Portable</label>
                                        <input type="tel" pattern = '[0-9]{10}' placeholder ='0612345678' maxlength = '10' class="form-control" value="<?php echo $result[6]; ?>" name="student_mobile">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s6">
                                        <label for="">Adresse 1</label>
                                        <input type="text" class="form-control" value="<?php echo $result[7]; ?>" name="student_address1">
                                    </div>
                                    <div class="col s6">
                                        <label for="">Adresse 2</label>
                                        <input type="text" class="form-control" value="<?php echo $result[8]; ?>" name="student_address2">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s6">
                                        <label for="">Code postal</label>
                                        <input type="text" class="form-control" value="<?php echo $result[9]; ?>" name="student_zipcode" maxlength="5">
                                    </div>
                                    <div class="col s6">
                                        <label for="">Ville</label>
                                        <input type="text" class="form-control" value="<?php echo $result[10]; ?>" name="student_city">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s6">
                                        <label for="">Pays</label>
                                        <input type="text" class="form-control" value="<?php echo $result[11]; ?>" name="student_country">
                                    </div>
                                    <div class="col s6">
                                        <label for="">Nationalité</label>
                                        <input type="text" class="form-control" value="<?php echo $result[12]; ?>" name="student_nationality">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s6">
                                        <label for="">Date de naissance</label>
                                        <input type="date" class="form-control datepicker" value="<?php echo $result[13]; ?>" name="student_birthday">
                                    </div>
                                    <div class="col s6">
                                        <label for="">Ville de naissance</label>
                                        <input type="text" class="form-control" value="<?php echo $result[14]; ?>" name="student_birthcity">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s6">
                                        <label for="">Region de naissance</label>
                                        <input type="text" class="form-control" value="<?php echo $result[15]; ?>" name="student_birtharea">
                                    </div>
                                    <div class="col s6">
                                        <label for="">Pays de naissance</label>
                                        <input type="text" class="form-control" value="<?php echo $result[16]; ?>" name="student_birthcountry">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s6">
                                        <label for="">Origine</label>
                                        <input type="text" class="form-control" value="<?php echo $result[20]; ?>" name="student_origin">
                                    </div>
                                    <div class="col s6">
                                        <label for="">Niveau d'études</label>
                                        <select name="student_educationallevel">
                                            <option value="BAC" <?php if($result[19] == "BAC") echo " selected='selected'";?>>BAC</option>
                                            <option value="BAC+1"<?php if($result[19] == "BAC+1") echo " selected='selected'";?>>BAC+1</option>
                                            <option value="BAC+2"<?php if($result[19] == "BAC+2") echo " selected='selected'";?>>BAC+2</option>
                                            <option value="BAC+3"<?php if($result[19] == "BAC+3") echo " selected='selected'";?>>BAC+3</option>
                                            <option value="BAC+4"<?php if($result[19] == "BAC4") echo " selected='selected'";?>>BAC+4</option>
                                            <option value="BAC+5"<?php if($result[19] == "BAC+5") echo " selected='selected'";?>>BAC+5</option>
                                            <option value="BAC+6"<?php if($result[19] == "BAC+6") echo " selected='selected'";?>>BAC+6</option>
                                            <option value="BAC+7"<?php if($result[19] == "BAC+7") echo " selected='selected'";?>>BAC+7</option>
                                            <option value="BAC+8"<?php if($result[19] == "BAC+8") echo " selected='selected'";?>>BAC+8</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s6">
                                        <label>Formation actuelle</label>
                                        <select name="training_description">
                                            <?php
                                                foreach ($result2 as $value) {
                                                    if ($value[0] !== NULL) {
                                                        echo "<option value=" . $value[0];
                                                        if( $value[1] == $result[2]) 
                                                            echo " selected='selected'";
                                                        echo ">" . $value[0] . "</option>";
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col s6">
                                        <label name="student_grantholder" for="">Boursier</label></br>
                                        <input id="oui" class="with-gap" name="student_grantholder" type="radio" value="1"<?php if($result[21] == "1") echo "checked ='ckecked'";?>/>
                                        <label class="button" for="oui">Oui</label>                       
                                        <input id="non" class="with-gap" name="student_grantholder" type="radio" value="0"/<?php if($result[21] == "0") echo "checked ='ckecked'";?>>
                                        <label class="button" for="non">Non</label> </br>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s6">
                                        <label for="">Groupe</label>
                                        <input type="text" class="form-control" value="<?php if ($result[24] != "0") echo $result[24]; ?>" name="student_group">
                                    </div>
                                    <div class="col s6">    
                                        <label>Type de formation</label>
                                        <select name="student_status">
                                        <option value="FI" <?php if($result[18] == "FI") echo " selected='selected'";?>>FI</option>
                                        <option value="FA" <?php if($result[18] == "FA") echo " selected='selected'";?>>FA</option>
                                        <option value="FC"<?php if($result[18] == "FC") echo " selected='selected'";?>>FC</option>
                                        <option value="CP"<?php if($result[18] == "CP") echo " selected='selected'";?>>CP</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s6">
                                        <label>Votre photo de profil</label>
                                        <div class="image-upload">
                                            <label for="student_avatar">
                                            <img src="<?php echo $_SESSION['infoStudent']['student_avatar']; ?>"/>
                                            </label>
                                            <div class="file-field input-field">
                                                <div class="btn">
                                                    <span>Avatar</span>
                                                    <input type="file">
                                                </div>
                                                <div class="file-path-wrapper">
                                                    <input id="student_avatar" type="file" name='student_avatar'/>
                                                    <input class="file-path validate" type="text">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col s6">
                                        <label>Votre photo du trombinoscope</label>
                                        <div class="image-upload">
                                            <label for="student_trombi">
                                            <img src="<?php echo $_SESSION['infoStudent']['student_trombi']; ?>"/>
                                            </label>
                                            <div class="file-field input-field">
                                                <div class="btn">
                                                    <span>Photo</span>
                                                    <input type="file">
                                                </div>
                                                <div class="file-path-wrapper">
                                                    <input id="student_trombi" type="file" name='student_trombi'/>
                                                    <input class="file-path validate" type="text">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12">
                                         <label for="">Modifier mot de passe</label>
                                        <input type='password' placeholder="Ancien mot de passe" class="form-control" name='old_user_password' />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12">
                                <input type='password' placeholder="Nouveau mot de passe" class="form-control" name='new_user_password' />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12">
                                        <input type='password' placeholder="Confirmer nouveau mot de passe" class="form-control" name='confirm_new_user_password' />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12">
                                        <label for="">Commentaires</label>
                                        <textarea name="student_comment" rows="10" cols="10"><?php echo $result[23]; ?></textarea>
                                    </div>
                                </div>
                            <?php } else {?>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col s12">
                                            <label for="">Nom</label>
                                            <input type="text" class="form-control" value="<?php echo $result4[3];?>" name="user_name">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col s12">
                                            <label for="">Prénom</label>
                                            <input type="text" class="form-control" value="<?php echo $result4[4];?>" name="user_firstname">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col s12">
                                            <label>Civilité</label>
                                                <select name="user_civility">
                                                    <option value="Monsieur" <?php if($result4[5] == "Monsieur") echo " selected='selected'";?>>Monsieur</option>
                                                    <option value="Madame" <?php if($result4[5] == "Madame") echo " selected='selected'";?>>Madame</option>
                                                    <option value="Mademoiselle"<?php if($result4[5] == "Mademoiselle") echo " selected='selected'";?>>Mademoiselle</option>
                                                </select>
                                        </div>
                                    </div>
                            <?php } ?>
                                <div id="result"></div><!-- Retour de l'erreur en json -->
                                <input type="button" name="return" value="Retour" class="btn btn-primary btnbot" onclick="self.location.href='profil.php'">
                                <button type="submit" name="student_update" class="btn btn-primary right btnbot">Enregistrer</button>
                            </div> 
                        </form> 
                    </div><!-- Fin div col -->
                </div>
                <?php
                $pageView->showCalendar();
                ?>
            </div><!-- Fin row -->
        </div><!-- Fin container -->

        <?php
        $pageView->showFooter();
        $pageView->showjavaLinks();
        ?>

    </body>
</html>