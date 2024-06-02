<?php

require_once "conexion.php";

Class ModeloHotel{

	/*=============================================
	mostrar Categorias
	=============================================*/
	
	static public function mdlMostrarHotel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetchAll();

	}

}