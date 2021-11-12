<?php

	session_start();
		@$login = strip_tags(trim($_POST['email']));
		@$motdepass = strip_tags($_POST['motdepass']);
		@$valider=$_POST["valider"];	
	if(isset($valider)){
		
		$query=$con->prepare("SELECT utilisateur.id,nom_complet,email,motdepass,etat,role,nom_region,nom_departement,nom_commune,utilisateur.id_region,utilisateur.id_commune,utilisateur.id_departement FROM utilisateur,region,departement,commune WHERE email=? AND utilisateur.id_commune=commune.id AND utilisateur.id_departement=departement.id AND utilisateur.id_region=region.id ");
		//$query->setFetchMode(PDO::FETCH_ASSOC);
		$query->bindValue(1,$login);
		$query->execute();
		$utilisateur=$query->fetch();
		if(!password_verify($motdepass,$utilisateur['motdepass']))
		$erreur = "Login ou Mot de passe incorrecte";
		
		else{
			if($utilisateur['etat']==="0" )
			{
				$erreur = "Votre compte n'est pas activé,Contacter l'administrateur";
			}else{		
				
			header('location:accueil');
			$_SESSION['utilisateur'] = $utilisateur;
			$_SESSION['time'] = time();
			}
		}
	}
?>