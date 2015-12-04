<?php
    include_once( '../model/db.php');
    include_once('../controller/AccountController.php');
    include_once('../model/AccountModel.php');
    include_once('AccountView.php');
    $accountController = new AccountController();
    $accountController->controlInscription();


