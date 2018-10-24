<?php require RUTA_APP.'/views/inc/header.inc'; ?>
    <?php require RUTA_APP.'/views/inc/menu_teacher.inc'; ?>
    <div class="container">
        <br>
        <br>
        <div class="row">
            <div class="col s6 center-align">
                <img class="circle responsive-img profile-picture center-align" src="<?= RUTA_URL; ?>/img/profile.png" alt="Imagén de perfil"></td>
                <br>
                <a class="btn light-green" href="<?= RUTA_URL ?>/teacher/see_profile">Ver perfil</a>
            </div>
            <div class="col s6">
                <h3>Hola, <b><?= $_SESSION['name']?></b></h3>
                <hr>
                <p>Te encuentras en <b>SideFlip</b>, donde podrás visualizar y solicitar tu horario como 
                más te guste</p>
                <br>
            </div>
        </div>
        <div class="row">
            <div class="col 12">
                <h3>Clases programadas</h3>
                <hr>
                <p>Por el momento no tienes clases programadas, <a href="<?= RUTA_URL ?>/teacher/lessons">solicita una</a></p>
            </div>    
        </div>
    </div>
    <?php require RUTA_APP.'/views/inc/footer-supervisor.inc'; ?>