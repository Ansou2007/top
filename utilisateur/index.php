<?php

require_once 'Configuration.php';
require_once('core/connection.php');
include('includes/header.php'); 
session_start();
		@$login = strip_tags(trim($_POST['login']));
		@$motdepass = strip_tags($_POST['mot_de_passe']);
		@$valider=$_POST["valider"];
	
	if(isset($valider)){
		$query=$con->prepare('select * from utilisateur,region,departement,commune where login=? and utilisateur.id_commune=commune.id and utilisateur.id_departement=departement.id ');
		//$query->setFetchMode(PDO::FETCH_ASSOC);
		$query->bindValue(1,$login);
		$query->execute();
		$utilisateur=$query->fetch();
		if(!password_verify($motdepass,$utilisateur['motdepass']))
		$erreur = "Login ou Mot de passe incorrecte";
		
		else{
			if($utilisateur['etat']==="0" )
			{
				$erreur = "Votre compte n'est pas activé,Contacter l'administrateur sur 774418426";
			}else{			
			header('location:accueil');
			$_SESSION['utilisateur'] = $utilisateur;
			$_SESSION['time'] = time();
			}
		}
	}
?>




<div class="container">

<!-- Outer Row -->
<div class="row justify-content-center">

  <div class="col-xl-6 col-lg-6 col-md-6">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
			
          <div class="col-lg-12">
		  
            <div class="p-5">
              <div class="text-center">
					 <?php
			
                    if(isset($erreur)) 
                    {
                        echo '<h5 class="bg-danger text-white"> '.$erreur.' </h5>';
							header('refresh:3,url=index');
                        $erreur = null;
                    }
					
                ?>
			  
                <h1 class="h4 text-gray-900 mb-4">SYSTEME D'AUTHENTIFICATION</h1>
               
              </div>

                <form class="user" action="" method="POST">

                    <div class="form-group">
                    <input type="text" name="login" class="form-control form-control-user" placeholder="Votre nom d'utilisateur...">
                    </div>
                    <div class="form-group">
                    <input type="password" name="mot_de_passe" class="form-control form-control-user" placeholder="Votre Mot de passe">
                    </div>
            
                    <button type="submit" name="valider" class="btn btn-primary btn-user btn-block"> Connecter </button>
                    <hr>
                </form>
					<a class="btn btn-warning btn-block" href="creer_compte">Créer un Compte</a>
					
            </div>
          </div>
        </div>
      </div>
	  <div class="card-footer">
	  <input type="checkbox" name="souvenir"> <span>Se souvenir </span>
	  <a class="float-right" href="recuperation">Mot de passe Oublié ?</a>
	  <b><p class="text-center" style="color:black">Copyright &copy; IDA-P6-<?php echo date('Y')?>
	  
	  </div>
    </div>

  </div>

</div>

</div>


<?php
//include('includes/scripts.php'); 
?>