<?php require RUTA_APP.'\views\inc\header-supervisor.inc'; ?>
    <?php require RUTA_APP.'\views\inc\menu-supervisor.inc'; ?>
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h2>Gestión Estudiante</h2>
                <hr>
                <div class="right-align">
                    <a class="btn light-green modal-trigger" href="#modal1">Agregar estudiante</a>
                </div>
                <!-- Modal Structure -->
                <div id="modal1" class="modal">
                    <div class="modal-content">
                        <h4>Agregar Estudiante</h4>
                        <form action="" method="POST">
                            <div class="input-field col s12">
                                <input name="txt_name" id="txt_name" type="text" class="validate" required>
                                <label for="txt_name">Nombre</label>
                            </div>
                            <div class="input-field col s12">
                                <input name="txt_name" id="txt_name" type="text" class="validate" required>
                                <label for="txt_name">Apellido</label>
                            </div>
                            <div class="input-field col s12">
                                <input name="txt_name" id="txt_name" type="text" class="validate" required>
                                <label for="txt_name">Correo electrónico</label>
                            </div>
                            <div class="input-field col s12">
                                <input name="txt_name" id="txt_name" type="number" class="validate" required>
                                <label for="txt_name">Télefono</label>
                            </div>
                            <div class="input-field col s12">
                                <input name="txt_name" id="txt_name" type="number" class="validate" required>
                                <label for="txt_name">Celular</label>
                            </div>
                            <div class="input-field col s12">
                                <input name="txt_name" id="txt_name" type="number" class="validate" required>
                                <label for="txt_name">Dirección</label>
                            </div>
                            <div class="input-field col s12">
                                <input name="txt_name" id="txt_name" type="date" class="validate" required>
                                <label for="txt_name">Fecha de nacimiento</label>
                            </div>
                            <br>
                            <button class="btn" onclick="M.toast({html: 'Mensaje Enviado correctamente'})" name="btn_enviar" id="btn_enviar" type="submit">Enviar</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
                    </div>
                </div>
                <!-- Modal Structure -->
                <div id="modal2" class="modal">
                    <div class="modal-content">
                        <h4>Visualizar Estudiante</h4>
                        <table class="centered responsive-table">
                            <tbody>
                                <tr>
                                    <td>Nombre</td>
                                    <td>{{name_student}}</td>
                                </tr>
                                <tr>
                                    <td>Edad</td>
                                    <td>{{age_student}}</td>
                                </tr>
                                <tr>
                                    <td>Correo electrónico</td>
                                    <td>{{email_student}}</td>
                                </tr>
                                <tr>
                                    <td>Dirección</td>
                                    <td>{{address_student}}</td>
                                </tr>
                                <tr>
                                    <td>Celular</td>
                                    <td>{{celphone_student}}</td>
                                </tr>
                                <tr>
                                    <td>Télefono</td>
                                    <td>{{phone_student}}</td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                        <a class="btn amber darken-3 btn-update" href="">Modificar</a>
                    </div>
                    <hr>
                    <div class="modal-footer">
                        <a class="btn red accent-3 btn-delete" href="">Eliminar Estudiante</a>
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
                            <th>Edad</th>
                            <th>Celular</th>
                            <th>Correo</th>
                            <th>Acción</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>{{name_person}}</td><td>{{age_person}}</td><td>{{celphone_person}}</td><td>{{email_person}}</td>
                            <td>
                                <a class="btn blue darken-1 btn-view modal-trigger" href="#modal2">Visualizar</a>   
                            </td>
                        </tr>
                        <tr>
                            <td>{{name_person}}</td><td>{{age_person}}</td><td>{{celphone_person}}</td><td>{{email_person}}</td>
                            <td>
                                <a class="btn blue darken-1 btn-view modal-trigger" href="#modal2">Visualizar</a>   
                            </td>
                        </tr>
                        <tr>
                            <td>{{name_person}}</td><td>{{age_person}}</td><td>{{celphone_person}}</td><td>{{email_person}}</td>
                            <td>
                                <a class="btn blue darken-1 btn-view modal-trigger" href="#modal2">Visualizar</a>   
                            </td>
                        </tr>
                        <tr>
                            <td>{{name_person}}</td><td>{{age_person}}</td><td>{{celphone_person}}</td><td>{{email_person}}</td>
                            <td>
                                <a class="btn blue darken-1 btn-view modal-trigger" href="#modal2">Visualizar</a>   
                            </td>
                        </tr>
                        <tr>
                            <td>{{name_person}}</td><td>{{age_person}}</td><td>{{celphone_person}}</td><td>{{email_person}}</td>
                            <td>
                                <a class="btn blue darken-1 btn-view modal-trigger" href="#modal2">Visualizar</a>   
                            </td>
                        </tr>
                        <tr>
                            <td>{{name_person}}</td><td>{{age_person}}</td><td>{{celphone_person}}</td><td>{{email_person}}</td>
                            <td>
                                <a class="btn blue darken-1 btn-view modal-trigger" href="#modal2">Visualizar</a>   
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
<?php require RUTA_APP.'/views/inc/footer-supervisor.inc'; ?>