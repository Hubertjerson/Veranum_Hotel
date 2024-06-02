<?php

require_once "conexion.php";

class ModeloBanner
{
    static public function mdlMostrarBanner($tabla, $item, $valor)
    {
        if ($item != null && $valor != null) {
            $stm = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stm->bindParam(":" . $item, $valor, PDO::PARAM_STR);
            $stm->execute();
            return $stm->fetch();
        } else {
            $stm = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC");
            $stm->execute();
            return $stm->fetchAll();
        }
    }
}