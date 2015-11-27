<?php
    include_once( '../php/model/db.php');
    include_once('../php/controller/AccountController.php');
    include_once('../php/model/AccountModel.php');
    include_once('../php/view/AccountView.php');
    ini_set('display_errors', 1);
    $accountController = new AccountController();
    $accountController->controlInscription();




