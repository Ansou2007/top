
<?php
	require_once '../../Configuration.php';	
	include base_app.'core/connection.php';
	session_start();
		if(isset($_POST['btn_supprimer'])) 
			{
            //On nettoie les valeurs
				$id_perdu = $_POST['id_perdu'];
				
			        //On prepare la requete

			$query =$con->prepare('DELETE FROM declaration_perdu WHERE id=:id');           
            $query->execute(array(':id'=>$id_perdu));                      
			$_SESSION['supprime_ok']= "déclaration Supprimée";	 
			}else{
			 $message = "déclaration non supprimée";			 
		 }        
		header("location:perdu");


?>

