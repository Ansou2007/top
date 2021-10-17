	<?php
			require_once('../core/configuration.php');
	?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TrouvéOuPerdu</title>
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url;?>/../includes/assets/css/bootstrap.css">
    
    <link rel="stylesheet" href="<?php echo base_url;?>/../includes/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?php echo base_url;?>/../includes/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo base_url;?>/../includes/assets/css/app.css">
    <link rel="shortcut icon" href="<?php echo base_url;?>/../includes/assets/images/favicon.svg" type="image/x-icon">
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
    <div class="sidebar-header">
        <div class="d-flex justify-content-between">
            <div class="logo">
                <a href="index.html"><img src="<?php echo base_url;?>/../includes/assets/images/logo/logo.png" alt="Logo" srcset=""></a>
            </div>
            <div class="toggler">
                <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
            </div>
        </div>
    </div>
    <div class="sidebar-menu">
        <ul class="menu">
            <li class="sidebar-title">Menu</li>
            
            <li
                class="sidebar-item active  ">
                <a href="" class='sidebar-link'>
                    <i class="bi bi-grid-fill"></i>
                    <span>Tableau de Bord</span>
                </a>
            </li>
            
            <li
                class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-stack"></i>
                    <span>Déclaration : Perdu</span>
                </a>
                <ul class="submenu ">
                    
                    <li class="submenu-item ">
                        <a href="">Carousel</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="">Dropdown</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="">List Group</a>
                    </li>
                     
                </ul>
            </li>
            
            <li
                class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-collection-fill"></i>
                    <span>Déclaration : Trouvé</span>
                </a>
                <ul class="submenu ">
                    <li class="submenu-item ">
                        <a href="">Avatar</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="">Sweet Alert</a>
                    </li>
                    
                </ul>
            </li>
             
            <li class="sidebar-title">Extra UI</li>
            
            <li
                class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-bar-chart-fill"></i>
                    <span>Statistique</span>
                </a>
                <ul class="submenu ">
                    <li class="submenu-item ">
                        <a href="">Graphique</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="">Courbe</a>
                    </li>
                </ul>
            </li>
			<!--INTERFACE UTILISATEUR-->
            <li
                class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-person-badge-fill"></i>
                    <span>Utilisateur</span>
                </a>
                <ul class="submenu ">
                    <li class="submenu-item ">
                        <a href="">Profil</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="">Register</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="">Déconnexion</a>
                    </li>
                </ul>
            </li>
            
            
            
            <li class="sidebar-title">Soutien</li>
            
            <li
                class="sidebar-item  ">
                <a href="https://github.com/Ansou2007" target="_blank" class='sidebar-link'>
                    <i class="bi bi-life-preserver"></i>
                    <span>Documentation</span>
                </a>
            </li>
            
            <li
                class="sidebar-item  ">
                <a href="https://github.com/Ansou2007" target="_blank" class='sidebar-link'>
                    <i class="bi bi-puzzle"></i>
                    <span>Contribution</span>
                </a>
            </li>
            
            <li
                class="sidebar-item  ">
                <a href="https://github.com/Ansou2007" class='sidebar-link'>
                    <i class="bi bi-cash"></i>
                    <span>Don</span>
                </a>
            </li>
            
        </ul>
    </div>
    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
</div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
   <!--         
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Avatar</h3>
                <p class="text-subtitle text-muted">A Component</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Accueil</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
   
</div>
-->
            <?php
			include('footer.php');
			?>