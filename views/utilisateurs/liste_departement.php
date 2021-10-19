<?php
	require_once '../../core/Configuration.php';
		
	if(!empty($_POST["id_region"])) {
	
 $query = $con->prepare("SELECT * FROM departement WHERE id_region = '" . $_POST["id_region"] . "'");
 $query->execute();
 $departement = $query->fetchall();
    
?>
	<option value="">---DEPARTEMENT---</option>
<?php
	foreach($departement as $donnees) 	
	{
?>
	<option value="<?php echo $donnees["id"]; ?>"><?php echo $donnees["nom_departement"]; ?></option>
<?php
	}
}
?>