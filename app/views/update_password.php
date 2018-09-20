<h2>Actualizar contraseña</h2>
<br>
<form class="col s12" action="" method="POST">
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
        <button class="btn  light-green" onclick="M.toast({html: 'Se actualizó la contraseña correctamente'})"  type="submit">Actualizar</button>
        </div>
        <div class="col s6">
            <a class="btn blue" href="">Volver</a>
        </div>
    </div>
</form>
