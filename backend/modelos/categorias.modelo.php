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
}
