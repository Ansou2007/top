<?php

		session_start();
		
			$erreur = array();
	if(isset($_POST['valider'])){
		$login = strip_tags(trim($_POST['email']));
		$motdepass = strip_tags($_POST['motdepass']);
		if(empty($login)){
			//$erreur = '<div class="alert alert-danger">'.'Le champ email est vide' .'</div>';
			$erreur['mail'] = 'Le champ email est vide';
			
		}
		if(empty($motdepass)){
			$erreur['password'] = "Le champ Mot de passe est vide";
		}
		if(count($erreur)===0){

		
		$query=$con->prepare("SELECT utilisateur.id,nom_complet,email,motdepass,etat,role,nom_region,nom_departement,nom_commune,utilisateur.id_region,utilisateur.id_commune,utilisateur.id_departement FROM utilisateur,region,departement,commune WHERE email=? AND utilisateur.id_commune=commune.id AND utilisateur.id_departement=departement.id AND utilisateur.id_region=region.id ");		
		$query->bindValue(1,$login);
		$query->execute();
		$utilisateur=$query->fetch();
		}
		if(!password_verify($motdepass,$utilisateur['motdepass'])){
			$erreur['incorrect'] = 'Login ou Mot de passe incorrecte';
		}else{
			if($utilisateur['etat']==="0" )
			{
				$erreur['compte'] = 'Compte non  activé,Contacter les administrateur' ;
			}else{		
				
			header('location:accueil');
			$_SESSION['utilisateur'] = $utilisateur;
			$_SESSION['time'] = time();
			}
		}
		

		

	}
?>