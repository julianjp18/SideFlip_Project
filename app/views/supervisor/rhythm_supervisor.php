<?php require RUTA_APP.'\views\inc\header-supervisor.inc'; ?>
    <?php require RUTA_APP.'\views\inc\menu-supervisor.inc'; ?>
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h2>Gestión Ritmos</h2>
                <hr>
                <div class="right-align">
                    <a class="btn light-green modal-trigger" href="#modal1">Agregar ritmo</a>
                </div>
                <!-- Modal Structure -->
                <div id="modal1" class="modal">
                    <div class="modal-content">
                        <h4>Agregar Ritmo</h4>
                        <form action="" method="POST">
                            <div class="input-field col s12">
                                <input name="txt_name" id="txt_name" type="text" class="validate" required>
                                <label for="txt_name">Nombre Ritmo</label>
                            </div>
                            <div class="input-field col s12">
                                <textarea name="textarea_msj" id="textarea_msj" class="materialize-textarea" required></textarea>
                                <label for="textarea_msj">Descripción</label>
                            </div>
                            <br>
                            <button class="btn" onclick="M.toast({html: 'Mensaje Enviado correctamente'})" name="btn_enviar" id="btn_enviar" type="submit">Enviar</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col s12">
            <div class="card" style="margin: 20px auto; padding:20px; max-width: 800px">
                <table id="example" class="bordered">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Acción</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>{{name_rythm}}</td><td>{{description_rythm}}</td>
                            <td>
                                <a class="btn red accent-3 btn-delete" href="">Eliminar</a>
                                <a class="btn amber darken-3 btn-update" href="">Modificar</a>
                            </td>
                        </tr>
                        <tr>
                        <td>{{name_rythm}}</td><td>{{description_rythm}}</td>
                            <td>
                                <a class="btn red accent-3 btn-delete" href="">Eliminar</a>
                                <a class="btn amber darken-3 btn-update" href="">Modificar</a>
                            </td>
                        </tr>
                        <tr>
                        <td>{{name_rythm}}</td><td>{{description_rythm}}</td>
                            <td>
                                <a class="btn red accent-3 btn-delete" href="">Eliminar</a>
                                <a class="btn amber darken-3 btn-update" href="">Modificar</a>
                            </td>
                        </tr>
                        <tr>
                        <td>{{name_rythm}}</td><td>{{description_rythm}}</td>
                            <td>
                                <a class="btn red accent-3 btn-delete" href="">Eliminar</a>
                                <a class="btn amber darken-3 btn-update" href="">Modificar</a>
                            </td>
                        </tr>
                        <tr>
                        <td>{{name_rythm}}</td><td>{{description_rythm}}</td>
                            <td>
                                <a class="btn red accent-3 btn-delete" href="">Eliminar</a>
                                <a class="btn amber darken-3 btn-update" href="">Modificar</a>
                            </td>
                        </tr>
                        <tr>
                        <td>{{name_rythm}}</td><td>{{description_rythm}}</td>
                            <td>
                                <a class="btn red accent-3 btn-delete" href="">Eliminar</a>
                                <a class="btn amber darken-3 btn-update" href="">Modificar</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
<?php require RUTA_APP.'/views/inc/footer-supervisor.inc'; ?>