<?php 
if(!isset($_SESSION['id']) || !isset($_SESSION['teacher']) || $_SESSION['teacher'] != 2){
    session_destroy();
    redireccionar('/Pages/ingresar');
}
require RUTA_APP.'/views/inc/header.inc'; 
require RUTA_APP.'/views/inc/menu_teacher.inc'; ?>
    <br>
    <br>
    <div class="container" style="justify-content:center">
        <div class="row">
            <div class="col s12">
                <ul class="tabs">
                    <li class="tab col s4"><a class="active" href="#test1">Ver Clases</a></li>
                    <li class="tab col s4"><a href="#test2">Historial clases</a></li>
                </ul>
            </div>
            <div id="test1" class="col s12">
                <?php require RUTA_APP.'/views/teacher/lessons_teacher.php'; ?>
            </div>
            <div id="test2" class="col s12">
                <img class="img-responsive" style="max-width:100%" src="<?= RUTA_URL?>/img/calendar.png" alt="img-fullcalendar">
            </div>
            
        </div>        
    </div>
<?php require RUTA_APP.'/views/inc/footer-supervisor.inc'; ?>