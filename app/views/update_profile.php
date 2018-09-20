<h3>Actualiza tu información, {{nom_person}}</h3>
            <p>Es importante que mantengas actualizada tu información para que asi los docentes puedan realizar inscripciones a eventos correctamente.</p>
            <form class="col s12" action="" method="POST">
                <div class="row">
                    <div class="input-field col s6">
                        <input name="txt_name" id="txt_name" type="text" class="validate" required>
                        <label for="txt_name">Nombre</label>
                    </div>
                    <div class="input-field col s6">
                        <input name="txt_last_name" id="txt_last_name" type="text" class="validate" required>
                        <label for="txt_last_name">Apellido</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input name="txt_email" id="txt_email" type="email" class="validate" required>
                        <label for="txt_email">Correo electrónico</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input name="txt_identification" id="txt_identification" type="number" class="validate" required>
                        <label for="txt_identification">Identificación</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input name="txt_address" id="txt_address" type="text" class="validate" required>
                        <label for="txt_address">Dirección</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s6">
                    <button class="btn light-green" type="submit">Actualizar</button>
                    </div>
                    <div class="col s6">
                        <a class="btn blue" href="">Volver</a>
                    </div>
                </div>
            </form>