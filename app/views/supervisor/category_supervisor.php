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
                <h2>Gestión Categorias</h2>
                <hr>
                <div class="right-align">
                    <a class="btn light-green modal-trigger" href="#modal01">Agregar categoria</a>
                </div>
                <!-- Modal Structure -->
                <div id="modal01" class="modal">
                    <div class="modal-content">
                        <h4>Agregar Categoria</h4>
                        <form action="<?= RUTA_URL ?>/supervisor/add_category" method="POST">
                            <div class="input-field col s12">
                                <input name="txt_name" id="txt_name" type="text" class="validate" required>
                                <label for="txt_name">Nombre Categoria</label>
                            </div>
                            <div class="input-field col s12">
                                <textarea name="textarea_msj" id="textarea_msj" class="materialize-textarea" required></textarea>
                                <label for="textarea_msj">Descripción</label>
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
                <table id="example" class="bordered responsive-table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Acción</th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php 
                   
                    if (is_array($data) || is_object($data)){
                        foreach ($data as $key) {
                    ?>
                            <tr>
                                <td><?= $key->name_category ?></td><td><?= $key->description_category ?></td>
                                <td>
                                    <a class="btn red accent-3 btn-delete" href="<?= RUTA_URL ?>/supervisor/delete_category/id/<?= $key->id_category ?>"><i class="material-icons">delete_forever</i></a>
                                    <a class="btn amber darken-3 btn-update modal-trigger" href="#modal_update<?= $key->id_category ?>"><i class="material-icons">mode_edit</i></a>
                                </td>
                            </tr>
                            <!-- Modal Structure -->
                            <div id="modal_update<?= $key->id_category ?>" class="modal">
                                <div class="modal-content">
                                    <h4>Modificar Categoria <b><?= $key->name_category ?></b></h4>
                                    <form action="<?= RUTA_URL ?>/supervisor/update_category/id/<?= $key->id_category ?>" method="POST">
                                        <div class="input-field col s12">
                                            <input name="txt_name" id="txt_name" type="text" class="validate" value="<?= $key->name_category ?>" required>
                                            <label for="txt_name">Nombre Categoria</label>
                                        </div>
                                        <div class="input-field col s12">
                                            <textarea name="textarea_msj" id="textarea_msj" class="materialize-textarea" required><?= $key->description_category ?></textarea>
                                            <label for="textarea_msj">Descripción</label>
                                        </div>
                                        <br>
                                        <button class="btn" name="btn_enviar" id="btn_enviar" type="submit">Enviar</button>
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
                            <td colspan="3">No existen categorias por el momento</td>
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