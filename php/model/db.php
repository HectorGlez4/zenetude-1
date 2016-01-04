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
		$db = new PDO('mysql:host=mysql-maquetteprojet.alwaysdata.net;dbname=maquetteprojet_zenetude', "114038_equipe1", "q}2[u9LE", array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));		return $db;
	}
	catch(PDOException $e){
		$e->getMessage();
	}
    //return $db;
}
