<?php 
session_start();
if(!isset($_SESSION['id']) || !isset($_SESSION['supervisor']) || $_SESSION['supervisor'] != 1){
    session_destroy();
    redireccionar('/Pages/ingresar');
}
require RUTA_APP.'\views\inc\header-supervisor.inc';
require RUTA_APP.'\views\inc\menu-supervisor.inc';
    $row = (object) $data['classes'];
    $row2 = (object) $data['classes']['teacher'];
    $row3 = (object) $data['classes']['category'];
    $row4 = (object) $data['classes']['rhythm'];
    $row5 = (object) $data['classes']['schedule'];
?>
    <div class="container">
        <br>  
        <div class="row">
            <div class="col s9">
                <h2>Modificar clase <b><?= $row->name_class ?></b></h2>
            </div>
            <div class="col s3 right-align">
                <a class="btn" href="<?= RUTA_URL ?>/supervisor/lessons">Volver</a>
            </div>
        </div>
        <div class="row">
            <div class="col s12">
            <form action="<?= RUTA_URL ?>/supervisor/update_class_form/id/<?= $row->id_class ?>" method="POST">
                <div class="input-field col s12">
                    <input name="txt_name2" id="txt_name2" type="text" value="<?= $row->name_class ?>" class="validate" required>
                    <label for="txt_name2">Nombre Clase</label>
                </div>
                <div class="input-field col s12">
                    <textarea name="txt_description2" id="txt_description2" class="materialize-textarea" required><?= $row->description_class ?></textarea>
                    <label for="txt_description2">Descripción</label>
                </div>
                <div class="input-field col s12">
                    <input name="txt_classroom2" id="txt_classroom2" type="text" value="<?= $row->classroom ?>" class="validate" required>
                    <label for="txt_classroom2">Salón</label>
                </div>
                <div class="input-field col s12">
                    <select name="cmb_teacher2" id="cmb_teacher2" required>
                        <option value="<?= $row->id_teacher ?>"><?= $row2->name_person." ".$row2->last_name_person ?></option>
                        <?php 
                        foreach ($data['teachers'] as $key_teacher) {
                            $key_teacher = (object) $key_teacher;
                        ?>
                            <option value="<?= $key_teacher->id_teacher?>"><?= $key_teacher->name_person." ".$key_teacher->last_name_person?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <label>Docente</label>
                </div>
                <div class="input-field col s12">
                    <select name="cmb_category_update" id="cmb_category_update" required>
                        <option value="<?= $row3->id_category ?>"><?= $row3->name_category ?></option>
                        <?php 
                        foreach ($data['categories'] as $key_category) {
                            $key_category = (object) $key_category;
                        ?>
                            <option value="<?= $key_category->id_category?>"><?= $key_category->name_category?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <label>Categoria</label>
                </div>
                <div class="input-field col s12">
                    <select  name="cmb_rhythm2" id="cmb_rhythm2" required>
                        <option value="<?= $row4->id_rhythm ?>"><?= $row4->name_rhythm ?></option>
                        <?php 
                        foreach ($data['rhythms'] as $key_rhythm) {
                            $key_rhythm = (object) $key_rhythm;
                        ?>
                            <option value="<?= $key_rhythm->id_rhythm?>"><?= $key_rhythm->name_rhythm?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <label>Ritmo</label>
                </div>
                <div class="input-field col s12">
                    <input name="txt_init_date2" id="txt_init_date2" type="date" class="validate" value="<?= date('Y-m-d',strtotime($row5->init_date)) ?>" required> 
                    <label for="txt_init_date2">Fecha Inicio Clases</label>
                </div>
                <div class="input-field col s12">
                    <input name="txt_end_date2" id="txt_end_date2" type="date" class="validate" value="<?= date('Y-m-d',strtotime($row5->end_date)) ?>" required> 
                    <label for="txt_end_date2">Fecha Finalización Clases</label>
                </div>
                <div class="input-field col s12">
                    <select multiple name="cmb_day_update" id="cmb_day_update" class="validate" required>
                    <option value="<?= $row5->day_week ?>" selected><?= $row5->day_week ?></option>
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
                    <input name="txt_init_time2" id="txt_init_time2" type="time" class="validate" value="<?= $row5->init_time ?>" required> 
                    <label for="txt_init_time2">Hora inicio Clase</label>
                </div>
                <div class="input-field col s12">
                    <input name="txt_end_time2" id="txt_end_time2" type="time" class="validate" value="<?= $row5->end_time ?>" required> 
                    <label for="txt_end_time2">Hora fin Clase</label>
                </div>
                <br>
                <button class="btn" name="btn_enviar" id="btn_enviar" type="submit">Enviar</button>
            </form>
            </div>
        </div>
    </div>
<?php require RUTA_APP.'/views/inc/footer-supervisor.inc'; ?>