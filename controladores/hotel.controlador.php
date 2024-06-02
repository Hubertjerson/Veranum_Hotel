<?php

Class ControladorHotel{

	/*=============================================
	Mostrar Categorias
	=============================================*/

	static public function ctrMostrarHotel(){

		$tabla = "hotel";

		$respuesta = ModeloHotel::mdlMostrarHotel($tabla);

		return $respuesta;

	}

}