<?php
/**
 * Created by PhpStorm.
 * User: m15026768
 * Date: 23/11/2015
 * Time: 14:55
 */
include_once( '../php/model/db.php');
include_once('../php/controller/AccountController.php');
include_once('../php/model/AccountModel.php');
include_once('../php/view/AccountView.php');
ini_set('display_errors', 1);
$accountController = new AccountController();
$accountController->controlConnection();