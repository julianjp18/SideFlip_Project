<?php 
if(!isset($_SESSION['id']) || !isset($_SESSION['supervisor']) || $_SESSION['supervisor'] != 1){
    session_destroy();
    redireccionar('/Pages/ingresar');
}
require RUTA_APP.'\views\inc\header-supervisor.inc';
require RUTA_APP.'\views\inc\menu-supervisor.inc'; ?>
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h2>Gestión Estudiante</h2>
                <hr>
                <div class="right-align">
                    <a class="btn light-green modal-trigger" href="#modal01">Agregar estudiante</a>
                </div>
                <!-- Modal Structure -->
                <div id="modal01" class="modal">
                    <div class="modal-content">
                        <h4>Agregar Estudiante</h4>
                        <form action="<?= RUTA_URL ?>/supervisor/add_student" method="POST">
                            <div class="input-field col s12">
                                <input name="txt_name" id="txt_name" type="text" class="validate" required>
                                <label for="txt_name">Nombre</label>
                            </div>
                            <div class="input-field col s12">
                                <input name="txt_last_name" id="txt_last_name" type="text" class="validate" required>
                                <label for="txt_last_name">Apellido</label>
                            </div>
                            <div class="input-field col s12">
                                <input name="txt_identification" id="txt_identification" type="number" min="0" class="validate" required>
                                <label for="txt_identification">Identificación</label>
                            </div>
                            <div class="input-field col s12">
                                <input name="txt_email" id="txt_email" type="email" class="validate" required>
                                <label for="txt_email">Correo electrónico</label>
                            </div>
                            <div class="input-field col s12">
                                <input name="txt_phone" id="txt_phone" type="number" class="validate" min="0" required>
                                <label for="txt_phone">Télefono</label>
                            </div>
                            <div class="input-field col s12">
                                <input name="txt_celphone" id="txt_celphone" type="number" min="0" class="validate" required>
                                <label for="txt_celphone">Celular</label>
                            </div>
                            <div class="input-field col s12">
                                <input name="txt_address" id="txt_address" type="text" class="validate" required>
                                <label for="txt_address">Dirección</label>
                            </div>
                            <div class="input-field col s12">
                                <input name="txt_date_birth" id="txt_date_birth" type="date" max="<?= date('Y-m-d') ?>" class="validate" required>
                                <label for="txt_date_birth">Fecha de nacimiento</label>
                            </div>
                            <div class="input-field col s12">
                                <input name="txt_password" id="txt_password" type="password" minlength="4" class="validate" required>
                                <label for="txt_password">Contraseña</label>
                            </div> 
                            <br>
                            <button class="btn" name="btn_enviar" id="btn_enviar" type="submit">Enviar</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
