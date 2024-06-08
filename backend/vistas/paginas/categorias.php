<div class="content-wrapper" style="min-height: 1148.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">

        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">

                    <h1>Categorias</h1>

                </div>

                <div class="col-sm-6">

                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>

                        <li class="breadcrumb-item active">Categorias</li>

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

                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#crearCategoria">Crear nuevo Administrador</button>
            </div>


            <div class="card-body">

                <table class="table table-bordered table-striped dt-responsive tablaCategorias" width="100%">
                    <thead>
                        <tr>
                            <th style="width:10px;">#</th>
                            <th>Ruta</th>
                            <th>tipo</th>
                            <th>img</th>
                            <th>descripcion</th>
                            <th>Servicios Extra</th>
                            <th>Precio</th>
                            <th style="width:100px">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        <!-- Los datos se cargarán dinámicamente con DataTables -->
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">

            </div>
            <!-- /.card-footer-->

        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>




<!--=====================================
Modal Crear Categorías
======================================-->


<div class="modal" id="crearCategoria">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" enctype="multipart/form-data">
                <!-- Modal Header -->
                <div class="modal-header bg-info">
                    <h4 class="modal-title">Crear Categoría</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <div class="input-group-append input-group-text">
                            <span class="fas fa-list-ul"></span>
                        </div>
                        <input type="text" class="form-control" name="rutaCategoria" placeholder="Ingresa la ruta de la categoría" required>
                    </div>
                    <div class="input-group mb-4">
                        <div class="input-group-append input-group-text">
                            <span class="fas fa-certificate"></span>
                        </div>
                        <input type="text" class="form-control" name="tipoCategoria" placeholder="Ingresa el tipo de categoría" required>
                    </div>
                    <hr class="pb-2">
                    <div class="form-group my-2">
                        <div class="btn btn-default btn-file">
                            <i class="fas fa-paperclip"></i> Adjuntar Imagen de la Categoría
                            <input type="file" name="subirImgCategoria">
                        </div>
                        <img class="previsualizarImgCategoria img-fluid py-2">
                        <p class="help-block small">Dimensiones: 359px * 254px | Peso Max. 2MB | Formato: JPG o PNG</p>
                    </div>

                    <hr class="pb-2">

                    <p>Características de la Categoría:</p>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="checkbox" type="checkbox" class="ml-3" name="servicios_extra[]" value='{"item": "Cama 2 x 2", "icono": "fas fa-bed"}'>
                            <span class="badge badge-secondary"><i class="fas fa-bed"></i> Cama 2 x 2 </span>
                        </label>
                    </div>
                    <!-- Otras características -->
                    <!-- ... -->
                    <hr class="pb-2">
                </div>
                <!-- Modal footer -->
                <div class="modal-footer d-flex justify-content-between">
                    <div>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary" id="guardarCategoria">Guardar</button>
                    </div>
                </div>
                <!-- Procesamiento PHP -->
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    try {
                        $rutaCategoria = $_POST["rutaCategoria"];
                        $tipoCategoria = $_POST["tipoCategoria"];
                        $descripcionCategoria = $_POST["descripcionCategoria"];
                        $precio = $_POST["precio"];

                        // Procesar los servicios extra de la categoría
                        $servicios_extra = isset($_POST["servicios_extra"]) ? $_POST["servicios_extra"] : [];
                        $servicios_extra_json = json_encode($servicios_extra);

                        // Guardar en la base de datos
                        $conn = new PDO("mysql:host=localhost;dbname=veranum",
						"root",
						"");
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        // Consulta para insertar los datos
                        $stmt = $conn->prepare("INSERT INTO categorias (ruta, tipo, descripcion, servicios_extra, precio) VALUES (:ruta, :tipo, :descripcion, :servicios_extra, :precio)");
                        $stmt->bindParam(':ruta', $rutaCategoria);
                        $stmt->bindParam(':tipo', $tipoCategoria);
                        $stmt->bindParam(':descripcion', $descripcionCategoria);
                        $stmt->bindParam(':servicios_extra', $servicios_extra_json);
                        $stmt->bindParam(':precio', $precio);

                        // Ejecutar la consulta
                        if ($stmt->execute()) {
                            echo '<script>alert("La categoría se ha guardado correctamente.");</script>';
                        } else {
                            echo '<script>alert("Error al guardar la categoría.");</script>';
                        }
                    } catch (PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }
                }
                ?>
                <script>
                $(document).ready(function() {
                    // Procesar el formulario al hacer clic en Guardar
                    $("#guardarCategoria").click(function() {
                        try {
                            var caracteristicas = [];
                            $("input[type='checkbox']:checked").each(function() {
                                var item = $(this).val();
                                var icono = $(this).data('icono'); // Obtener el valor del atributo data-icono
                                caracteristicas.push({ "item": item, "icono": icono });
                            });
                            var caracteristicasJSON = JSON.stringify(caracteristicas); // Convertir a JSON
                            $("input[name='caracteristicasCategoria']").val(caracteristicasJSON);

                            // Una vez que se han recogido las características, enviar el formulario
                            $("form").submit();
                        } catch (error) {
                            console.log("Error al procesar el formulario:", error);
                        }
                    });
                });
                </script>
            </form>
        </div>
    </div>
</div>