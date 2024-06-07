<?php

class ControladorBanner
{
	static public function ctrMostrarBanner($item, $valor)
	{
		$tabla = "banner";
		$respuesta = ModeloBanner::mdlMostrarBanner($tabla, $item, $valor);
		return $respuesta;
	}


	/* REGISTRO DE BANNER */

	public static function ctrRegistroBanner()
	{
		if (isset($_FILES["subirBanner"]["tmp_name"]) && !empty($_FILES["subirBanner"]["tmp_name"])) {
			$directorio = "vistas/img/banner";
			if (!is_dir($directorio)) {
				mkdir($directorio, 0755, true);
			}

			$aleatorio = mt_rand(100, 999);
			$ruta = $directorio . "/" . $aleatorio . ".jpg";

			if (move_uploaded_file($_FILES["subirBanner"]["tmp_name"], $ruta)) {
				echo "Imagen subida correctamente a $ruta";

				// Llamada al modelo para guardar la ruta en la base de datos
				$tabla = "banner";
				$respuesta = ModeloBanner::mdlRegistroBanner($tabla, $ruta);

				if ($respuesta == "ok") {
					echo '<script>
					swal({
						type:"success",
					  	title: "¡CORRECTO!",
					  	text: "¡La imagen del banner ha sido creada exitosamente!",
					  	showConfirmButton: true,
						confirmButtonText: "Cerrar"
					  
					})</script>';
				} else {
					echo '<script>
					swal({
						type:"error",
					  	title: "¡CORREGIR!",
					  	text: "Error al guardar la ruta de la imagen en la base de datos.",
					  	showConfirmButton: true,
						confirmButtonText: "Cerrar"
					  
					})</script>';
				}
			} else {
				echo "Error al subir la imagen.";
			}
		}
	}
	/* EDITAR BANNER */

	public static function ctrEditarBanner()
	{
		if (isset($_POST["idBanner"]) && isset($_FILES["editarBanner"]["tmp_name"])) {
			$directorio = "vistas/img/banner";
			if (!is_dir($directorio)) {
				mkdir($directorio, 0755, true);
			}

			$aleatorio = mt_rand(100, 999);
			$ruta = $directorio . "/" . $aleatorio . ".jpg";

			if (move_uploaded_file($_FILES["editarBanner"]["tmp_name"], $ruta)) {
				$tabla = "banner";
				$id = $_POST["idBanner"];

				// Eliminar la imagen anterior
				if ($_POST["bannerActual"] && $_POST["bannerActual"] != "") {
					unlink($_POST["bannerActual"]);
				}

				$respuesta = ModeloBanner::mdlEditarBanner($tabla, $id, $ruta);

				if ($respuesta == "ok") {
					echo "Ruta de la imagen actualizada en la base de datos.";
				} else {
					echo "Error al actualizar la ruta de la imagen en la base de datos.";
				}
			} else {
				echo "Error al subir la imagen.";
			}
		}
	}

	/*=============================================
	Eliminar Banner
	=============================================*/

	static public function ctrEliminarBanner($id, $ruta)
	{

		unlink("../" . $ruta);

		$tabla = "banner";

		$respuesta = ModeloBanner::mdlEliminarBanner($tabla, $id);

		return $respuesta;
	}
}
