<h3>Actualiza tu información, <b><?= $_SESSION['name'] ?></b></h3>
<p>Es importante que mantengas actualizada tu información.</p>
<?php 
if(!empty($_SESSION['message'])){
    echo $_SESSION['message'];
    $_SESSION['message']='';
}
?>
<form class="col s12" action="<?= RUTA_URL ?>/pages/update_profile" method="POST">
    <div class="row">
        <div class="input-field col s6">
            <input name="txt_name" id="txt_name" type="text" class="validate" value="<?= $data->name_person ?>" required>
            <label for="txt_name">Nombre</label>
        </div>
        <div class="input-field col s6">
            <input name="txt_last_name" id="txt_last_name" type="text" value="<?= $data->last_name_person ?>" class="validate" required>
            <label for="txt_last_name">Apellido</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
            <input name="txt_email" id="txt_email" type="email" value="<?= $data->email_person ?>" class="validate" required>
            <label for="txt_email">Correo electrónico</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
            <input name="txt_identification" id="txt_identification" type="number" value="<?= $data->identification_person ?>" class="validate" required>
            <label for="txt_identification">Identificación</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
            <input name="txt_phone" id="txt_phone" type="number" value="<?= $data->phone_person ?>" class="validate" required>
            <label for="txt_phone">Teléfono</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
            <input name="txt_celphone" id="txt_celphone" type="number" value="<?= $data->celphone_person ?>" class="validate" required>
            <label for="txt_celphone">Celular</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
            <input name="txt_birth_date" id="txt_birth_date" type="date" max="<?= date('Y-m-d') ?>" value="<?= $data->birth_date_person ?>" class="validate" required>
            <label for="txt_birth_date">Fecha de nacimiento</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
            <input name="txt_address" id="txt_address" type="text" class="validate" value="<?= $data->address_person ?>" required>
            <label for="txt_address">Dirección</label>
        </div>
    </div>
    <div class="row">
        <div class="col s6">
        <button class="btn light-green" type="submit">Actualizar</button>
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