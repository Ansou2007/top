<?php
	require_once '../../Configuration.php';
	require_once base_app.'core/connection.php';
	session_start();
		
		if(isset($_POST['enregistrer'])) 
			{
            //On nettoie les valeurs
				$id_utilisateur = $_POST['id_utilisateur'];
				$code = $_POST['numero'];
                $date = date("Y-m-d H:i:s"); 									
				$description = strip_tags($_POST['description']);				
				$contact = strip_tags($_POST['contact']);
			 if(empty($description) || is_numeric($description[0])){
				 $_SESSION['erreur']= "Vérifier le nom complet";
				 header('refresh:2,url=trouve');
			
			 }elseif(!preg_match("#^\+?[0-9\./, -]{9}$#",trim($contact))){
				 $_SESSION['erreur']= "Le numéro de télephone est invalide";
				  header('refresh:2,url=trouve'); 	 
			 }
			 else{
				//On prepare la requete
				$query = $con->prepare('INSERT INTO declaration_trouve(id_utilisateur,code_trouve,descriptions,contact,date_declaration) VALUES (?,?,?,?,?)');
                //On execute la requete
         $query->execute(array($id_utilisateur,$code,$description,$contact,$date));
		 $_SESSION['ok']= "Ajout avec succées";
		 
			}       
		 	 
		 	 
		 
			header("location:trouve"); 
		 }
         
	 


?>