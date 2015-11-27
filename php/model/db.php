<?php
/**
 * Created by PhpStorm.
 * User: m15026768
 * Date: 23/11/2015
 * Time: 14:59
 */
function connect()
{
    $db = new PDO('mysql:host=mysql-maquetteprojet.alwaysdata.net;dbname=maquetteprojet_zenetude', "114038_equipe1", "q}2[u9LE");
    return $db;
}
