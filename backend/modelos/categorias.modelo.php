<?php

require_once "conexion.php";

class ModeloCategorias
{
    static public function mdlMostrarCategorias($tabla, $item, $valor)
    {
        if ($item != null && $valor != null) {
            $stm = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stm->bindParam(":" . $item, $valor, PDO::PARAM_STR);
            $stm->execute();
            return $stm->fetch(); // Obtener una sola fila ya que estás buscando un usuario específico
        } else {
            $stm = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $stm->execute();
            return $stm->fetchAll();
        }
    }

    static public function mdlRegistroCategoria($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (ruta, tipo, img, descripcion, servicios_extra, precio) VALUES (:ruta, :tipo, :img, :descripcion, :servicios_extra, :precio)");

        $stmt->bindParam(":ruta", $datos["ruta"], PDO::PARAM_STR);
        $stmt->bindParam(":tipo", $datos["tipo"], PDO::PARAM_STR);
        $stmt->bindParam(":img", $datos["img"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
        $stmt->bindParam(":servicios_extra", $datos["servicios_extra"], PDO::PARAM_STR);
        $stmt->bindParam(":precio", $datos["precio"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			echo "\nPDO::errorInfo():\n";
    		print_r(Conexion::conectar()->errorInfo());
		
		}

	}
}
