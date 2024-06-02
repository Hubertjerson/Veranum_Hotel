<?php

class ControladorBanner
{
    static public function ctrMostrarBanner($item, $valor)
    {
        $tabla = "banner";
        $respuesta = ModeloBanner::mdlMostrarBanner($tabla, $item, $valor);
        return $respuesta;
    }
}