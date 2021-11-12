<?php
	require_once '../../Configuration.php';
	include base_app.'/includes/header.php';
	include base_app.'/includes/navbar.php';
	include base_app.'core/connection.php';
	
	$code = "DP-".strtoupper(substr(md5(uniqid()),0,4)).date('dy');

  $query = $con->prepare("SELECT * FROM temoignage");
  $query->execute();
  $resultat = $query->fetchall();
	
?>

			<!--MODAL-->
			
		
		<div class="modal fade" id="temoignage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Témoignage</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <!--FORM AJOUT DECLARATION-->
      <form action="ajout_temoignage" method="POST">
        <div class="modal-body">
				<input type="hidden" name="id_utilisateur" value="<?=$id_login?>">     
        <label>Message</label>
            <div class="form-group">            
                <textarea name="message" id="" cols="0" rows="0" class="form-control"></textarea>
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
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#temoignage">
              Ajouter déclaration
            </button>
    </h6>
  </div>

  <div class="card-body">

    <div class="table-responsive">
		<?php 
		if(isset($_SESSION['temoignage_erreur'])){
		echo $_SESSION['temoignage_erreur'];							
		unset($_SESSION['erreur']);
		}elseif(isset($_SESSION['supprime_ok'])){
			echo '<div class="alert alert-success text-center">'.$_SESSION['supprime_ok'].'</div>';	
			unset($_SESSION['supprime_ok']);	
		} 		
    
		if(isset($_SESSION['temoignage_ok'])){
		echo '<div class="alert alert-success">'.$_SESSION['temoignage_ok'].'</div>';							
		unset($_SESSION['temoignage_ok']);
		
		} 			
		
		?>

<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>                         
			<th>Date</th>
			<th>Message</th>		
			<th>Suivi</th> 	
      <th width="15%">Modifier </th>
      <th width="15%">Supprimer </th>
          </tr>
        </thead>
        <tbody>   
          <?php foreach($resultat as $temoignage){ ?>
          <tr>          
            <td class="text-center"><?=$temoignage['date_temoignage']?></td>           
			      <td><?=$temoignage['message']?></td>            		
            <td>
              <?php
            if($temoignage['suivi']=="Mise en Examen"){
              echo '<div class="alert alert-danger">'.$temoignage['suivi'].'</div>';
            }else{
              echo '<div class="alert alert-success">'.$temoignage['suivi'].'</div>';
            }
            ?>
            </td>                  
            <td>
              <form method="" action="">
                <input type="hidden" name="id">
                <button class="form-control btn btn-success" name="modifier">Modifier</button>
              </form>
            </td>
            <td>
            <form method="" action="">
                <input type="hidden" name="id">
                <button class="form-control btn btn-danger" name="modifier">Supprimer</button>
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

