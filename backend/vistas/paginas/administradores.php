


<div class="content-wrapper" style="min-height: 1148.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">

        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">

                    <h1>Administradores</h1>

                </div>

                <div class="col-sm-6">

                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>

                        <li class="breadcrumb-item active">Administradores</li>

                    </ol>

                </div>

            </div>

        </div><!-- /.container-fluid -->

    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card card-info card-outline">

            <div class="card-header">
                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#crearAdministrador">Crear nuevo Administrador</button>
            </div>

            <div class="card-body">

                <table class="table table-bordered table-striped dt-responsive tablaAdministradores" width="100%">
                    <thead>
                        <tr>
                            <th style="width:10px;">#</th>
                            <th>Nombre</th>
                            <th>Usuario</th>
                            <th>Perfil</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        <!-- Los datos se cargarán dinámicamente con DataTables -->
                    </tbody>
                </table>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                Footer
            </div>
            <!-- /.card-footer-->

        </div>
        <!-- /.card -->
    </section>

    <!-- /.content -->
</div>



<!-- MODAL CREAR ADMINISTRADOR -->
<div class="modal" id="crearAdministrador">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post">
                <div class="modal-header bg-info">
                    <h4 class="modal-title">Crear Administrador</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <div class="input-group-append input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                        <input type="text" class="form-control" name="registroNombre" placeholder="Ingrese su nombre" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-append input-group-text">
                            <span class="fas fa-user-lock"></span>
                        </div>
                        <input type="text" class="form-control" name="registroUsuario" placeholder="Ingrese el usuario" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-append input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                        <input type="password" class="form-control" name="registroPassword" placeholder="Ingrese la contraseña" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-append input-group-text">
                            <span class="fas fa-key"></span>
                        </div>
                        <select class="form-control" name="registroPerfil" required>
                            <option value="">Seleccione perfil</option>
                            <option value="Administrador">Administrador</option>
                            <option value="Editor">Editor</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <div>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
                <?php
                $regristroAdministrador = new ControladorAdministradores();
                $regristroAdministrador->ctrRegistroAdministrador();
                ?>
            </form>
        </div>
    </div>
</div>



<!-- EDITAR ADMINISTRADOR -->

<div class="modal" id="editarAdministrador">

    <div class="modal-dialog">

        <div class="modal-content">

            <form method="post">

                <div class="modal-header bg-info">
                    <h4 class="modal-title">Editar Administrador</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <input type="hidden" name="editarId">
                    <div class="input-group mb-3">
                        <div class="input-group-append input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                        <input type="text" class="form-control" name="editarNombre" required>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-append input-group-text">
                            <span class="fas fa-user-lock"></span>
                        </div>
                        <input type="text" class="form-control" name="editarUsuario" required>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-append input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                        <input type="password" class="form-control" name="editarPassword">
                        <input type="hidden" name="passwordActual">
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-append input-group-text">
                            <span class="fas fa-key"></span>
                        </div>
                        <select class="form-control" name="editarPerfil" required>
                            <option class="editarPerfilOption"></option>
                            <option value="">Seleccione perfil</option>
                            <option value="Administrador">Administrador</option>
                            <option value="Editor">Editor</option>
                        </select>
                    </div>

                </div>

                <div class="modal-footer d-flex justify-content-between">
                    <div>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
                <?php
                $editarAdministrador = new ControladorAdministradores();
                $editarAdministrador->ctrEditarAdministrador();
                ?>
            </form>
        </div>
    </div>
</div>