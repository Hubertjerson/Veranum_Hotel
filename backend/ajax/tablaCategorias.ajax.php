<?php

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

class TablaCategorias {
    public function mostrarTabla() {
        $respuesta = ControladorCategorias::ctrMostrarCategorias(null, null);
        if (count($respuesta) == 0) {
            $datosJson = '{"data":[]}';
            echo $datosJson;
            return;
        }
        $datosJson = '{"data": [';
        foreach ($respuesta as $key => $value) {

            $imagen = "<img src='".$value["img"]."' class='img-fluid'>";

            $caracteristicas = "";

            $jsonIncluye = json_decode($value["servicios_extra"], true);

            foreach ($jsonIncluye as $indice => $valor) {

				$caracteristicas .= "<div class='badge badge-secondary mx-1'><i class='".$valor["icono"]."'></i> ".$valor["item"]."</div>";
			}


            $botones = "<button class='btn btn-warning btn-sm editarCategoria' data-toggle='modal' data-target='#editarCategoria' idCategoria='".$value["id"]."'><i class='fas fa-pencil-alt text-white'></i></button><button class='btn btn-danger btn-sm eliminarCategoria' idCategoria='".$value["id"]."'><i class='fas fa-trash-alt'></i></button>";

            $datosJson .= '[
                "'.($key+1).'",
				"'.$value["ruta"].'",
				"'.$value["tipo"].'",
				"'.$imagen.'",
				"'.$value["descripcion"].'",
				"'.$caracteristicas.'",
                "$ '.number_format($value["precio"]).'",
                "'.$botones.'"
            ],';
        }
        $datosJson = substr($datosJson, 0, -1);
        $datosJson .= ']}';
        echo $datosJson;
    }
}

$tabla = new TablaCategorias();
$tabla->mostrarTabla();


