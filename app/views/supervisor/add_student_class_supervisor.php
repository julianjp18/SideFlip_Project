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
                <h2>Asignar estudiante a clase</h2>
                <hr>
                <div class="right-align">
                    <form action="<?= RUTA_URL ?>/supervisor/add_student_class_form" method="POST">
                        <div class="input-field col s12">
                            <input type="number" name="txt_class" id="txt_class" value="<?= $data['id_class']?>" hidden required>
                        </div>
                        <div class="input-field col s12">
                            <select name="cmb_student" id="cmb_student" required>
                                <option value="" disabled selected>Selecciona una opción</option>
                                <?php 
                                foreach ($data['students'] as $key) {
                                    $key = (object) $key;
                                ?>
                                    <option value="<?= $key->id_student?>"><?= $key->name_person." ".$key->last_name_person." - ".$key->age." años"?></option>
                                <?php
                                }
                                ?>
                                
                            </select>
                            <label>Estudiante</label>
                        </div>
                        <br>
                        <button class="btn" name="btn_enviar" id="btn_enviar" type="submit">Agregar Estudiante</button>
                    </form>       
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
                    <h2>Estudiantes registrados en la clase</h2>
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
                   
                            if (is_array($data) || is_object($data) || !empty($data['registers_students'])){
                                $cont = 0;
                                foreach ($data['registers_students'] as $key) {
                                    $key = (object) $key;
                            ?>
                                <tr>
                                    <td><?= $key->name_person." ".$key->last_name_person ?></td>
                                    <td><?= $key->age ?></td>
                                    <td><?= $key->celphone_person ?></td>
                                    <td><?= $key->email_person ?></td>
                                    <td>
                                    <a class="btn red accent-3 btn-delete" href="<?= RUTA_URL ?>/supervisor/delete_student_class/student/<?= $key->id_student ?>/class/<?= $data['id_class']?>">Eliminar Estudiante</a>
                                    </td>
                                </tr>
                            <?php
                                $cont++;
                                }
                                if($cont==0){
                                ?>
                                    <tr>
                                        <td colspan="5">No existen Estudiantes registrados por el momento</td>
                                    </tr>
                                    
                                <?php 
                                }
                            }else{
                            ?>
                                <tr>
                                    <td colspan="5">No existen Estudiantes registrados por el momento</td>
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