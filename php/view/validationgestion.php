<?php
	session_start();
	include_once('./pageview.php');
	include_once('../controller/pagecontroller.php');
	include_once('../controller/accountcontroller.php');
	include_once('../model/db.php');
	include_once('../model/accountmodel.php');
	include_once('../view/accountview.php');

	$accountController = new AccountController();
	$accountController -> controlGestion();
