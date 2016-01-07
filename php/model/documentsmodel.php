<?php

/**
 * Get students using training id and student group
 * @param int $training_id contains the training id
 * @param int $student_group contains the student group
 * @return array|bool|null
 */
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

/**
 * Get student groups of the training manager's training(s) using $_SESSION['infoRF']['training_manager_id']
 * @return array|null
 */
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