<?php
if(!empty($_SESSION['message'])){
    echo $_SESSION['message'];
    $_SESSION['message']='';
}
?>
            <div class="col s12">
            <div class="card" style="margin: 20px auto; padding:20px; max-width: 800px">
                <table id="example" class="responsive-table centered">
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
                    <?php 
                   
                            if (is_array($data) || is_object($data)){
                                foreach ($data as $key) {
                            ?>
                                <tr>
                                    <td><?= $key->name_person." ".$key->last_name_person ?></td>
                                    <td><?= $key->age ?></td>
                                    <td><?= $key->celphone_person ?></td>
                                    <td><?= $key->email_person ?></td>
                                    <td>
                                        <a class="btn blue darken-1 btn-view modal-trigger" href="#modal_view<?= $key->id_person ?>"><i class="fa fa-eye"></i></a>   
                                        <a class="btn amber darken-3 btn-update modal-trigger" href="#modal_update<?= $key->id_person ?>"><i class="fa fa-edit"></i></a>
                                    </td>
                                </tr>
                                <!-- Modal Structure -->
                                <div id="modal_view<?= $key->id_person ?>" class="modal">
                                    <div class="modal-content">
                                        <h4>Visualizar Estudiante <b><?= $key->name_person." ".$key->last_name_person ?></b></h4>
                                        <p>
                                            <b>Nombre: </b>&nbsp;&nbsp; <?= $key->name_person." ".$key->last_name_person ?> <br>
                                            <b>Edad: </b>&nbsp;&nbsp; <?= $key->age ?> <br>
                                            <b>Correo electrónico: </b>&nbsp;&nbsp; <?= $key->email_person ?> <br>
                                            <b>Identificación: </b>&nbsp;&nbsp; <?= $key->identification_person ?> <br>
                                            <b>Dirección: </b>&nbsp;&nbsp; <?= $key->address_person ?> <br>
                                            <b>Celular: </b>&nbsp;&nbsp; <?= $key->celphone_person ?> <br>
                                            <b>Teléfono: </b>&nbsp;&nbsp; <?= $key->phone_person ?> <br>
                                            <b>Fecha de nacimiento: </b>&nbsp;&nbsp; <?= $key->birth_date_person ?> <br>
                                            <b>Fecha de admisión</b>&nbsp;&nbsp; <?= date('Y-m-d',strtotime($key->admission_date_person)) ?>
                                        </p>   
                                        
                                    </div>
                                    <hr>
                                    <div class="modal-footer">
                                        <a class="btn red accent-3 btn-delete" href="<?= RUTA_URL ?>/supervisor/delete_student/id/<?= $key->id_person ?>">Eliminar Estudiante</a>
                                        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
                                    </div>
                                </div>
                                <!-- Modal Structure -->
                                <div id="modal_update<?= $key->id_person ?>" class="modal">
                                    <div class="modal-content">
                                        <h4>Modificar Estudiante <b><?= $key->name_person." ".$key->last_name_person ?></b></h4>
                                        <form action="<?= RUTA_URL ?>/supervisor/update_student/id/<?= $key->id_person ?>" method="POST">
                                            <div class="input-field col s12">
                                                <input name="txt_name2" id="txt_name2" type="text" class="validate" value="<?= $key->name_person ?>" required>
                                                <label for="txt_name2">Nombre</label>
                                            </div>
                                            <div class="input-field col s12">
                                                <input name="txt_last_name2" id="txt_last_name2" type="text" value="<?= $key->last_name_person ?>" class="validate" required>
                                                <label for="txt_last_name2">Apellido</label>
                                            </div>
                                            <div class="input-field col s12">
                                                <input name="txt_identification2" id="txt_identification2" type="number" min="0" value="<?= $key->identification_person ?>" class="validate" required>
                                                <label for="txt_identification2">Identificación</label>
                                            </div>
                                            <div class="input-field col s12">
                                                <input name="txt_email2" id="txt_email2" type="email" class="validate" value="<?= $key->email_person ?>" required>
                                                <label for="txt_email2">Correo electrónico</label>
                                            </div>
                                            <div class="input-field col s12">
                                                <input name="txt_phone2" id="txt_phone2" type="number" class="validate" value="<?= $key->phone_person ?>" min="0" required>
                                                <label for="txt_phone2">Télefono</label>
                                            </div>
                                            <div class="input-field col s12">
                                                <input name="txt_celphone2" id="txt_celphone2" type="number" min="0" class="validate" value="<?= $key->celphone_person ?>" required>
                                                <label for="txt_celphone2">Celular</label>
                                            </div>
                                            <div class="input-field col s12">
                                                <input name="txt_address2" id="txt_address2" type="text" class="validate" value="<?= $key->address_person ?>" required>
                                                <label for="txt_address2">Dirección</label>
                                            </div>
                                            <div class="input-field col s12">
                                                <input name="txt_date_birth2" id="txt_date_birth2" type="date" max="<?= date('Y-m-d') ?>" value="<?= $key->birth_date_person ?>" class="validate" required>
                                                <label for="txt_date_birth2">Fecha de nacimiento</label>
                                            </div>
                                            <br>
                                            <button class="btn amber darken-3 btn-update" name="btn_enviar2" id="btn_enviar2" type="submit">Actualizar</button>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="#" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
                                    </div>
                                </div>
                            <?php
                                }
                            }else{
                            ?>
                                <tr>
                                    <td colspan="3">No existen Estudiantes por el momento</td>
                                </tr>
                                <tr><td></td></tr>
                            <?php
                            }
                            ?>
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
<?php require RUTA_APP.'/views/inc/footer-supervisor.inc'; ?>