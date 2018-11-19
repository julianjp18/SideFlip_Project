<?php 
if(!isset($_SESSION['id']) || !isset($_SESSION['student']) || $_SESSION['student'] != 3){
    session_destroy();
    redireccionar('/Pages/ingresar');
}
require RUTA_APP.'/views/inc/header.inc'; 
require RUTA_APP.'/views/inc/menu_student.inc'; ?>
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col s12">
                <ul class="tabs">
                    <li class="tab col s4"><a class="active" href="#test1">Ver Clases</a></li>
                    <li class="tab col s4"><a href="#test2">Historial clases</a></li>
                    <li class="tab col s4"><a href="#test3">Solicitar clases</a></li>
                </ul>
            </div>
            <div id="test1" class="col s12">
                <?php require RUTA_APP.'/views/student/lessons_student.php'; ?>
            </div>
            <div id="test2" class="col s12">
                <img class="img-responsive" style="max-width:100%" src="<?= RUTA_URL?>/img/calendar.png" alt="img-fullcalendar">
            </div>
            <div id="test3" class="col s12">
                <h3><i>Solicitar clase</i></h3>
                <br>
                <form action="<?= RUTA_URL ?>/student/request_class" method="POST">
                    <div class="input-field col s12">
                        <select name="cpk_student" id="cpk_student" required>
                            <option value="" disabled selected>Selecciona una opción</option>
                            <?php 
                                foreach ($data['lessons'] as $key) {
                                    $key = (object) $key;
                                ?>
                                    <option value="<?= $key->id_rhythm?>"><?= $key->id_rhythm." Clase : ".$key->name_rhythm  ?></option>
                                <?php
                                }
                                ?>
                        </select>
                        <label>Selecciona una clase</label>
                    </div>
                    <button type="submit" class="btn light-green">Cargar</button>
                </form>  
                <br>
                <br>       
            </div>
        </div>        
    </div>
<?php require RUTA_APP.'/views/inc/footer-supervisor.inc'; ?>