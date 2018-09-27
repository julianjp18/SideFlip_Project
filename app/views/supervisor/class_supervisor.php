<?php require RUTA_APP.'\views\inc\header-supervisor.inc'; ?>
    <?php require RUTA_APP.'\views\inc\menu-supervisor.inc'; ?>
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h2>Gestión Clases</h2>
                <hr>
                <div class="right-align">
                    <a class="btn light-green modal-trigger" href="#modal1">Agregar Clase</a>
                </div>
                <!-- Modal Structure -->
                <div id="modal1" class="modal">
                    <div class="modal-content">
                        <h4>Agregar Clase</h4>
                        <form action="" method="POST">
                            <div class="input-field col s12">
                                <input name="txt_name" id="txt_name" type="text" class="validate" required>
                                <label for="txt_name">Nombre Clase</label>
                            </div>
                            <div class="input-field col s12">
                                <textarea name="textarea_msj" id="textarea_msj" class="materialize-textarea" required></textarea>
                                <label for="textarea_msj">Descripción</label>
                            </div>
                            <div class="input-field col s12">
                                <select>
                                    <option value="" disabled selected>Selecciona una opción</option>
                                    <option value="1">Pepito Alvarez</option>
                                    <option value="2">Joen Doe</option>
                                    <option value="3">Lorem Ipsum</option>
                                </select>
                                <label>Docente</label>
                            </div>
                            <div class="input-field col s12">
                                <select>
                                    <option value="" disabled selected>Selecciona una opción</option>
                                    <option value="1">Salsa</option>
                                    <option value="2">Rock</option>
                                    <option value="3">Break Dance</option>
                                </select>
                                <label>Categoria</label>
                            </div>
                            <div class="input-field col s12">
                                <select>
                                    <option value="" disabled selected>Selecciona una opción</option>
                                    <option value="1">Salsa</option>
                                    <option value="2">Rock</option>
                                    <option value="3">Break Dance</option>
                                </select>
                                <label>Ritmo</label>
                            </div>
                            <div class="input-field col s12">
                                <input name="txt_init_date" id="txt_asunto" type="date" class="validate" required> 
                                <label for="txt_init_date">Fecha Inicio Clases</label>
                            </div>
                            <div class="input-field col s12">
                                <input name="txt_end_date" id="txt_asunto" type="date" class="validate" required> 
                                <label for="txt_end_date">Fecha Finalización Clases</label>
                            </div>
                            <div class="input-field col s12">
                                <select>
                                    <option value="" disabled selected>Selecciona una opción</option>
                                    <option value="1">Lunes</option>
                                    <option value="2">Martes</option>
                                    <option value="3">Miércoles</option>
                                    <option value="3">Jueves</option>
                                    <option value="3">Viernes</option>
                                    <option value="3">Sábado</option>
                                    <option value="3">Domingo</option>
                                </select>
                                <label>Día de la semana</label>
                            </div>
                            <div class="input-field col s12">
                                <input name="txt_init_time" id="txt_init_time" type="time" class="validate" required> 
                                <label for="txt_init_time">Hora inicio Clase</label>
                            </div>
                            <div class="input-field col s12">
                                <input name="txt_end_time" id="txt_end_time" type="time" class="validate" required> 
                                <label for="txt_end_time">Hora fin Clase</label>
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
                        <h4>Visualizar Clase</h4>
                        <table class="centered responsive-table">
                            <tbody>
                                <tr>
                                    <td>Nombre</td>
                                    <td>{{name_class}}</td>
                                </tr>
                                <tr>
                                    <td>Descripción</td>
                                    <td>{{description_class}}</td>
                                </tr>
                                <tr>
                                    <td>Fecha Inicio</td>
                                    <td>{{init_date_class}}</td>
                                </tr>
                                <tr>
                                    <td>Fecha finalización</td>
                                    <td>{{end_date_class}}</td>
                                </tr>
                                <tr>
                                    <td>Día de la semana</td>
                                    <td>{{day_of_week}}</td>
                                </tr>
                                <tr>
                                    <td>Hora inicio</td>
                                    <td>{{init_time}}</td>
                                </tr>
                                <tr>
                                    <td>Hora fin</td>
                                    <td>{{end_time}}</td>
                                </tr>
                                <tr>
                                    <td>Categoria</td>
                                    <td>{{name_category}}</td>
                                </tr>
                                <tr>
                                    <td>Ritmo</td>
                                    <td>{{rythm_category}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
                    </div>
                </div>
                <!-- Modal Structure -->
                <div id="modal3" class="modal">
                    <div class="modal-content">
                        <h4>Agregar Clase</h4>
                        <form action="" method="POST">
                            <div class="input-field col s12">
                                <input name="txt_name" id="txt_name" type="text" class="validate" value="{{name_class}}" required>
                                <label for="txt_name">Nombre Clase</label>
                            </div>
                            <div class="input-field col s12">
                                <textarea name="textarea_msj" id="textarea_msj" class="materialize-textarea" value="{{description_class}}" required></textarea>
                                <label for="textarea_msj">Descripción</label>
                            </div>
                            <div class="input-field col s12">
                                <select>
                                    <option value="" disabled selected>Selecciona una opción</option>
                                    <option value="1">Pepito Alvarez</option>
                                    <option value="2">Joen Doe</option>
                                    <option value="3">Lorem Ipsum</option>
                                </select>
                                <label>Docente</label>
                            </div>
                            <div class="input-field col s12">
                                <select>
                                    <option value="" disabled selected>Selecciona una opción</option>
                                    <option value="1">Salsa</option>
                                    <option value="2">Rock</option>
                                    <option value="3">Break Dance</option>
                                </select>
                                <label>Categoria</label>
                            </div>
                            <div class="input-field col s12">
                                <select>
                                    <option value="" disabled selected>Selecciona una opción</option>
                                    <option value="1">Salsa</option>
                                    <option value="2">Rock</option>
                                    <option value="3">Break Dance</option>
                                </select>
                                <label>Ritmo</label>
                            </div>
                            <div class="input-field col s12">
                                <input name="txt_init_date" id="txt_asunto" type="date" class="validate" required> 
                                <label for="txt_init_date">Fecha Inicio Clases</label>
                            </div>
                            <div class="input-field col s12">
                                <input name="txt_end_date" id="txt_asunto" type="date" class="validate" required> 
                                <label for="txt_end_date">Fecha Finalización Clases</label>
                            </div>
                            <div class="input-field col s12">
                                <select>
                                    <option value="" disabled selected>Selecciona una opción</option>
                                    <option value="1">Lunes</option>
                                    <option value="2">Martes</option>
                                    <option value="3">Miércoles</option>
                                    <option value="3">Jueves</option>
                                    <option value="3">Viernes</option>
                                    <option value="3">Sábado</option>
                                    <option value="3">Domingo</option>
                                </select>
                                <label>Día de la semana</label>
                            </div>
                            <div class="input-field col s12">
                                <input name="txt_init_time" id="txt_init_time" type="time" class="validate" required> 
                                <label for="txt_init_time">Hora inicio Clase</label>
                            </div>
                            <div class="input-field col s12">
                                <input name="txt_end_time" id="txt_end_time" type="time" class="validate" required> 
                                <label for="txt_end_time">Hora fin Clase</label>
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
                            <th>Categoria</th>
                            <th>Docente</th>
                            <th>Ritmo</th>
                            <th>Acción</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>Salsa Básica</td><td>Juvenil</td><td>Pepito Alvarez</td><td>Movido</td>
                            <td>
                                <a class="btn blue darken-1 btn-view modal-trigger" href="#modal2">Visualizar</a>
                                <a class="btn red accent-3 btn-delete" href="">Eliminar</a>
                                <a class="btn amber darken-3 btn-update modal-trigger" href="#modal3">Modificar</a>
                            </td>
                        </tr>
                        <tr>
                            <td>{{name_class}}</td><td>{{category}}</td><td>{{teacher}}</td><td>{{rythm}}</td>
                            <td>
                                <a class="btn blue darken-1 btn-view modal-trigger" href="#modal2">Visualizar</a>
                                <a class="btn red accent-3 btn-delete" href="">Eliminar</a>
                                <a class="btn amber darken-3 btn-update modal-trigger" href="#modal3">Modificar</a>
                            </td>
                        </tr>
                        <tr>
                            <td>{{name_class}}</td><td>{{category}}</td><td>{{teacher}}</td><td>{{rythm}}</td>
                            <td>
                                <a class="btn blue darken-1 btn-view modal-trigger" href="#modal2">Visualizar</a>
                                <a class="btn red accent-3 btn-delete" href="">Eliminar</a>
                                <a class="btn amber darken-3 btn-update modal-trigger" href="#modal3">Modificar</a>
                            </td>
                        </tr>
                        <tr>
                            <td>{{name_class}}</td><td>{{category}}</td><td>{{teacher}}</td><td>{{rythm}}</td>
                            <td>
                                <a class="btn blue darken-1 btn-view modal-trigger" href="#modal2">Visualizar</a>
                                <a class="btn red accent-3 btn-delete" href="">Eliminar</a>
                                <a class="btn amber darken-3 btn-update modal-trigger" href="#modal3">Modificar</a>
                            </td>
                        </tr>
                        <tr>
                            <td>{{name_class}}</td><td>{{category}}</td><td>{{teacher}}</td><td>{{rythm}}</td>
                            <td>
                                <a class="btn blue darken-1 btn-view modal-trigger" href="#modal2">Visualizar</a>
                                <a class="btn red accent-3 btn-delete" href="">Eliminar</a>
                                <a class="btn amber darken-3 btn-update modal-trigger" href="#modal3">Modificar</a>
                            </td>
                        </tr>
                        <tr>
                            <td>{{name_class}}</td><td>{{category}}</td><td>{{teacher}}</td><td>{{rythm}}</td>
                            <td>
                                <a class="btn blue darken-1 btn-view modal-trigger" href="#modal2">Visualizar</a>
                                <a class="btn red accent-3 btn-delete" href="">Eliminar</a>
                                <a class="btn amber darken-3 btn-update modal-trigger" href="#modal3">Modificar</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>

<?php require RUTA_APP.'/views/inc/footer-supervisor.inc'; ?>