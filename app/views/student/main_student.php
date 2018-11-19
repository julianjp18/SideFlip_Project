<?php 
 if(!isset($_SESSION['id']) || !isset($_SESSION['student']) || $_SESSION['student'] != 3){
    session_destroy();
    redireccionar('/Pages/ingresar');
}
   require RUTA_APP.'/views/inc/header.inc'; 
   require RUTA_APP.'/views/inc/menu_student.inc'; ?>
 <div class="container">
    <br>
        <br>
        <div class="row">
            <div class="col s6 center-align">
                <img class="circle responsive-img profile-picture center-align" src="<?= RUTA_URL; ?>/img/profile.png" alt="Imagén de perfil"></td>
                <br>
                <a class="btn light-green" href="<?= RUTA_URL ?>/student/see_profile">Ver perfil</a>
            </div>
            <div class="col s6">
                <h3>Hola, <b><?= $_SESSION['name']?></b></h3>
                <hr>
                <p>Te encuentras en <b>SideFlip</b>, donde podrás visualizar y solicitar tu horario como 
                más te guste</p>
                <br>
            </div>
        </div>
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