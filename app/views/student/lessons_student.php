<h3><i>Sesiones programadas</i></h3>
<div class="row">

 <?php foreach ($data['classes'] as $key ) {
                    $day="";
                    if($key->day_week=="Lunes"){
                        $day="Monday";
                    } else if($key->day_week=="Martes"){
                        $day="Tuesday";
                    } else if($key->day_week=="Miercoles"){
                        $day="Wednesday";
                    } else if($key->day_week=="Jueves"){
                        $day="Thursday";
                    } else if($key->day_week=="Viernes"){
                        $day="Friday";
                    } else{
                        $day="Saturday";
                    }
                ?>
                    <div class="col s12 m4">
                        <div class="card horevable">
                            <div class="card-image">
                            <img class="to-center img-card" src="<?= RUTA_URL?>/img/classes/<?= rand (1,5)?>.jpg">
                            <span class="card-title">Clase <?= $key->name_class?></span>
                            </div>
                            <div class="card-content">
                                <p><b>Categoria: </b><?= $key->name_category?></p>
                                <p><b>Salón: </b> <?= $key->classroom?></p>
                                <p><b>Fecha: </b><?= date('Y-m-d',strtotime("next ".$day)); ?> <?= date('h:i A',strtotime($key->init_time) )?></p>
                                <p><b>Profesor: </b><?= $key->name_person." ".$key->last_name_person ?></p> 
                            </div>
                            <div class="card-action">
                    <a class="waves-effect waves-light modal-trigger" href="#modal1">Mensaje a Docente</a>
                    </div>
                    <!-- Modal Structure -->
                    <div id="modal1" class="modal">
                        <div class="modal-content">
                            <h4>Enviar mensaje a <?= $key->name_person." ".$key->last_name_person ?></h4>
                            <?php
                            $message="";
                            if(isset($_POST['btn_enviar'])){
                                
                                $to = $key->email_person ;// this is your Email address
                                $from = "ssideflip@gmail.com"; // this is the sender's Email address
                                $first_name = "";
                                $last_name = "";
                                $email_teacher ="";
                                $first_name = $data['persons']->name_person;
                                $last_name = $data['persons']->last_name_person;
                                $email_student = $data['persons']->email_person;
                                $class = $key->name_class;
                                $subject = "Clase: " .$class. " - ".$_POST['txt_asunto'];
                                $message = "Del estudiante: ".$first_name." ".$last_name. " ".$email_student." Mensaje: ".$_POST['textarea_msj'];                            
                                mail($to,$subject,$message,$from);
                                
                            }
                         
                            ?>
                            <form action="" method="POST">
                                <div class="input-field col s12">
                                    <input name="txt_asunto" id="txt_asunto" type="text" class="validate" required>
                                    <label for="txt_asunto">Asunto</label>
                                </div>
                                <div class="input-field col s12">
                                    <textarea name="textarea_msj" id="textarea_msj" class="materialize-textarea" required></textarea>
                                    <label for="textarea_msj">Mensaje</label>
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
                <?php
                }?>
        
    </div>   
</div>
