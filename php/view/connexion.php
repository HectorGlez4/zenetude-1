<?php
/**
 * Created by PhpStorm.
 * User: m15026768
 * Date: 23/11/2015
 * Time: 14:55
 */
session_start();

include_once( '../model/db.php');
include_once('../controller/accountcontroller.php');
include_once('../model/accountmodel.php');
include_once('accountview.php');
$accountController = new AccountController();
$accountController->controlConnection();

