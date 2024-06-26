<div class="content-wrapper" style="min-height: 1148.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">

        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">

                    <h1>Habitaciones</h1>

                </div>

                <div class="col-sm-6">

                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>

                        <li class="breadcrumb-item active">Habitaciones</li>

                    </ol>

                </div>

            </div>

        </div><!-- /.container-fluid -->

    </section>

    <!-- Main content -->
    <section class="content">

        <div class="container-fluid">

            <div class="row">

                <!-- LISTADO DE HABITACIONES -->

                <div class="col-12 col-xl-5">

                    <div class="card card-primary card-outline">
                        <!-- header-card -->
                        <div class="card-header pl-2 pl-sm-3">

                            <a href="habitaciones" class="btn btn-primary btn-sm">Crear nueva Habitacion</a>


                            <div class="card-tools">

                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>

                            </div>

                        </div>

                        <!--CARD BODY-->
                        <div class="card-body">
                            <table class="table table-bordered table-striped dt-responsive tablaHabitaciones" width="100%">

                                <thead>

                                    <tr>

                                        <th style="width:10px">#</th>
                                        <th>Categoria</th>
                                        <th>Habitacion</th>
                                        <th style="width:100px">Acciones</th>

                                    </tr>

                                </thead>

                                <tbody>
                                    <!--<tr>

                                    <td>1</td>
                                    <td>Suite</td>
                                    <td>Oriental</td>
                                    <td>
                                        <button class="btn btn-secondary btn-sm">
                                            <i class="far fa-eye"></i></button>
                                    </td>

                                </tr>-->

                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>

                <!--EDITAR HABITACIONES--->


                <?php

                if (isset($_GET["id_h"])) {

                    $habitacion = ControladorHabitaciones::ctrMostrarhabitaciones($_GET["id_h"]);
                } else {

                    $habitacion = null;
                }


                ?>


                <div class="col-12 col-xl-7">

                    <div class="card card-primary card-outline">
                        <!--HEADER HABITACIONES--->
                        <div class="card-header">

                            <h5 class="card-title"><?php echo ($habitacion != null) ? $habitacion["tipo"] : '' ?> / <?php echo ($habitacion != null) ? $habitacion["estilo"] : ''; ?></h5>
                            <div class="card-tools">

                                <button type="button" class="btn btn-info guardarHabitacion">
                                    <i class="fas fa-save"></i>
                                </button>

                                <button type="button" class="btn btn-danger eliminarHabitacion">
                                    <i class="fas fa-trash"></i>
                                </button>

                            </div>
                        </div>

                        <!--BODY HABITACIONES--->

                        <div class="card-body">

                            <!--Categoria y nombre de habitaciones--->

                            <div class="d-flex flex-column flex-md-row justify-content-start mb-3">

                                <div class="form-inline mx-3 px-3 border border-left-0 border-top-0 border-bottom-0">

                                    <p class="mr-sm-2">Elije la Categoria:</p>

                                    <?php

                                    if ($habitacion != null) {

                                        echo '<select class="form-control seleccionarTipo" readonly>

                                        <option value="' . $habitacion["id"] . ',' . $habitacion["tipo"] . '">' . $habitacion["tipo"] . '</option>

                                        </select>';
                                    } else {

                                        echo '<select class="form-control seleccionarTipo">

                                        <option value="">Seleccione</option>';

                                        $categorias = ControladorCategorias::ctrMostrarCategorias(null, null);

                                        foreach ($categorias as $key => $value) {

                                            echo '<option value="' . $value["id"] . ',' . $value["tipo"] . '">' . $value["tipo"] . '</option>';
                                        }

                                        echo '</select>';
                                    }

                                    ?>

                                </div>

                                <div class="form-inline">

                                    <p class="mr-sm-2">Escribir el nombre de la habitacion:</p>

                                    <?php

                                    if ($habitacion != null) {

                                        echo '<input type="text" class="form-control seleccionarEstilo" value="' . $habitacion["estilo"] . '" readonly>';
                                    } else {

                                        echo '<input type="text" class="form-control seleccionarEstilo">';
                                    }

                                    ?>

                                </div>

                            </div>

                            <!--Galeria--->

                            <div class="card rounded-lg card-secondary card-outline">

                                <div class="card-header pl-2 pl-sm-3">

                                    <h5>Galeria:</h5>

                                </div>

                                <div class="card-body">

                                    <ul class="row p-0 vistaGaleria">

                                        <?php

                                        if ($habitacion != null) {

                                            $galeria = json_decode($habitacion["galeria"], true);

                                            foreach ($galeria as $key => $value) {

                                                echo '<li class="col-12 col-md-6 col-lg-3 card px-3 rounded-0 shadow-none">
  
                                                        <img class="card-img-top" src="' . $value . '">

                                                            <div class="card-img-overlay p-0 pr-3">
              
                                                                <button class="btn btn-danger btn-sm float-right shadow-sm quitarFotoAntigua" temporal="' . $value . '">
                 
                                                                <i class="fas fa-times"></i>

                                                                </button>

                                                            </div>

                                                    </li>';
                                            }
                                        }

                                        ?>

                                    </ul>


                                </div>
                                <!--FOOTER--->

                                <div class="card-footer">

                                    <input type="file" multiple id="galeria" class="d-none">

                                    <label for="galeria" class="text-dark text-center py-5 border rounded bg-white w-100 subirGaleria">
                                        Has click Aqui o arrastra las imagenes <br>

                                        <span class="hel-block small">Dimensiones: 940px * 480px | Peso Max. 2MB | Formato: JPG o PNG</span>
                                    </label>



                                </div>


                            </div>

                            <!-- Vídeo y 360°-->

                            <div class="row">

                                <div class="col-12 col-xl-6">

                                    <div class="card rounded-lg card-secondary card-outline">

                                        <div class="card-header pl-2 pl-sm-3">

                                            <h5>Recorrido virtual:</h5>

                                        </div>

                                        <div class="card-body ver360">

                                            <?php if ($habitacion != null) : ?>

                                                <div class="pano 360Antiguo" back="<?php echo $habitacion["recorrido_virtual"]; ?>">

                                                    <div class="controls">
                                                        <a href="#" class="left">&laquo;</a>
                                                        <a href="#" class="right">&raquo;</a>
                                                    </div>

                                                </div>

                                            <?php endif ?>

                                        </div>

                                        <div class="card-footer">

                                            <input type="hidden" class="antiguoRecorrido" value="<?php echo $habitacion["recorrido_virtual"]; ?>">

                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="imagen360">
                                                <label class="custom-file-label" for="imagen360">Agregar imagen 360°</label>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="card rounded-lg card-secondary card-outline">

                                <div class="card-header pl-2 pl-sm-3">

                                    <h5>Descripción:</h5>

                                </div>

                                <div class="card-body">

                                    <textarea id="descripcionHabitacion" style="width: 100%">

                                    <?php

                                    if ($habitacion != null) {

                                        echo $habitacion["descripcion_h"];
                                    }

                                    ?>

                                    </textarea>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>


    </section>
    <!-- /.content -->
</div>