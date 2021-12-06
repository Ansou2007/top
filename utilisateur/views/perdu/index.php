<?php
	require_once '../../Configuration.php';
	include base_app.'/includes/header.php';
	include base_app.'/includes/navbar.php';
	include base_app.'core/connection.php';
	
	$code = "DP-".strtoupper(substr(md5(uniqid()),0,4)).date('dy');

  $query = $con->prepare("SELECT * FROM declaration_perdu");
  $query->execute();
  $resultat = $query->fetchall();
	
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
    <!--FORM AJOUT DECLARATION-->
      <form action="ajout_perdu" method="POST">
        <div class="modal-body">
				<input type="hidden" name="id_utilisateur" value="<?=$id_login;?>">
        <div class="form-group">
          <label>Numéro D'enregistrement</label>
          <input type="text" name="numero" value="<?=$code?>" class="form-control" readonly>
        </div>
        <label>Description</label>
            <div class="form-group">            
                <textarea name="description" id="" cols="0" rows="0" class="form-control"></textarea>
            </div>
		      	<div class="form-group">
                <label> Personne A Contacter </label>
                <input type="number" name="contact" value="" class="form-control"  >
            </div>
            <div class="form-group">
                <label>Image </label>
                <input type="file" name="photo" value="" class="form-control"  >
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
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ajout_perdu">
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
			<th>Contact</th>
			<th>Suivi</th> 
      <th>Arhiver</th> 
			<th>Image</th>
      <th width="15%">Modifier </th>
      <th width="15%">Supprimer </th>
          </tr>
        </thead>
        <tbody>   
          <?php foreach($resultat as $perdu){ ?>
          <tr>          
            <td class="text-center"><?=$perdu['code_declaration']?></td>
            <td class="text-center"><?=$perdu['date_declaration']?></td>
			      <td><?=$perdu['descriptions']?></td>
            <td><?=$perdu['contact']?></td> 			
            <td>
              <?php
            if($perdu['autorisation']=="Mise en Examen"){
              echo '<div class="alert alert-danger">'.$perdu['autorisation'].'</div>';
            }else{
              echo '<div class="alert alert-success">'.$perdu['autorisation'].'</div>';
            }
            ?>
            </td>
            <td><?=$perdu['archiver']?></td>
            <td><?=$perdu['images']?></td>
            <td>
              <form method="" action="">
                <input type="hidden" name="id">
                <button class="form-control btn btn-success" name="modifier">Modifier</button>
              </form>
            </td>
            <td>
            <form method="POST" action="supprimer_perdu">
                <input type="hidden" name="id_perdu" value="<?=$perdu['id']?>" >
                <button class="form-control btn btn-danger" name="btn_supprimer">Supprimer</button>
              </form>
            </td>			
          </tr>
          <?php }?>
        </tbody>
      </table>

    </div>
  </div>
</div>

</div>






	<?php
	include base_app.'/includes/footer.php';
	?>

