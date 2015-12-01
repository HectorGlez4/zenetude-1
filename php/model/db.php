<?php
/**
 * Created by PhpStorm.
 * User: m15026768
 * Date: 23/11/2015
 * Time: 14:59
 */
function connect()
{
	try{
    	$db = new PDO('mysql:host=localhost; dbname=maquetteprojet_zenetude', "root", "");
		return $db;
	}
	catch(PDOException $e){
		$e->getMessage();
	}
    //return $db;
}
