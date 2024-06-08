<?php

require_once "conexion.php";

class ModeloHabitaciones{

	/*=============================================
	MOSTRAR CATEGORIAS-HABITACIONES CON INNER JOIN
	=============================================*/

	static public function mdlMostrarHabitaciones($tabla1, $tabla2, $valor){

		if($valor != null){

			$stmt = Conexion::conectar()->prepare("SELECT $tabla1.*, $tabla2.* FROM $tabla1 INNER JOIN $tabla2 ON $tabla1.id = $tabla2.tipo_h WHERE id_h = :id_h");

			$stmt -> bindParam(":id_h", $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT $tabla1.*, $tabla2.* FROM $tabla1 INNER JOIN $tabla2 ON $tabla1.id = $tabla2.tipo_h ORDER BY $tabla2.id_h DESC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
	}
}