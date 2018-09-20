    <nav>
        <div class="nav-wrapper">
            <div class="container">
                <a href="<?= RUTA_URL ?>/" class="brand-logo">SideFlip</a>
                <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="<?= RUTA_URL ?>/teacher/start">Inicio</a></li>
                    <li><a href="<?= RUTA_URL ?>/teacher/see_profile">Ver Perfil</a></li>
                    <li><a href="<?= RUTA_URL ?>/teacher/lessons">Clases</a></li>
                    <li><a href="<?= RUTA_URL ?>/">Cerrar sesión</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <ul class="sidenav" id="mobile-demo">
        <li><a href="<?= RUTA_URL ?>/teacher/start">Inicio</a></li>
        <li><a href="<?= RUTA_URL ?>/teacher/see_profile">Ver Perfil</a></li>
        <li><a href="<?= RUTA_URL ?>/teacher/lessons">Clases</a></li>
        <li><a href="<?= RUTA_URL ?>/">Cerrar sesión</a></li>
    </ul>