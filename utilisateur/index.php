
<?php
		require_once 'Configuration.php';
		require_once('core/connection.php');	
		require_once base_app.'/views/utilisateur/authentification.php';
		
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Se connecter</title>
    <meta charset="utf-8">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="connexion.css">
</head>

<body>
    <form action="" method="POST">
        <section class="vh-450 gradient-custom">
            <div class="container py-5 h-450">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-dark text-white" style="border-radius: 1rem;">
                            <div class="card-body p-5 text-center">

                                <div class="mb-md-5 mt-md-4 pb-5">
								
									
                                    <?php if(count($erreur)>0):?>
									<div class="alert alert-danger">
                                        <?php foreach($erreur as $erreur):?>
										<li>
                                            <?php echo $erreur; ?>
                                        </li>
                                            <?php endforeach;?>
									</div>
                                        <?php endif;?>
                                    <h2 class="fw-bold mb-2 text-uppercase"><strong>Systéme d'Authentification</strong></h2>
									
                                    <p class="text-white-50 mb-5"><strong>Veillez entrer votre nom d'utilisataur et le mot de pass !</strong></p>

                                    <div class="form-outline form-white mb-5">

                                        <input type="email" name="email" placeholder="votre mail"  class="form-control form-control-lg" />
                                    </div>

                                    <div class="form-outline form-white mb-5">

                                        <input type="password" name="motdepass"  placeholder="Mot de pass"  class="form-control form-control-lg" />
                                    </div>
									<button name="valider" class="btn btn-outline-light btn-lg px-5" type="submit"><strong>S'indentifier</strong></button>
                                    <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#"><strong>Mot de pass oublié?</strong></a></p>
                                    <div class="d-flex justify-content-center text-center mt-4 pt-1">
                                        <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                                        <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                                        <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
                                    </div>

                                </div>

                                <div>
                                    <p class="mb-0">Si vous n'avez pas de compte? <a href="creer_compte" class="text-white-50 fw-bold">Créer</a></p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>




    </form>

    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
</body>

</html>


</body>

</html>