<?php 
if(!isset($_SESSION['id']) || !isset($_SESSION['supervisor']) || $_SESSION['supervisor'] != 1){
    session_destroy();
    redireccionar('/Pages/ingresar');
}
require RUTA_APP.'\views\inc\header-supervisor.inc';
require RUTA_APP.'\views\inc\menu-supervisor.inc'; ?>
    <div class="container">
        <div class="row">
            <div class="col s8"><h2>Tu Perfil, <b><?= $_SESSION['name'] ?></b></h2></div>
            <div class="col s4">
                <br>
                <br>
                <br>
                <div class="center-align">
                    <a class="btn light-green" href="<?= RUTA_URL?>/supervisor/edit_profile">Actualiza tu perfil</a>
                </div></div>
        </div>
        <div class="row">
            <div class="col s12">
                <table class="table responsive-table">
                    <tbody>
                        <tr>
                            <td>
                                <strong>Nombre</strong>
                            </td>
                            <td>
                                    <?= $data->name_person ." ".$data->last_name_person ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Edad</strong>
                            </td>
                            <td><?= $data->age ?></td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Correo electrónico</strong>
                            </td>
                            <td><?= $data->email_person  ?></td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Celular</strong>
                            </td>
                            <td><?= $data->celphone_person  ?></td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Identificación</strong>
                            </td>
                            <td><?= $data->identification_person  ?></td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Dirección</strong>
                            </td>
                            <td><?=$data->address_person  ?></td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Fecha de nacimiento</strong>
                            </td>
                            <td><?=$data->birth_date_person  ?></td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Año de incorporación</strong>
                            </td>
                            <td><?= date('Y',strtotime($data->admission_date_person))  ?></td>
                        </tr>
                    </tbody>
                </table>
                <div class="right-align">
                    <a class="update-password-link" href="<?= RUTA_URL?>/supervisor/update_password">Modificar contraseña</a>
                </div>
                <br>
                <br>
            </div>
        </div>
    </div>

    <?php require RUTA_APP.'/views/inc/footer-supervisor.inc'; ?>
    