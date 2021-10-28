<?php

      
		require_once '../../Configuration.php';
	    require_once base_app.'/core/connection.php';
		include base_app.'includes/header.php';
         
		 //POUR LA LISTE DEROULANTE DE LA REGION
	$region = $con->prepare('SELECT * FROM region order by nom_region');
	$region->execute();
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
		 
		  
   	</div>
	
	<div class="container">
		<div class="row">
			<div class="col-lg-6 mt-5 py-3 m-auto">
				<div class="card bg-light ">					
					<div class="card-title">
					<h2 class="text-center">INSCRIPTION</h2>
					<hr>
					</div>
							<?php
							if(isset($message)){
								echo $message;
							}
							?>
					<div id="status"></div>
					<div class="card-body">
						<form class="form" method="post" action="" >
											
                          <label for="nom">Nom Complet:</label>
                          <input type="text" id="nom_complet" name="nom_complet" class="form-control py-2 mb-2" autocomplete="off"  required >
							<small id="out_nom"></small>									                                            
                          <label for="login">Login:</label>
                          <input type="text" id="login" name="login" class="form-control py-2 mb-2" autocomplete="off" maxlength="16"  required >
						<small id="out_login"></small>                                            
                        <label for="mdp">Mot de Pass:</label>
                        <input type="password" id="motdepass1" name="motdepass1" class="form-control py-2 mb-2" required>
						<small id="out_motdepass1"></small>                                           
                        <label for="confirmation">Confirmation:</label>
                        <input type="password" id="motdepass2" name="motdepass2" class="form-control py-2 mb-2" required >
						<small id="out_motdepass2"></small>                                          											
                        <label for="region">Région:</label>
                        <select name="region" class="form-control py-2 mb-2" id="region" onChange="ListeDepartement(this.value);">
						<option value="0">Sélectionner</option>
												
						<?php 
						foreach($region as $region)
						{?>
						<option											
						value="<?php echo  $region['id'] ?>" > 
						<?php echo  $region['nom_region'] ?> 														
						</option>
						<?php }?>												
						</select> 
                                            
											
											
                                                <label for="departement">Département:</label>
                                                <select name="departement" class="form-control py-2 mb-2" onChange="ListeCommune(this.value);" id="list_depart">
												<option value="0">Sélectionner</option>
												
												</select>
                                           
											
                                                <label for="commune">Commune:</label>
                                                <select name="commune" class="form-control py-2 mb-2" id="list_comm" >
												<option value="0">Sélectionner</select>
												</select>
                                            
                                              
                                                <label for="email">Adresse Mail:</label>
                                                <input type="text" name="email" class="form-control py-2 mb-2" required>
                                            
                                            
                                                <label for="telephone">Téléphone:</label>
                                                <input type="telephone" id="telephone" name="telephone" required class="form-control py-2 mb-2" autocomplete="off" >
												<small id="out_telephone"></small>
                                                                   
                                           
                                            <button type="submit" name="envoyer" class="btn btn-success btn-block">Envoyer</button>
                                            </form>
											<a href="index" class="btn btn-danger btn-block">Annuler</a>
					
					</div>
				</div>
			
			</div>		
		</div>
	</div>
	
	
	
	
	
   
			<?php
			include base_app.'/includes/footer.php';
			?>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script>
		  $(document).ready(function(){
			 
			  $('input').focus(function(){
				  $('#status').fadeOut(800);
			  });
			  $('#nom_complet').keyup(function(){
				  if($(this).val().length < 6){
					  $("#out_nom").css("color","red").html("Minimum 6 caractéres<br/>");
					  
				  }else{
					  $("#out_nom").css("color","green").html("Valide<br/>");
					  
				  }
			  });
			  $('#login').keyup(function(){
				  if($(this).val().length < 5){
					  $("#out_login").css("color","red").html("Le login doit etre supérieur à 5 caractéres <br/>");
					
				 }else{
					  $("#out_login").css("color","green").html("Valide<br/>");
					  return true;
				  }
			  });
			  $('#telephone').keyup(function(){
				  if($(this).val().length !=9) {
					  $("#out_telephone").css("color","red").html("Numéro incorrecte<br/>");
				  
				  }else{
					  $("#out_telephone").css("color","green").html("Valide<br/>");
				 
				  }
			  });
			  
			  $('#motdepass1').keyup(function(){
				  if($(this).val().length < 6){
					  $("#out_motdepass1").css("color","red").html("Minimum 6 caractéres<br/>");
				  
				  }else if($("#motdepass2").val() != "" && $("#motdepass2").val() != $("#motdepass1").val())
				  {
					  $("#out_motdepass1").html("Les Mots de passe doivent etre identiques<br/>");
					  $("#out_motdepass2").html("Les Mots de passe doivent etre identiques<br/>");
				  
				  }else{
					  $("#out_motdepass1").css("color","green").html("Valide<br/>");
					  return true;
					  if($("#motdepass2").val() != ""){
						  $("#out_motdepass2").css("color","green").html("Valide<br/>");
						  
					  }
				  }
			  });
			  $('#motdepass2').keyup(function(){
				  if($(this).val() != "" && $("#motdepass1").val() != $("#motdepass2").val()){
					  $("#out_motdepass2").css("color","red").html("Mot de passe non identique<br/>");
				  
				  }else{
					  $("#out_motdepass2").css("color","green").html("Valide<br/>");
				  
				  }
			  });
			  
			  
			  
			});  
		  	
			function ListeDepartement(val) {
			$.ajax({
			type: "POST",
			url: "liste_departement.php",
			data:'id_region='+val,
			success: function(data){
				$("#list_depart").html(data);
			}
			});
			}
		  function ListeCommune(val) {
			$.ajax({
			type: "POST",
			url: "liste_commune.php",
			data:'id_departement='+val,
			success: function(data){
				$("#list_comm").html(data);
			}
			});
		}
	  
		  </script>
</body>
</html>