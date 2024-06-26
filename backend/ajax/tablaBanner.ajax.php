<?php

require_once "../controladores/banner.controlador.php";
require_once "../modelos/banner.modelo.php";

class TablaBanner
{
    public function mostrarTabla()
    {
        $banner = ControladorBanner::ctrMostrarBanner(null, null);

        if (count($banner) == 0) {
            $datosJson = '{"data": []}';
            echo $datosJson;
            return;
        }

        $datosJson = '{"data": [ ';

        foreach ($banner as $key => $value) {
            $imagen = "<img src='" . $value["img"] . "' class='img-fluid'>";
            $acciones = "<div class='btn-group'><button class='btn btn-warning btn-sm editarBanner' data-toggle='modal' data-target='#editarBanner' idBanner='" . $value["id"] . "'><i class='fas fa-pencil-alt text-white'></i></button><button class='btn btn-danger btn-sm eliminarBanner' idBanner='" . $value["id"] . "' rutaBanner='" . $value["img"] . "'><i class='fas fa-trash-alt'></i></button></div>";

            $datosJson .= '[
                "' . ($key + 1) . '",
                "' . $imagen . '",
                "' . $acciones . '"
            ],';
        }

        $datosJson = substr($datosJson, 0, -1);
        $datosJson .= ']}';

        echo $datosJson;
    }
}

$tabla = new TablaBanner();
$tabla->mostrarTabla();
