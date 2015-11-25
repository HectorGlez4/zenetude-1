<?php

$pdo = new PDO('mysql:host= mysql-maquetteprojet.alwaysdata.net;dbname=maquetteprojet_zenetude', '114038_equipe1', '123456');

/**
* @Params int training_id, int student_group
* fonction qui récupère les étudiants correspondant au groupe voulu et renvoie cette liste sous form de tableau indexé
**/
function getStudentsByTrainingGroup(int $training_id = 0, int $student_group = 0){

    if($training_id == 0 || $student_group == 0)
        return false;
        
    $sql = "SELECT  student_id, Student.user_id, student_personnalemail, student_origin, student_avatar, user_name, user_firstname 
            FROM    Student LEFT JOIN User USING user_id 
            WHERE   training_id = ".$training_id." 
            AND     student_group = ".$student_group;
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    
    return $stmt->fetchAll();
}
