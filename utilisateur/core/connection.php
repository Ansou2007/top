<?php
$serveur="localhost";
$database="trouve_ou_perdu";
$utilisateur="root";
$modpass="";

	try{
		$con =new pdo("mysql:host=$serveur;dbname=$database",$utilisateur,$modpass);
	}catch(PDOException $e)
	{
		Die('Erreur :'.$e->getMessage());
	}



	


?>