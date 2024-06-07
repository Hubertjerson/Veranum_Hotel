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
    /*REGISTRAR BANNER */

    static public function mdlRegistroBanner($tabla, $ruta)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(img) VALUES (:img)");

        $stmt->bindParam(":img", $ruta, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            echo "\nPDO::errorInfo():\n";
            print_r(Conexion::conectar()->errorInfo());
        }
    }

    /*=============================================
	Editar Banner
	=============================================*/

    static public function mdlEditarBanner($tabla, $id, $ruta)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET img = :img WHERE id = :id");

        $stmt->bindParam(":img", $ruta, PDO::PARAM_STR);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";
        } else {

            echo "\nPDO::errorInfo():\n";
            print_r(Conexion::conectar()->errorInfo());
        }
    }


    /*=============================================
	Eliminar Banner
	=============================================*/

    static public function mdlEliminarBanner($tabla, $id)
    {

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

        $stmt->bindParam(":id", $id, PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";
        } else {

            echo "\nPDO::errorInfo():\n";
            print_r(Conexion::conectar()->errorInfo());
        }
    }
}
