<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/ruta.controlador.php";

require_once "controladores/administrador.controlador.php";
require_once "modelos/administradores.modelo.php";

require_once "controladores/banner.controlador.php";
require_once "modelos/banner.modelo.php";

require_once "controladores/categorias.controlador.php";
require_once "modelos/categorias.modelo.php";

$plantilla = new ControladorPlantilla();
$plantilla->ctrPlantilla();