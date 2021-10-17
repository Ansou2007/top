<?php

$serveur = "localhost";
$database = "trouve_ou_perdu";
$username = "root";
$password = "";

if(!defined('base_url')) define('base_url','http://localhost/top/');
if(!defined('base_app')) define('base_app', str_replace('\\','/',__DIR__).'/' );

try{
	
	$con = new PDO("mysql:host=$serveur;dbname=$database",$username,$password );
	$con->exec('SET NAMES UTF8');
    
}
catch(PDOExeception $e){
	echo '<h2>Connexion impossible<h2>'.$e->getMessage();
}