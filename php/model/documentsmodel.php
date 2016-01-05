<?php

/**
* @Params int training_id, int student_group
* fonction qui récupère les étudiants correspondant au groupe voulu et renvoie cette liste sous form de tableau indexé
**/
function getStudentsByTrainingGroup($training_id = null, $student_group = null){

    if($training_id == null || $student_group == null)
        return false;
      
    include_once('db.php');
    $db = connect();
    $result = $db->query("SELECT student_id, Student.user_id, student_personalemail, student_origin, student_avatar,
                                     user_name, description, user_firstname, Departement.departement_name, student_trombi
                            FROM    Student JOIN User ON Student.user_id = User.user_id 
                                    JOIN Training ON Student.training_id = Training.training_id
                                    JOIN Departement ON Training.departement_id = Departement.departement_id
                            WHERE   Training.training_id = ".$training_id." 
                            AND     student_group = ".$student_group." 
                            ORDER BY user_name");
    if(empty($result))
        return null;

    $tablearesultat = $result->fetchALL(PDO::FETCH_ASSOC);
    return $tablearesultat;
    
} // getStudentsByTrainingGroup()


function getStudentsGroup() {

    include_once('db.php');
    $db = connect();
    $result = $db->query("SELECT DISTINCT student_group, description, Training.training_id, Student.user_id
                                FROM Student JOIN Training ON Student.training_id = Training.training_id
                                WHERE Training.training_id <> 1 AND training_manager_id = '".$_SESSION['infoRF']['training_manager_id']."'
                                ORDER BY description, student_group");

    if(empty($result))
        return null;

    $tablearesultat = $result->fetchALL(PDO::FETCH_ASSOC);
    return $tablearesultat;
} // getStudentsGroup()