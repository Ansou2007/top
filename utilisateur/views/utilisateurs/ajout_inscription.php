<?php
	//VERIFICATION DE LA CASE NOM COMPLET
	/*if(!empty($_POST['nom_complet'])){
		$nom_complet = $_POST['nom_complet'];
		if(strlen($nom_complet) < 5  || strlen($nom_complet) > 45){
			echo '<br/>Le nom complet est compris entre 5 à 45 caractéres';
			exit();
		} 
		if(is_numeric($nom_complet[0])){
			echo '<br/>Le  premiers caractéres doit etre une lettre';
			exit();
		}
	}*/
		
            //CHARGEMENT
           if($_POST){
            if(isset($_POST['envoyer'])){ 

          $region = $_POST['region'];  
          $departement = $_POST['departement'];    
          $commune = $_POST['commune'];  
          $nom_complet = strip_tags($_POST['nom_complet']) ;     
          $login = strip_tags($_POST['login']); 
          $motdepass = password_hash($_POST['motdepass1'],PASSWORD_DEFAULT);
          $telephone = $_POST['telephone'];
          $email=filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
          //LISTE DES UTILISATEURS
		
        $query = $con->prepare("SELECT login,email,telephone FROM utilisateur WHERE login=? OR email=? OR telephone=? ");
        $query->execute(array($login,$email,$telephone));
        $resultat = $query->fetchAll();
      
                //CONDITION
        if($_POST['motdepass1'] != $_POST['motdepass2']){
                    $message= '<div class="alert alert-danger text-center">' .'Mot de passe non identique'.'</div>';
				header('refresh:2,url=creer_compte');	
         }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $message= '<div class="alert alert-danger text-center">' .'Mail invalide'.'</div>';
            header('refresh:2,url=creer_compte');
        }elseif(!preg_match("#^\+?[0-9\./, -]{9}$#",trim($telephone))){
            $message= '<div class="alert alert-danger text-center">' .'Numero de télephone invalide'.'</div>';
			header('refresh:2,url=creer_compte');
        }elseif($resultat){
            $message ='<div class="alert alert-danger text-center">' .'Login,email ou Télephone existant'.'</div>';
			header('refresh:2,url=creer_compte');
		}elseif($_POST['region']== 0 ){
			 $message ='<div class="alert alert-danger text-center">' .'La région est Obligatoire'.'</div>';
			header('refresh:2,url=creer_compte');
		}elseif($_POST['departement']== 0 ){
			 $message ='<div class="alert alert-danger text-center">' .'Le Département est Obligatoire'.'</div>';
		header('refresh:2,url=creer_compte');
		}elseif($_POST['commune']== 0 ){
			 $message ='<div class="alert alert-danger text-center">' .'La commune est Obligatoire'.'</div>';
			header('refresh:2,url=creer_compte');
		}else{
  
            $query = $con->prepare("INSERT INTO utilisateur(id_region,id_departement,id_commune,nom_complet,login,motdepass,telephone,email) VALUES(?,?,?,?,?,?,?,?)");
         $query->execute(array($region,$departement,$commune,$nom_complet,$login,$motdepass,$telephone,$email));

       $message= '<div class="alert alert-success text-center">' .'Inscription réussie !'.'</div>';
      header('refresh:2,url="index.php"');
        
             }   
       
    
    }
    }






?>