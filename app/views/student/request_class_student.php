<?php require RUTA_APP.'/views/inc/header.inc'; ?>
    <?php require RUTA_APP.'/views/inc/menu_student.inc'; ?>
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h4>Solicitar clase {{nombre_clase}}</h4>
                <p>{{ descripcion_clase}}</p>
                <br>
                <form action="" method="POST">
                    <div class="input-field col s12">
                        <select>
                            <option value="" disabled selected>Selecciona una opción</option>
                            <option value="1">Option 1</option>
                            <option value="2">Option 2</option>
                            <option value="3">Option 3</option>
                        </select>
                        <label>Selecciona los siguientes horarios programados para la clase</label>
                    </div>
                    <br>
                    <button class="btn light-green" onclick="M.toast({html: 'Solicitud Enviada correctamente, pronto recibirá mensaje de confirmación'})" name="btn_enviar" id="btn_enviar">Enviar</button>
                </form>
                <a class="btn blue" href="<?= RUTA_URL ?>/student/lessons">volver</a>
            </div>
        </div>
        <br>
        <br>
    </div>
<?php require RUTA_APP.'/views/inc/footer-supervisor.inc'; ?>