<?php
		require('../../core/configuration.php');
		
		$region = $con->prepare("SELECT * FROM region ORDER BY nom_region");
		$region->execute();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url?>/includes/assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url?>/includes/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo base_url?>/includes/assets/css/app.css">
    <link rel="stylesheet" href="<?php echo base_url?>/includes/assets/css/pages/auth.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
</head>

<body>
    <div id="auth">
        
<div class="row h-100">
    <div class="col-lg-7 col-12">
        <div id="auth-left">
            <div class="auth-logo">
                <a href="index.html"><img src="assets/images/logo/logo.png" alt="Logo"></a>
            </div>
            <h1 class="auth-title">INSCRIPTION</h1>
            
            <form action="">
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="text" class="form-control form-control-xl" placeholder="Email">
                    <div class="form-control-icon">
                        <i class="bi bi-envelope"></i>
                    </div>
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="text" class="form-control form-control-xl" placeholder="Nom Complet">
                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="password" class="form-control form-control-xl" placeholder="Mot de passe">
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="password" class="form-control form-control-xl" placeholder="Confirmation Mot de passe">
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                </div>
				<div class="form-group position-relative has-icon-left mb-4">
                    <input type="text" class="form-control form-control-xl" placeholder="Téléphone">
                    <div class="form-control-icon">
                        <i class="bi bi-phone-fill"></i>
                    </div>
                </div>
				<!--REGION-->
				<div class="form-group position-relative has-icon-left mb-4">
                    <select name="region" class="form-control form-control-xl form-select" onChange="ListeDepartement(this.value) ;">
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
                    <div class="form-control-icon">
                        <i class="bi bi-clipboard-plus"></i>
                    </div>
                </div>
				<!--DEPARTEMENT-->
				<div class="form-group position-relative has-icon-left mb-4">
                    <select id="liste_departement" name="departement" onChange="ListeCommune(this.value)"  class="form-control form-control-xl form-select">
						
					</select>
                    <div class="form-control-icon">
                        <i class="bi bi-clipboard"></i>
                    </div>
                </div>
				<!--COMMUNE-->
				<div class="form-group position-relative has-icon-left mb-4">
                    <select id="liste_commune" class="form-control form-control-xl form-select">				
						
					</select>
                    <div class="form-control-icon">
                        <i class="bi bi-clipboard-data"></i>
                    </div>
                </div>
				
                <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">CREER</button>
            </form>
            <div class="text-center mt-5 text-lg fs-4">
                <p class='text-gray-600'>Avez-vous déja un compte? <a href="" class="font-bold">Se connecter</a>.</p>
            </div>
        </div>
    </div>
    <div class="col-lg-5 d-none d-lg-block">
        <div id="auth-right">

        </div>
    </div>
</div>

    </div>
	<script >
		function ListeDepartement(val) {
			$.ajax({
			type: "POST",
			url: "liste_departement.php",
			data:'id_region='+val,
			success: function(data){
				$("#liste_departement").html(data);
			}
			});
			}
	</script>
	<script>
	function ListeCommune(val){
		$.ajax({
			type:"POST",
			url:"liste_commune.php",
			data:'id_departement='+val,
			success: function(data){
				$("#liste_commune").html(data);
			}
		})
	}
	</script>
</body>

</html>
