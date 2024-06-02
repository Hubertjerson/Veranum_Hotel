<nav class="main-header navbar navbar-expand navbar-white navbar-light border-bottom">
    <!--BOTON DE COLAPSA EL MENU LATERAL--->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="../../index3.html" class="nav-link">Hola <?php  echo $admin["nombre"]; ?></a>

        </li>
    </ul>

    <!--NOTIFICACIONES--->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" aria-expanded="false">
                <i class="far fa-bell"></i>
                <span class="badge badge-danger navbar-badge">5</span>
            </a>

            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">Notificaciones</span>
                <div class="dropdown-divider"></div>
                <a href="index.php?pagina=reservas&not=0" class="dropdown-item">
                    <i class="far fa-calendar-alt mr-2 float-right"></i>
                    <span class="badge badge-info">Reservas nuevas</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="index.php?pagina=reservas&not=0" class="dropdown-item">
                    <i class="far fa-user-check mr-2 float-right"></i>
                    <span class="badge badge-info">Testimonios nuevos</span>
                </a>
            </div>
        </li>
        <!--SALIR--->
        <li class="nav-item">
            <a href="salir" class="nav-link">
                <i class="fas fa-sign-out-alt"></i>
            </a>

        </li>
    </ul>

</nav>