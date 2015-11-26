<?php
/**
 * Created by PhpStorm.
 * User: m15026768
 * Date: 23/11/2015
 * Time: 14:55
 */
require_once 'db.php';

if (count($_POST) > 0){
    $pseudo = $_POST['pseudo'];
    $mdp = $_POST['pass'];

    $co = connect();
    $result = $co->query("SELECT * FROM users WHERE `user_instituteemail` = '$pseudo' AND `user_password` = '$mdp'");
    if ($result->rowCount() != 0){
        $data = $result->fetch(PDO::FETCH_OBJ);
        session_start();
        $_SESSION['nom'] = $data->user_name;
        header('Location: index-connecte.php');

    }else{
        header('Location: ../index.html');

    }

}