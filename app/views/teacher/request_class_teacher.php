<?php require RUTA_APP.'/views/inc/header.inc'; ?>
    <?php require RUTA_APP.'/views/inc/menu_teacher.inc'; ?>
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
                            <option value="1">Martes 2 de Octubre - 11 AM a 1 PM</option>
                            <option value="2">Martes 2 Octubre - 2 AM a 4 PM</option>
                            <option value="3">Miércoles 3 de Octubre - 11 AM a 1 PM</option>
                        </select>
                        <label>Selecciona los siguientes horarios programados para la clase</label>
                    </div>
                    <br>
                    <button class="btn light-green" onclick="M.toast({html: 'Solicitud Enviada correctamente, pronto recibirá mensaje de confirmación'})" name="btn_enviar" id="btn_enviar">Enviar</button>
                </form>
                <br>
                <br>
                <a class="btn blue" href="<?= RUTA_URL ?>/teacher/lessons">volver</a>
            </div>
        </div>
        <br>
        <br>
    </div>
<?php require RUTA_APP.'/views/inc/footer-supervisor.inc'; ?>