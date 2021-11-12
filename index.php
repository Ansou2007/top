<?php
    require_once 'utilisateur/core/connection.php';



    $query = $con->prepare('SELECT temoignage.id_utilisateur,message,nom_complet,date_temoignage FROM temoignage,utilisateur WHERE id_utilisateur = utilisateur.id');
    $query->execute();
    $resultat = $query->fetchAll();

    $query = $con->prepare('SELECT * FROM declaration_perdu');
    $query->execute();
    $perdus = $query->fetchAll();

    $query = $con->prepare('SELECT * FROM declaration_trouve');
    $query->execute();
    $trouve = $query->fetchAll();

    
   
    function Nbre_Perdus(){
          global $con;
          $query = $con->query("SELECT  count(*) nombre  FROM declaration_perdu");
          $query->execute();
          $nbre = $query->fetch();
          return $nbre['nombre'];
      }
      function Nbre_Trouves(){
        global $con;
        $query = $con->query("SELECT  count(*) nombre  FROM declaration_trouve");
        $query->execute();
        $nbre = $query->fetch();
        return $nbre['nombre'];
     }
    function Nbre_Utilisateur(){
      global $con;
      $query = $con->query("SELECT  count(*) nombre  FROM utilisateur");
      $query->execute();
      $nbre = $query->fetch();
      return $nbre['nombre'];
     }
    

      $NbrePerdus = Nbre_Perdus();
      $NbreTrouve = Nbre_Trouves();
      $NbreUtilisateur = Nbre_Utilisateur();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Trouvé||Perdu</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Medicio - v4.6.0
  * Template URL: https://bootstrapmade.com/medicio-free-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex align-items-center justify-content-center justify-content-md-between">
      <div class="align-items-center d-none d-md-flex">
        <i class="bi bi-clock"></i> Nous sommes le: <?php echo date('d/m/Y');?>
      </div>
      <div class="d-flex align-items-center">
        <i class="bi bi-phone"></i> Appelez au 33 994 13 01
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <a href="index.php" class="logo me-auto"><img src="assets/img/logo.png" alt=""></a>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <h1 class="logo me-auto"><a href="index.html">Medicio</a></h1> -->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto " href="index.php">Accueil</a></li>
          <li><a class="nav-link scrollto" href="#apropos">Apropos</a></li>
          <li><a class="nav-link scrollto" href="#perdus">Perdus</a></li>
          <li><a class="nav-link scrollto" href="#trouves">Trouvé</a></li>       
          <li><a class="nav-link scrollto" href="#contacter">Nous contacter</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="utilisateur/index.php" class="appointment-btn scrollto"><span class="d-none d-md-inline">Se</span> Connecter</a>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url(assets/img/slide/slide1.jpg)">
          <div class="container">
            <h2>Bienvenus <span>sur Trouvé||Perdu</span></h2>
            <p>TOP est une plateforme qui vous permet de retrouver ou de declarer vos objets perdus.</p>
            <a href="" class="btn-get-started scrollto">Voir Plus</a>
          </div>
        </div>
	
        <!-- Slide 2 
        <div class="carousel-item" style="background-image: url(assets/img/slide/slide-2.jpg)">
          <div class="container">
            <h2>TOP<h2>
            <p>Une plateforme qui vous permet de retrouver ou de declarer vos objets perdus.</p>
            <a href="#about" class="btn-get-started scrollto">Read More</a>
          </div>
        </div>
		-->
        <!-- Slide 3 
        <div class="carousel-item" style="background-image: url(assets/img/slide/slide-3.jpg)">
          <div class="container">
            <h2>Sequi ea ut et est quaerat</h2>
            <p>Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel.</p>
            <a href="#about" class="btn-get-started scrollto">Read More</a>
          </div>
        </div>
			-->
      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

    </div>
  </section><!-- End Hero -->

  <main id="main">

    

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container" data-aos="zoom-in">

        <div class="text-center">
          <h3>Vous avez besoin d'aide ?</h3>
          <p> Faites nous part de vos questions et notre équipe se penchera sur ça dans les plus bref délais.</p>
          <a class="cta-btn scrollto" href="#contacter">Ecrivez-nous</a>
        </div>

      </div>
    </section><!-- End Cta Section -->

    <!-- ======= A PROPOS ======= -->
    <section id="apropos" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Apropos de Nous</h2>
          <p>TOP est une plateforme qui vous permet de retrouver ou de declarer vos objets perdus.</p>
        </div>

        <div class="row">
          <div class="col-lg-6" data-aos="fade-right">
            <img src="assets/img/about.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 content" data-aos="fade-left">
            <h3>Notre équipe est composé de developpeur chevronnés</h3>
            <p class="fst-italic">
              L'application permet entre autre de realiser les taches ci-aprés.
            </p>
            <ul>
              <li><i class="bi bi-check-circle"></i> De déclarer des objets perdus et de faire le suivi.</li>
              <li><i class="bi bi-check-circle"></i> De déclarer des objet trouvé à votre possession.</li>
              <li><i class="bi bi-check-circle"></i>D'administer vos déclarations pour un eventuel suivi</li>
            </ul>
            <p>
              Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
              velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
              culpa qui officia deserunt mollit anim id est laborum
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= STATISTIQUE ======= -->
    <section id="counts" class="counts">
      <div class="container" data-aos="fade-up">

        <div class="row no-gutters">

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="fas fa-user"></i>
              <span data-purecounter-start="0" data-purecounter-end="<?=$NbreUtilisateur?>" data-purecounter-duration="1" class="purecounter"></span>

              <p><strong>Utilisateurs</strong> </p>
              
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="fas fa-search"></i>
              <span data-purecounter-start="0" data-purecounter-end="<?= $NbrePerdus?>" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Objets Perdus</strong></p>
             
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="fas fa-clipboard-check"></i>
              <span data-purecounter-start="0" data-purecounter-end="<?=$NbreTrouve?>" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Objets Trouvés</strong></p>
              
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="fas fa-award"></i>
              <span data-purecounter-start="0" data-purecounter-end="150" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Archive</strong></p>
              
            </div>
          </div>

        </div>

      </div>
    </section>
    <!-- FIN STATISTIQUE  -->

 
    <!-- ======= PERDU Section ======= -->
    <section id="perdus" class="testimonials">
     
      <div class="container" data-aos="fade-up">        
        <div class="section-title">            
          <h2>OBJETS PERDUS</h2>
          <p>Voici ce que pense les utilisateurs de cette application. Vous pouvez aussi partager votre experience</p>       
        </div>  
                  
        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">                 
          <div class="swiper-wrapper">  

         <?php  foreach($perdus as $perdus): ?> 
            <div class="swiper-slide">                     
              <div class="testimonial-item">                         
                <p>  
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>    
                  <?=$perdus['descriptions']?>                                  
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                
                <h3>Contact: <?=$perdus['contact']?>  </h3>
                <h4></h4>               
              </div>                            
            </div> 
           <?php  endforeach ?>   
          </div>
          <div class="swiper-pagination">           
          </div>
                  
        </div> 
           
      </div>
      
    </section>
    <!-- FIN PERDU Section -->

    <!-- ======= TROUVE Section ======= -->
    <section id="trouves" class="testimonials">
     
      <div class="container" data-aos="fade-up">        
        <div class="section-title">            
          <h2>OBJETS TROUVE</h2>
          <p>Voici ce que pense les utilisateurs de cette application. Vous pouvez aussi partager votre experience</p>       
        </div>  
                  
        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">                 
          <div class="swiper-wrapper">  

         <?php  foreach($trouve as $trouves): ?> 
            <div class="swiper-slide">                     
              <div class="testimonial-item">                         
                <p>  
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>    
                  <?=$trouves['descriptions']?>                                  
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                
                <h3>Contact :<?=$trouves['contact']?></h3>
                <h4></h4>               
              </div>                            
            </div> 
           <?php  endforeach ?>   
          </div>
          <div class="swiper-pagination">           
          </div>
                  
        </div> 
           
      </div>
      
    </section>
    <!-- FIN TROUVE Section -->



    <!-- ======= Contact Section ======= -->
    <section id="contacter" class="appointment section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>VOS QUESTIONS</h2>
          <p>Vos questions sont les bienvenues.Notre équipe vous répondra dans les plus bref délai</p>
        </div>

        <form action="" method="post" role="form" class="php-email-form" data-aos="fade-up" data-aos-delay="100">
          <div class="row">
            <div class="col-md-4 form-group">
              <input type="text" name="nom_complet" class="form-control" id="name" placeholder="Votre nom complet" required>
            </div>
            <div class="col-md-4 form-group mt-3 mt-md-0">
              <input type="email" class="form-control" name="email" id="email" placeholder="Votre Mail" required>
            </div>
            <div class="col-md-4 form-group mt-3 mt-md-0">
              <input type="tel" class="form-control" name="phone" id="phone" placeholder="telephone" required>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 form-group mt-3">
              <select name="region" id="region" class="form-select">
              <option>Région</option>
            </select>
            </div>
            <div class="col-md-4 form-group mt-3">
              <select name="departement" id="departement" class="form-select">
                <option value="">Departement</option>               
                
              </select>
            </div>
            <div class="col-md-4 form-group mt-3">
              <select name="commune" id="commune" class="form-select">
                <option value="">commune</option>
               
              </select>
            </div>
          </div>

          <div class="form-group mt-3">
            <textarea class="form-control" name="message" rows="5" placeholder="Vos questions"></textarea>
          </div>
          <div class="my-3">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Votre message a été bien envoyé</div>
          </div>
          <div class="text-center"><button type="submit">Envoyer</button></div>
        </form>

      </div>
    </section><!-- FIN CONTACT Section -->

   

    <!-- ======= TEMOIGNAGE Section ======= -->
    <section id="testimonials" class="testimonials">
     
      <div class="container" data-aos="fade-up">        
        <div class="section-title">            
          <h2>Témoignages</h2>
          <p>Voici ce que pense les utilisateurs de cette application. Vous pouvez aussi partager votre experience</p>       
        </div>  
                  
        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">                 
          <div class="swiper-wrapper">  

         <?php  foreach($resultat as $temoignage) { ?> 
            <div class="swiper-slide">                     
              <div class="testimonial-item">                         
                <p>  
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>    
                  <?=$temoignage['message']?>                                  
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="assets/img/temoignage/temoignage.jpg" class="testimonial-img" alt="">
                <h3><?=$temoignage['nom_complet']?>  </h3>
                <h4></h4>               
              </div>                            
            </div> 
           <?php  } ?>   
          </div>
          <div class="swiper-pagination">           
          </div>
                  
        </div> 
           
      </div>
      
    </section>
    <!-- FIN TEMOIGNAGE Section -->

    

    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Galerie</h2>
          <p>Les Images des Objets déclarés ou perdus</p>
        </div>

        <div class="gallery-slider swiper">
          <div class="swiper-wrapper align-items-center">
            <div class="swiper-slide"><a class="gallery-lightbox" href="assets/img/gallery/gallery-1.jpg"><img src="assets/img/gallery/gallery-1.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="gallery-lightbox" href="assets/img/gallery/gallery-2.jpg"><img src="assets/img/gallery/gallery-2.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="gallery-lightbox" href="assets/img/gallery/gallery-3.jpg"><img src="assets/img/gallery/gallery-3.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="gallery-lightbox" href="assets/img/gallery/gallery-4.jpg"><img src="assets/img/gallery/gallery-4.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="gallery-lightbox" href="assets/img/gallery/gallery-5.jpg"><img src="assets/img/gallery/gallery-5.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="gallery-lightbox" href="assets/img/gallery/gallery-6.jpg"><img src="assets/img/gallery/gallery-6.jpg" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="gallery-lightbox" href="assets/img/gallery/gallery-10.png"><img src="assets/img/gallery/gallery-10.png" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="gallery-lightbox" href="assets/img/gallery/gallery-9.png"><img src="assets/img/gallery/gallery-9.png" class="img-fluid" alt=""></a></div>
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Gallery Section -->

    

   

    <!-- ======= Contact Section ======= -->
    
    <!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">


          <div class="col-lg-7 col-md-10 footer-newsletter">
            <h4>Newsletter</h4>
            <p>Restez informé</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Souscrire">
            </form>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>IDA-P6</span></strong>. Tout droit réservé
      </div>
      
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>