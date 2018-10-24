<h2>Actualizar contraseña</h2>
<br>
<?php
session_start(); 
if(!empty($_SESSION['message'])){
    echo $_SESSION['message'];
    $_SESSION['message']='';
}
?>
<form class="col s12" action="<?= RUTA_URL ?>/pages/update_password" method="POST">
    <div class="row">
        <div class="input-field col s12">
            <input name="txt_old_password" id="txt_old_password" type="password" class="validate" required>
            <label for="txt_old_password">Actual contraseña</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s6">
            <input name="txt_password_1" id="txt_password_1" type="password" class="validate" required>
            <label for="txt_password_1">Nueva contraseña</label>
        </div>
        <div class="input-field col s6">
            <input name="txt_password_2" id="txt_password_2" type="password" class="validate" required>
            <label for="txt_password_2">Repite contraseña</label>
        </div>
    </div>
    <div class="row">
        <div class="col s6">
        <button class="btn  light-green"  type="submit">Actualizar</button>
        </div>
        <div class="col s6">
        <?php 
             if(isset($_SESSION['supervisor']) && $_SESSION['supervisor'] == 1){
        ?>
                <a class="btn blue" href="<?= RUTA_URL ?>/supervisor/see_profile">Volver</a>
        <?php
            } else if(isset($_SESSION['teacher']) && $_SESSION['teacher'] == 2){
        ?>
                <a class="btn blue" href="<?= RUTA_URL ?>/teacher/see_profile">Volver</a>
        <?php
            } else if(isset($_SESSION['student']) && $_SESSION['student'] == 3){
        ?>
                <a class="btn blue" href="<?= RUTA_URL ?>/student/see_profile">Volver</a>
        <?php
            }
        ?>
            
        </div>
    </div>
</form>
