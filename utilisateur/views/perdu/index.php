<?php
	require_once '../../Configuration.php';
	include base_app.'/includes/header.php';
	include base_app.'/includes/navbar.php';
	include base_app.'core/connection.php';
	
	if($groupe=="Departement"){
		
	$query = $con->prepare("SELECT * FROM cellule,commune,departement WHERE cellule.id_commune=commune.id AND commune.id_departement=departement.id AND id_departement='$id_departement' order by nom_cellule");
	$query->execute();
	$cellule = $query->fetchAll();
	}elseif($groupe=="Region")
	{	
	$query = $con->prepare("SELECT * FROM cellule,commune,departement,region WHERE cellule.id_commune=commune.id AND commune.id_departement=departement.id AND departement.id_region=region.id AND id_region='$id_region' order by nom_cellule");
	$query->execute();
	$cellule = $query->fetchAll();
	}else{
		
		$query = $con->prepare("SELECT cellule.id,nom_cellule,nom_commune FROM cellule,commune WHERE cellule.id_commune=commune.id AND id_commune='$id_commune' order by nom_cellule");
		$query->execute();
		$cellule = $query->fetchAll();
	}
	
?>

			<!--MODAL-->
			
		
		<div class="modal fade" id="ajout_perdu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Déclaration Objet Perdu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="ajout_perdu" method="POST">

        <div class="modal-body">
				<input type="hidden" name="id_commune" value="<?php echo $id_commune ?>">
            <div class="form-group">
                <label> Nom Cellule </label>
                <input type="text" name="nom_cellule" class="form-control" required>
            </div>
			<div class="form-group">
                <label> Commune </label>
                <input type="text" name="nom_commune" value="<?php echo $commune ?>" class="form-control" disabled >
            </div>
			
      
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
            <button type="submit" name="enregistrer" class="btn btn-primary">Enregistrer</button>
        </div>
      </form>

    </div>
  </div>
</div>
		<!--FIN MODAL-->
		
		<!-- Debut Page Contenu -->
        <div class="container-fluid">

          <!-- Nom  Entete -->
          <h1 class="h3 mb-4 text-gray-800">Déclaration Objet Perdu</h1>
        </div>
		<!-- CONTENU--->
		<div class="container-fluid">
		<!-- DataTale -->
		<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary"> 
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ajout_cellule">
              Ajouter déclaration
            </button>
    </h6>
  </div>

  <div class="card-body">

    <div class="table-responsive">
		<?php 
		if(isset($_SESSION['erreur'])){
		echo $_SESSION['erreur'];							
		unset($_SESSION['erreur']);
		}elseif(isset($_SESSION['supprime_ok'])){
			echo '<div class="alert alert-success text-center">'.$_SESSION['supprime_ok'].'</div>';	
			unset($_SESSION['supprime_ok']);	
		} 					
		
		?>

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>          
            <th>Numéro</th>             
			<th>Date</th>
			<th>Description</th>
			<th>contact</th>
			<th>Suivi</th> 
			<th>Image</th>
            <th width="15%">Modifier </th>
            <th width="15%">Supprimer </th>
          </tr>
        </thead>
        <tbody>   
			
          <tr>          
            <td class="text-center"></td>
            <td class="text-center"></td>
			<td></td>
            <td></td> 			
            <td></td>
            <td></td>
			<td></td>
			<td></td>			
          </tr>
		 
        </tbody>
      </table>

    </div>
  </div>
</div>

</div>






	<?php
	include base_app.'/includes/footer.php';
	?>

