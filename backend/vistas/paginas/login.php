<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="<?php echo $ruta ?>">Hotel Veranum</a>
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Iniciar Sesión</p>
                <form method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="usuario" name="ingresoUsuario">
                        <div class="input-group-append input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="ingresoPassword">
                        <div class="input-group-append input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
                    <?php
                    $ingreso = new ControladorAdministradores();
                    $ingreso->ctrIngresoAdministradores();
                    ?>
                </form>
            </div>
        </div>
    </div>
</body>