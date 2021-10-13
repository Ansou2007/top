<?php

switch($_GET['action'])
{
	case "modifier" :
	if(!empty($_POST[''])){
		
		$query = $con->prepare("UPDATE departement SET WHERE id=?");		
		$query->execute(array());
		$message = "Modifier avec succés"
	}else{
		header('location:index.php');
	}
	
	break;
	case "supprimer":
	if(!empty($_POST[''])){
		$query = $con->prepare('DELETE * FROM departement WHERE  id=?');
		$query->execute();
		$message = "Supprimer avec succés";
	}else{
		header('location:index.php');
	}
}
