<?php
    if(isset($_POST['mail'])) {
        include_once('../controller/accountcontroller.php');
        include_once('../model/accountmodel.php');
        include_once('./accountview.php');
        include_once('../../vendor/PHPMailer/PHPMailerAutoload.php');
        include_once( '../model/db.php');
        $accountController = new AccountController();
        $accountController -> controlRecoverPassword();
    }
        