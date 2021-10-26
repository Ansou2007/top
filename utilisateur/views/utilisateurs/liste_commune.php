<?php
	require_once '../../core/Configuration.php';
		
	if(!empty($_POST["id_departement"])) {
	
 $query = $con->prepare("SELECT * FROM commune WHERE id_departement = '" . $_POST["id_departement"] . "'");
 $query->execute();
 $commune = $query->fetchall();
    
?>
	<option value="">---Commune---</option>
<?php
	foreach($commune as $donnees) 	
	{
?>
	<option value="<?php echo $donnees["id"]; ?>"><?php echo $donnees["nom_commune"]; ?></option>
<?php
	}
}
?>