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
                <h2>Gestión Clases</h2>
                <hr>
                <div class="right-align">
                    <a class="btn light-green modal-trigger" href="#modal1">Agregar Clase</a>
                </div>
                <!-- Modal Structure -->
                <div id="modal1" class="modal">
                    <div class="modal-content">
                        <h4>Agregar Clase</h4>
                        <form action="<?= RUTA_URL ?>/supervisor/add_class" method="POST">
                            <div class="input-field col s12">
                                <input name="txt_name" id="txt_name" type="text" class="validate" required>
                                <label for="txt_name">Nombre Clase</label>
                            </div>
                            <div class="input-field col s12">
                                <textarea name="txt_description" id="txt_description" class="materialize-textarea" required></textarea>
                                <label for="txt_description">Descripción</label>
                            </div>
                            <div class="input-field col s12">
                                <textarea name="txt_classroom" id="txt_classroom" class="materialize-textarea" required></textarea>
                                <label for="txt_classroom">Salón</label>
                            </div>
                            <div class="input-field col s12">
                                <select name="cmb_teacher" id="cmb_teacher" required>
                                    <option value="" disabled selected>Selecciona una opción</option>
                                    <?php 
                                   
                                    foreach ($data['teachers'] as $key) {
                                        $key = (object) $key;
                                    ?>
                                        <option value="<?= $key->id_teacher?>"><?= $key->name_person." ".$key->last_name_person?></option>
                                    <?php
                                    }
                                    ?>
                                   
                                </select>
                                <label>Docente</label>
                            </div>
                            <div class="input-field col s12">
                                <select name="cmb_category" id="cmb_category" required>
                                    <option value="" disabled selected>Selecciona una opción</option>
                                    <?php 
                                    foreach ($data['categories'] as $key) {
                                        $key = (object) $key;
                                    ?>
                                        <option value="<?= $key->id_category?>"><?= $key->name_category?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                <label>Categoria</label>
                            </div>
                            <div class="input-field col s12">
                                <select  name="cmb_rhythm" id="cmb_rhythm" required>
                                    <option value="" disabled selected>Selecciona una opción</option>
                                    <?php 
                                    foreach ($data['rhythms'] as $key) {
                                        $key = (object) $key;
                                    ?>
                                        <option value="<?= $key->id_rhythm?>"><?= $key->name_rhythm?></option>
                                    <?php
                                    }
                                    ?>
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
                                <select  name="cmb_day" id="cmb_day" required>
                                    <option value="" disabled selected>Selecciona una opción</option>
                                    <option value="Lunes">Lunes</option>
                                    <option value="Martes">Martes</option>
                                    <option value="Miércoles">Miércoles</option>
                                    <option value="Jueves">Jueves</option>
                                    <option value="Viernes">Viernes</option>
                                    <option value="Sábado">Sábado</option>
                                    <option value="Domingo">Domingo</option>
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
                            <button class="btn" name="btn_enviar" id="btn_enviar" type="submit">Enviar</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
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
                                    <th>Categoria</th>
                                    <th>Docente</th>
                                    <th>Ritmo</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>

                            <tbody>
                            <?php 
                        
                                    if (is_array($data) || is_object($data) || !is_null($data)){
                                    
                                        foreach ($data['classes'] as $key) {
                                            $key = (object) $key; 
                                            $name_teacher = $key->teacher->name_person." ".$key->teacher->last_name_person;
                                            $name_category=$key->category->name_category;
                                            $name_rhythm = $key->rhythm->name_rhythm;
                                            $id_teacher = $key->id_teacher;
                                    ?>
                                        <tr>
                                            <td><?= $key->name_class ?></td>
                                            <td><?= $name_category ?></td>
                                            <td><?= $name_teacher ?></td>
                                            <td><?= $name_rhythm ?></td>
                                            <td>
                                                <a class="btn blue darken-1 btn-view" href="<?= RUTA_URL ?>/supervisor/add_student_class/id/<?= $key->id_class ?>"><i class="material-icons">group_add</i></a> 
                                                <a class="btn light-green btn-view modal-trigger" href="#modal_view<?= $key->id_class ?>"><i class="fa fa-eye"></i></a>   
                                                <a class="btn amber darken-3 btn-update" href="<?= RUTA_URL ?>/supervisor/update_class/id/<?= $key->id_class ?>"><i class="fa fa-edit"></i></a>
                                            </td>
                                            
                                            <!-- Modal Structure -->
                                            <div id="modal_view<?= $key->id_class ?>" class="modal">
                                                <div class="modal-content">
                                                    <div class="row">
                                                        <div class="col s6">
                                                        <h4>Visualizar Clase <b><?= $key->name_class ?></b></h4>
                                                        </div>
                                                        <div class="col s6 right-align">
                                                        <a class="btn red accent-3 btn-delete" href="<?= RUTA_URL ?>/supervisor/delete_class/id/<?= $key->id_class ?>">Eliminar Clase</a>
                                                        </div>
                                                    </div>
                                                    
                                                    <p>
                                                        <i>Nombre: </i>&nbsp;&nbsp; <?= $key->name_class ?> <br>
                                                        <i>Descripción: </i>&nbsp;&nbsp; <?= $key->description_class ?> <br>
                                                        <i>Salón: </i>&nbsp;&nbsp; <?= $key->classroom ?> <br>
                                                        <b>Docente</b> <br>
                                                        <i>Nombre </i>&nbsp;&nbsp; <?= $key->teacher->name_person." ".$key->teacher->last_name_person ?> <br>
                                                        <i>Email: </i>&nbsp;&nbsp; <?= $key->teacher->email_person ?> <br>
                                                        <i>Celular: </i>&nbsp;&nbsp; <?= $key->teacher->celphone_person ?> <br>
                                                        <b>Categoria</b> <br>
                                                        <i>Nombre: </i>&nbsp;&nbsp; <?= $key->category->name_category ?> <br>
                                                        <i>Descripción categoria: </i>&nbsp;&nbsp; <?= $key->category->description_category ?> <br>
                                                        <b>Ritmo</b> <br>
                                                        <i>Nombre: </i>&nbsp;&nbsp; <?= $key->rhythm->name_rhythm ?> <br>
                                                        <i>Descripción ritmo:</i>&nbsp;&nbsp; <?= $key->rhythm->description_rhythm ?> <br>
                                                        <b>Semestre</b> <br>
                                                        <i>Desde </i>&nbsp;&nbsp; <?= date('Y-m-d',strtotime($key->schedule->init_date)) ?> <br>
                                                        <i>Hasta </i>&nbsp;&nbsp; <?= date('Y-m-d',strtotime($key->schedule->end_date)) ?> <br>
                                                        <i>Día entrenamiento: </i>&nbsp;&nbsp; <?= $key->schedule->day_week ?> <br>
                                                        <i>Hora</i>&nbsp;&nbsp; <?= date('h:i A',strtotime($key->schedule->init_time)) ?> - <?= date('h:i A',strtotime($key->schedule->end_time)) ?>
                                                    </p>   
                                                    
                                                </div>
                                                <hr>
                                                <div class="modal-footer">
                                                    <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
                                                </div>
                                            </div>
                                    <?php
                                            
                                        }
                                    }else{
                                    ?>
                                        <tr>
                                            <td colspan="3">No existen Clases por el momento</td>
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