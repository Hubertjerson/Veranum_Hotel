<?php

class ControladorCategorias
{
    /* MOSTRAR CATEGORIAS */

    static public function ctrMostrarCategorias($item, $valor)
    {
        $tabla = "categorias";
        $respuesta = ModeloCategorias::mdlMostrarCategorias($tabla, $item, $valor);
        return $respuesta;
    }

    /* REGISTRAR CATEGORIA */
    public static function ctrRegistroCategoria() {
        if (isset($_POST["rutaCategoria"]) && isset($_POST["tipoCategoria"]) && isset($_POST["descripcionCategoria"]) && isset($_POST["serviciosExtra"]) && isset($_POST["precio"])) {

            // Procesar imagen
            $ruta = "";
            if (isset($_FILES["subirImgCategoria"]["tmp_name"]) && !empty($_FILES["subirImgCategoria"]["tmp_name"])) {
                $directorio = "vistas/img/categorias";
                if (!is_dir($directorio)) {
                    mkdir($directorio, 0755, true);
                }
                $aleatorio = mt_rand(100, 999);
                $ruta = $directorio . "/" . $aleatorio . ".jpg";

                if (!move_uploaded_file($_FILES["subirImgCategoria"]["tmp_name"], $ruta)) {
                    echo "Error al subir la imagen.";
                    return;
                }
            }

            // Procesar servicios extra
            $serviciosExtra = "";
            if (isset($_POST["serviciosExtra"])) {
                $serviciosExtra = implode(",", $_POST["serviciosExtra"]);
            }

            $tabla = "categorias";
            $datos = array(
                "ruta" => $_POST["rutaCategoria"],
                "tipo" => $_POST["tipoCategoria"],
                "img" => $ruta,
                "descripcion" => $_POST["descripcionCategoria"],
                "servicios_extra" => $serviciosExtra,
                "precio" => $_POST["precio"]
            );

            $respuesta = ModeloCategorias::mdlRegistroCategoria($tabla, $datos);

            if ($respuesta == "ok") {
                echo "Categoría guardada correctamente.";
            } else {
                echo "Error al guardar la categoría.";
            }
        }
    }
}
