<?php require RUTA_APP.'/views/inc/header.inc'; ?>
    <?php require RUTA_APP.'/views/inc/menu_teacher.inc'; ?>
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
                <?php require RUTA_APP.'/views/teacher/lessons_teacher.php'; ?>
            </div>
            <div id="test2" class="col s12">
                <img class="img-responsive" style="max-width:100%" src="<?= RUTA_URL?>/img/calendar.png" alt="img-fullcalendar">
            </div>
            <div id="test3" class="col s12">
                <h3><i>Solicitar clase</i></h3>
                <br>
                <form action="<?= RUTA_URL ?>/teacher/request_class" method="POST">
                    <div class="input-field col s12">
                        <select>
                            <option value="" disabled selected>Selecciona una opción</option>
                            <option value="1">Option 1</option>
                            <option value="2">Option 2</option>
                            <option value="3">Option 3</option>
                        </select>
                        <label>Selecciona una clase</label>
                    </div>
                    <button type="submit" class="btn light-green">Cargar</button>
                </form> 
                <br><br>        
            </div>
        </div>        
    </div>
<?php require RUTA_APP.'/views/inc/footer-supervisor.inc'; ?>