<?php
/**
 * Created by PhpStorm.
 * User: m15026768
 * Date: 23/11/2015
 * Time: 14:59
 */
function connect()
{
    $db = new PDO('mysql:host=localhost;dbname=zenetude', "root", "root");
    return $db;
}
