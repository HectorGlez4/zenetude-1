<?php

if(!empty($_POST['email']))
{
// Connection à la base de données
$bdd = new PDO('mysql:host=localhost;dbname=zenetude', 'root', 'root');

// On récupère les données POST
$email = $_POST["email"];
$password = $_POST["passe"];
$password2= $_POST["passe2"];

if($password != $password2)
 {		
	echo 'Les deux mots de passe que vous avez rentr&eacutes ne correspondent pas';
	
 }
else
 {
	// Cryptage du mot de passe
	$password = sha1($password); 
	// Insertion dans la base de données
	$bdd->query("INSERT INTO users (`user_password`, `user_instituteemail`) VALUES ('$password', '$email')");
	// Redirection vers la page d'accueil
	header('Location: ../index.html');
 }

}

?>



