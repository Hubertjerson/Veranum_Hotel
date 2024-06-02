<?php
require_once "../controladores/administrador.controlador.php";
require_once "../modelos/administradores.modelo.php";

class AjaxAdministradores {
    public $idAdministrador;

    public function ajaxMostrarAdministradores() {
        $item = "id";
        $valor = $this->idAdministrador;
        $respuesta = ControladorAdministradores::ctrMostrarAdministradores($item, $valor);

        echo json_encode($respuesta);
    }

    /* ACTIVA O DESACTIVA ADMIN */

    public $idAdmin;
    public $estadoAdmin;

    public function ajaxActivarAdministrador(){
        $tabla = "administradores";

        $item1 = "id";
        $valor1 = $this->idAdmin;

        $item2 = "estado";
        $valor2 = $this->estadoAdmin;

        $respuesta = ModeloAdministradores::mdlActualizarAdministrador($tabla, $item1, $valor1, $item2, $valor2);
        
        echo json_encode($respuesta);
    }

    public $idEliminar;
    public function ajaxEliminarAdministrador(){
        $respuesta = ControladorAdministradores::ctrEliminarAdministrador($this->idEliminar);
        echo $respuesta;
    }
}

if (isset($_POST["idAdministrador"])) {
    $editar = new AjaxAdministradores();
    $editar->idAdministrador = $_POST["idAdministrador"];
    $editar->ajaxMostrarAdministradores();
}

/* ACTIVA O DESACTIVA ADMIN*/

if (isset($_POST["estadoAdmin"])) {
    $activarAdmin = new AjaxAdministradores();
    $activarAdmin->idAdmin = $_POST["idAdmin"];
    $activarAdmin->estadoAdmin = $_POST["estadoAdmin"];
    $activarAdmin->ajaxActivarAdministrador();
}
/* ELIMINAR ADMIN */
if (isset($_POST["idEliminar"])) {
    $eliminarAdmin = new AjaxAdministradores();
    $eliminarAdmin->idEliminar = $_POST["idEliminar"];
    $eliminarAdmin->ajaxEliminarAdministrador();
}
