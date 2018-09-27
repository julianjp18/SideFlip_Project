<h3><i>Sesiones programadas</i></h3>
<div class="row">
        <div class="col s12 m4">
                <div class="card horevable">
                    <div class="card-image">
                    <img class="to-center img-card" src="<?= RUTA_URL?>/img/class.jpg">
                    <span class="card-title">Clase Hip - Hop</span>
                    </div>
                    <div class="card-content">
                        <p>Nivel Intermedio - Juvenil</p>
                        <p>Salón 210</p>
                        <p>12/09/2018 03:30 PM</p>
                    </div>
                    <div class="card-action">
                    <a class="waves-effect waves-light modal-trigger" href="#modal1">Mensaje a Estudiantes</a>
                    </div>
                    <!-- Modal Structure -->
                    <div id="modal1" class="modal">
                        <div class="modal-content">
                            <h4>Enviar mensaje a Estudiantes</h4>
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
        <div class="col s12 m4">
                <div class="card">
                    <div class="card-image">
                    <img class="to-center img-card" src="<?= RUTA_URL?>/img/class.jpg">
                    <span class="card-title">Clase Hip - Hop</span>
                    </div>
                    <div class="card-content">
                        <p>Nivel Intermedio - Juvenil</p>
                        <p>Salón 210</p>
                        <p>12/09/2018 03:30 PM</p>
                    </div>
                    <div class="card-action">
                        <a href="#">Mensaje a Estudiantes</a>
                    </div>
                </div>
        </div>
        <div class="col s12 m4">
                <div class="card">
                    <div class="card-image">
                    <img class="to-center img-card" src="<?= RUTA_URL?>/img/class.jpg">
                    <span class="card-title">Clase Hip - Hop</span>
                    </div>
                    <div class="card-content">
                        <p>Nivel Intermedio - Juvenil</p>
                        <p>Salón 210</p>
                        <p>12/09/2018 03:30 PM</p>
                    </div>
                    <div class="card-action">
                        <a href="#">Mensaje a Estudiantes</a>
                    </div>
                </div>
        </div>
    </div>   
</div>
