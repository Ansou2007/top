<?php

$serveur = "localhost";
$database = "trouve_ou_perdu";
$username = "root";
$password = "";

try{
	
	$con = new PDO("mysql:host=$serveur;dbname=$database",$username,$password );
	$con->exec('SET NAMES UTF8');
    //$con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
}
catch(PDOExeception $e){
	echo '<h2>Connexion impossible<h2>'.$e->getMessage();
}