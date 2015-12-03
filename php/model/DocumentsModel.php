<?php

/**
* @Params int training_id, int student_group
* fonction qui récupère les étudiants correspondant au groupe voulu et renvoie cette liste sous form de tableau indexé
**/
function getStudentsByTrainingGroup($training_id = null, $student_group = null){

    if($training_id == null || $student_group == null)
        return false;
      
    $mysqli = new mysqli("mysql-maquetteprojet.alwaysdata.net", "114038_equipe1", "q}2[u9LE", "maquetteprojet_zenetude");
    if ($mysqli->connect_errno)
    {
        echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    
    if ($result = $mysqli->query("SELECT  student_id, Student.user_id, student_personalemail, student_origin, student_avatar,
                                         user_name, description, user_firstname, Departement.departement_name
                                FROM    Student JOIN User ON Student.user_id = User.user_id 
                                        JOIN Training ON Student.training_id = Training.training_id
                                        JOIN Departement ON Training.departement_id = Departement.departement_id
                                WHERE   Training.training_id = ".$training_id." 
                                AND     student_group = ".$student_group." 
                                ORDER BY user_name")) {
            
        for ($tablearesultat = array (); $row = $result->fetch_assoc(); $tablearesultat[] = $row);
        
        return $tablearesultat;
    }
} // getStudentsByTrainingGroup()


function getStudentsGroupByTrainingGroup() {

    $mysqli = new mysqli("mysql-maquetteprojet.alwaysdata.net", "114038_equipe1", "q}2[u9LE", "maquetteprojet_zenetude");
    if ($mysqli->connect_errno)
    {
        echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }

    if ($result = $mysqli->query("SELECT student_group, description, Training.training_id AS 'training'
                                FROM Student JOIN Training ON Student.training_id = Training.training_id
                                ORDER BY description, student_group")) {

        for ($tablearesultat = array (); $row = $result->fetch_assoc(); $tablearesultat[] = $row);

        return $tablearesultat;
    }
} // getStudentsGroupByTrainingGroup()
