<?php
if(!isset($_SESSION['id']) || !isset($_SESSION['student']) || $_SESSION['student'] != 3){
    session_destroy();
    redireccionar('/Pages/ingresar');
}
require RUTA_APP.'/views/inc/header.inc'; 
require RUTA_APP.'/views/inc/menu_student.inc'; ?>
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h4>Solicitar clase </h4>
                <p></p>
                <br>
                <?php
                    
                            $message="";
                            if(isset($_POST['btn_enviar'])){
                                $to = "ssideflip@gmail.com"; // this is your Email address
                                $from = "ssideflip@gmail.com"; // this is the sender's Email address
                                $first_name = $data['persons']->name_person;
                                $last_name = $data['persons']->last_name_person;
                                $subject = "Solicitud clase: " . $first_name. " ".$last_name;
                                $message = $_POST['msj-email'];                  
                                mail($to,$subject,$message,$from);
                                }
                            ?>
                <form action="" method="POST">
                    <div class="input-field col s12">
                        <select name="msj-email" id="msj-email" required>
                            <option value="" disabled selected>Selecciona una opción</option>
                            <?php 
                                foreach ($data['schedules'] as $key) {
                                    $key = (object) $key;
                                ?>
                                    <option value="<?= "Ritmo: ".$key->name_rhythm.". Clase: ". $key->name_class.". Horario: ".$key->day_week. " de ". $key->init_time. " a ". $key->end_time ." - Categoria: ". $key->name_category ?>">
                                         <?= "Ritmo: ".$key->name_rhythm.". Clase: ". $key->name_class.". Horario: ".$key->day_week. " de ". $key->init_time. " a ". $key->end_time ." - Categoria: ". $key->name_category?>
                                    </option>
                                <?php
                                }
                            ?>
                            
                        </select>
                        <label>Selecciona los siguientes horarios programados para la clase</label>
                    </div>
                    <br>
                    <button class="btn light-green" onclick="M.toast({html: 'Solicitud Enviada correctamente, pronto recibirá mensaje de confirmación'})" name="btn_enviar" id="btn_enviar">Enviar</button>
                </form>
                <br>
                <br>
                <a class="btn blue" href="<?= RUTA_URL ?>/student/lessons">volver</a>
            </div>
        </div>
        <br>
        <br>
    </div>
<?php require RUTA_APP.'/views/inc/footer-supervisor.inc'; ?>