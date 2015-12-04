<?php
    include_once( '../model/db.php');
    include_once('../controller/accountcontroller.php');
    include_once('../model/accountmodel.php');
    include_once('accountview.php');
    $accountController = new AccountController();
    $accountController->controlInscription();


