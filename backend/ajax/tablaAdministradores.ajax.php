<?php
require_once "../controladores/administrador.controlador.php";
require_once "../modelos/administradores.modelo.php";

class TablaAdmin {
    public function mostrarTabla() {
        $respuesta = ControladorAdministradores::ctrMostrarAdministradores(null, null);
        if (count($respuesta) == 0) {
            $datosJson = '{"data":[]}';
            echo $datosJson;
            return;
        }
        $datosJson = '{"data": [';
        foreach ($respuesta as $key => $value) {
            $estado = ($value["estado"] == 0) ? "<button class='btn btn-dark btn-sm btnActivar' estadoAdmin='1' idAdministrador='".$value["id"]."'>Desactivado</button>" : "<button class='btn btn-info btn-sm btnActivar' estadoAdmin='0' idAdministrador='".$value["id"]."'>Activado</button>";

            $botones = "<button class='btn btn-warning btn-sm editarAdministrador' data-toggle='modal' data-target='#editarAdministrador' idAdministrador='".$value["id"]."'><i class='fas fa-pencil-alt text-white'></i></button><button class='btn btn-danger btn-sm eliminarAdministrador' idAdministrador='".$value["id"]."'><i class='fas fa-trash-alt'></i></button>";

            $datosJson .= '[
                "'.($key+1).'",
                "'.$value["nombre"].'",
                "'.$value["usuario"].'",
                "'.$value["perfil"].'",
                "'.$estado.'",
                "'.$botones.'"
            ],';
        }
        $datosJson = substr($datosJson, 0, -1);
        $datosJson .= ']}';
        echo $datosJson;
    }
}

$tabla = new TablaAdmin();
$tabla->mostrarTabla();


