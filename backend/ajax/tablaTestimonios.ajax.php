<?php

require_once "../controladores/testimonios.controlador.php";
require_once "../modelos/testimonios.modelo.php";

class TablaTestimonios
{

	/*=============================================
	Tabla Testimonios
	=============================================*/

	public function mostrarTabla()
	{

		$testimonios = ControladorTestimonios::ctrMostrarTestimonios(null, null);

		if (count($testimonios) == 0) {

			$datosJson = '{"data": []}';

			echo $datosJson;

			return;
		}

		$datosJson = '{

	 	"data": [ ';

		 foreach ($testimonios as $key => $value) {

			// Obtener los datos de reserva del usuario
			$reservaUsuario = ControladorTestimonios::ctrMostrarTestimoniosInnerJoin("id_testimonio", $value["id_testimonio"]);
		
			// Verificar si $reservaUsuario contiene datos válidos
			if ($reservaUsuario) {
				$codigoReserva = $reservaUsuario["codigo_reserva"];
				$nombreUsuario = $reservaUsuario["nombre"];
				$descripcionReserva = $reservaUsuario["descripcion_reserva"];
			} else {
				// En caso de que no haya datos válidos, asignar valores por defecto
				$codigoReserva = "No disponible";
				$nombreUsuario = "Usuario no encontrado";
				$descripcionReserva = "Reserva no encontrada";
			}
		
			/*=============================================
			ESTADO
			=============================================*/
		
			if ($value["aprobado"] == 1) {
				$estado = "<button class='btn btn-dark btn-sm btnAprobar' estadoTestimonio='1' idTestimonio='" . $value["id_testimonio"] . "'>Aprobar</button>";
			} else {
				$estado = "<button class='btn btn-info btn-sm btnAprobar' estadoTestimonio='0' idTestimonio='" . $value["id_testimonio"] . "'>Aprobado</button>";
			}
		
			// Construir la fila de datos para DataTables
			$datosJson .= '[
				"' . ($key + 1) . '",
				"' . $codigoReserva . '",
				"' . $nombreUsuario . '",
				"' . $descripcionReserva . '",
				"' . $value["testimonio"] . '",
				"' . $estado . '",
				"' . $value["fecha"] . '"
			],';
		}
		

		$datosJson = substr($datosJson, 0, -1);

		$datosJson .=  ']

		}';

		echo $datosJson;
	}
}

/*=============================================
Tabla Testimonios
=============================================*/

$tabla = new TablaTestimonios();
$tabla->mostrarTabla();
