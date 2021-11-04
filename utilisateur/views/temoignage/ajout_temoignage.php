<?php
	require_once '../../Configuration.php';
	require_once base_app.'core/connection.php';
	session_start();
		
		if(isset($_POST['enregistrer'])) 
			{
            //On nettoie les valeurs
				$id_utilisateur = $_POST['id_utilisateur'];				
                $date = date("Y-m-d H:i:s"); 									
				$message = strip_tags($_POST['message']);								
			 if(empty($message) || is_numeric($description[0])){
				 $_SESSION['temoignage_erreur']= "Vérifier le message ";
				 header('refresh:2,url=temoignage');						 	 
			 }
			 else{
				//On prepare la requete
				$query = $con->prepare('INSERT INTO temoignage(id_utilisateur,message,date_temoignage) VALUES (?,?,?)');
                //On execute la requete
         $query->execute(array($id_utilisateur,$message,$date));
		 $_SESSION['temoignage_ok']= "Ajout avec succées";
		 
			}       	 
			header("location:temoignage"); 
		 }
         
	 


?>