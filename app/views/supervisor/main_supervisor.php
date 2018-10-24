<?php 
if(!isset($_SESSION['id']) || !isset($_SESSION['supervisor']) || $_SESSION['supervisor'] != 1){
    session_destroy();
    redireccionar('/Pages/ingresar');
}
require RUTA_APP.'\views\inc\header-supervisor.inc';
require RUTA_APP.'\views\inc\menu-supervisor.inc'; ?>
    <div class="container">
        <div class="col s12"> 
            <h2>Hola, Asesor <b><?= $_SESSION['name']?></b></h2>
            <div class="divider"></div>
            <p>Acá encontrarás todo lo relacionado a la gestión de tu academia</p>
            <br>
            <h3><i>Proximas sesiones</i></h3>
            <div class="divider"></div>
            <div class="row">
                <?php foreach ($data as $key ) {
                    $day="";
                    if($key->day_week=="Lunes"){
                        $day="Monday";
                    } else if($key->day_week=="Martes"){
                        $day="Tuesday";
                    } else if($key->day_week=="Miercoles"){
                        $day="Wednesday";
                    } else if($key->day_week=="Jueves"){
                        $day="Thursday";
                    } else if($key->day_week=="Viernes"){
                        $day="Friday";
                    } else{
                        $day="Saturday";
                    }
                ?>
                    <div class="col s12 m4">
                        <div class="card horevable">
                            <div class="card-image">
                            <img class="to-center img-card" src="<?= RUTA_URL?>/img/classes/<?= rand (1,5)?>.jpg">
                            <span class="card-title">Clase <?= $key->name_class?></span>
                            </div>
                            <div class="card-content">
                                <p><b>Categoria: </b><?= $key->name_category?></p>
                                <p><b>Salón: </b> <?= $key->classroom?></p>
                                <p><b>Fecha: </b><?= date('Y-m-d',strtotime("next ".$day)); ?> <?= date('h:i A',strtotime($key->init_time) )?></p>
                            </div>
                        </div>
                    </div>
                <?php
                }?>
            </div>  
      </div>
    </div>
    
<?php require RUTA_APP.'/views/inc/footer-supervisor.inc'; ?>