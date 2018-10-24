<?php 
if(!isset($_SESSION['id']) || !isset($_SESSION['supervisor']) || $_SESSION['supervisor'] != 1){
    session_destroy();
    redireccionar('/Pages/ingresar');
}
require RUTA_APP.'\views\inc\header-supervisor.inc';
require RUTA_APP.'\views\inc\menu-supervisor.inc'; ?>
    <div class="container">
        <?php require RUTA_APP.'/views/update_password.php'; ?>
    </div>

<?php require RUTA_APP.'/views/inc/footer-supervisor.inc'; ?>