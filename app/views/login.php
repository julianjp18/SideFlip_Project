<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= SITE_NAME." - ".TEMPLATE ?> </title>
    <link rel="stylesheet" href="<?= RUTA_URL; ?>/css/font-awesome.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= RUTA_URL; ?>/css/loader.css">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="<?= RUTA_URL; ?>/css/style-login.css">
    <script src="<?= RUTA_URL; ?>/js/loader.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="<?= RUTA_URL; ?>/js/main.js"></script>
</head>
<body>
    <div class="preloader-background">
        <div class="preloader-wrapper big active">
            <div class="spinner-layer spinner-blue-only">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="gap-patch">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
    </div>
    <nav>
        <div class="nav-wrapper">
            <div class="container">
                <a href="<?= RUTA_URL; ?>/index#home" class="brand-logo">SideFlip</a>
                <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <li class="main-menu-item"><a class="main-menu-link" href="<?= RUTA_URL; ?>/index#what-is">¿Qué es SideFlip?</a></li>
                    <li class="main-menu-item"><a class="main-menu-link" href="<?= RUTA_URL; ?>/index#services">Servicios</a></li>
                    <li class="main-menu-item"><a class="main-menu-link" href="<?= RUTA_URL; ?>/index#prices">Precios</a></li>
                    <li class="main-menu-item"><a class="main-menu-link" href="<?= RUTA_URL; ?>/index#clients">Clientes</a></li>
                    <li class="main-menu-item"><a class="main-menu-link" href="<?= RUTA_URL; ?>/index#contact-us">Contacto</a></li>
                    <li class="main-menu-item"><a class="main-menu-link" href="<?= RUTA_URL; ?>/pages/ingresar">Ingresar</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <ul class="sidenav" id="mobile-demo">
        <li class="main-menu-item"><a class="main-menu-link" href="<?= RUTA_URL; ?>/index#what-is">¿Qué es SideFlip?</a></li>
        <li class="main-menu-item"><a class="main-menu-link" href="<?= RUTA_URL; ?>/index#services">Servicios</a></li>
        <li class="main-menu-item"><a class="main-menu-link" href="<?= RUTA_URL; ?>/index#prices">Precios</a></li>
        <li class="main-menu-item"><a class="main-menu-link" href="<?= RUTA_URL; ?>/index#clients">Clientes</a></li>
        <li class="main-menu-item"><a class="main-menu-link" href="<?= RUTA_URL; ?>/index#contact-us">Contacto</a></li>
        <li class="main-menu-item"><a class="main-menu-link" href="<?= RUTA_URL; ?>/pages/ingresar">Ingresar</a></li>
    </ul>
    <div class="container">
        <div class="row">
            <div class="col s2">    
<?php 
    if(!empty($_SESSION['message'])){
?>
                <div class="card-panel orange lighten-2"><?= $_SESSION['message'] ?></div>
<?php
        $_SESSION['message'] = "";
    }
?>     
            </div>
            <div class="col s8">
                <div class="square-login">
                    <div class="square-title-login">
                        <div class="background">
                            <h1 class="center-align">Iniciar Sesión</h1>
                        </div>
                    </div>
                    <form class="square-form-login" method="POST" action="<?= RUTA_URL; ?>/Pages/autentication">
                        <div class="row">
                            <div class="input-field col s12">
                                <input name="txt_email" id="txt_email" type="text" class="validate" required>
                                <label for="txt_email">Correo electrónico</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input name="txt_password" id="txt_password" type="password" class="validate" required>
                                <label for="txt_password">Contraseña</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 center-align">
                                <button class="btn light-green" type="submit">Ingresar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col s2">
            </div>
        </div>        
    </div>
<?php require RUTA_APP.'/views/inc/footer-supervisor.inc'; ?>