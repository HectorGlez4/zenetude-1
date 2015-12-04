<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once 'db.php';

function addDataFacebook($email, $picture){
    $co = connect();
    $data = $co->query("SELECT * FROM Student WHERE student_instituteemail = '$email' OR student_personnalemail = '$email'");
    $res = $data->fetch(PDO::FETCH_OBJ);

    if (count($res) != 0){
	    $id = $res->student_id;
		$_SESSION['id'] = $id;
        $co->query("UPDATE Student 
					SET `student_avatar` = '$picture'
					WHERE `student_id` = $id"
				  );

		$_SESSION['image'] = $picture;
		print_r($co->errorInfo());
	}
}

function addDataGoogle($email, $picture){
	$co = connect();
    $data = $co->query("SELECT * FROM Student WHERE student_instituteemail = '$email' OR student_personnalemail = '$email'");
    $res = $data->fetch(PDO::FETCH_OBJ);

    if (count($res) != 0){
	    $id = $res->student_id;
		$_SESSION['id'] = $id;
        $co->query("UPDATE Student 
					SET `student_avatar` = '$picture'
					WHERE `student_id` = $id"
				  );

		$_SESSION['image'] = $picture;
		print_r($co->errorInfo());

	}
        
}



function addDataTwitter($email, $picture){

	try{
		$co = connect();
		$data = $co->query("SELECT * FROM Student WHERE student_instituteemail = '$email' OR student_personnalemail = '$email'");
		$res = $data->fetch(PDO::FETCH_OBJ);

		if (count($res) != 0){
		
			$id = $res->student_id;
			$_SESSION['id'] = $id;
		    $co->query("UPDATE Student 
						SET `student_avatar` = '$picture'
						WHERE `student_id` = $id"
					  );
			//echo '<script>document.location.href="index.php"</script>';
			$_SESSION['image'] = $picture;
			print_r($co->errorInfo());
		}

	} catch (PDOException $e) {

    	echo $e->getMessage();
	}

       
}

