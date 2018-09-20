<?php require RUTA_APP.'\views\inc\header-supervisor.inc'; ?>
    <?php require RUTA_APP.'\views\inc\menu-supervisor.inc'; ?>
    <div class="container">
        <div class="col s12"> 
            <h2>Hola, Asesor {{nombre_asesor}}</h2>
            <div class="divider"></div>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cumque deserunt cupiditate impedit libero iusto eligendi at sed, eius numquam ipsum beatae dignissimos laudantium quibusdam quas enim esse a nobis fuga?</p>
            <br>
            <h3><i>Proximas sesiones</i></h3>
            <div class="divider"></div>
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
                        </div>
                </div>
            </div>  
      </div>

    </div>
    
<?php require RUTA_APP.'/views/inc/footer-supervisor.inc'; ?>