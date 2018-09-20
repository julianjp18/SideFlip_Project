<?php require RUTA_APP.'/views/inc/header.inc'; ?>
    <?php require RUTA_APP.'/views/inc/menu_teacher.inc'; ?>
    <div class="container">
        <div class="row">
            <div class="col s8"><h2>Tu Perfil, {{ nom_teacher}}</h2></div>
            <div class="col s4">
                <br>
                <br>
                <br>
                <div class="center-align">
                    <a class="btn light-green" href="<?= RUTA_URL?>/teacher/edit_profile">Actualiza tu perfil</a>
                </div></div>
        </div>
        <div class="row">
            <div class="col s12">
                <table class="table">
                    <tbody>
                        <tr>
                            <td>
                                <strong>Nombre</strong>
                            </td>
                            <td>
                                    {{nombre_docente apellido_docente}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Edad</strong>
                            </td>
                            <td>{{edad_docente}}</td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Correo electrónico</strong>
                            </td>
                            <td>{{correo_docente}}</td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Tipo identificación</strong>
                            </td>
                            <td>{{t_identificacion_docente}}</td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Identificación</strong>
                            </td>
                            <td>{{identificacion_docente}}</td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Dirección</strong>
                            </td>
                            <td>{{direccion_docente}}</td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Categorias inscritas</strong>
                            </td>
                            <td>{{cat_inscritas_docente}}</td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Ritmos inscritos</strong>
                            </td>
                            <td>{{rit_inscritos_docente}}</td>
                        </tr>
                        <tr>
                            <td>
                                <strong>Año de incorporación</strong>
                            </td>
                            <td>{{año_ingreso_docente}}</td>
                        </tr>
                    </tbody>
                </table>
                <div class="right-align">
                    <a class="update-password-link" href="<?= RUTA_URL?>/teacher/update_password">Modificar contraseña</a>
                </div>
                <br>
                <br>
            </div>
        </div>
    </div>

    <?php require RUTA_APP.'/views/inc/footer-supervisor.inc'; ?>
    