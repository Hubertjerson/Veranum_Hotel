<?php

require_once "conexion.php";

class ModeloAdministradores
{
    static public function mdlMostrarAdministradores($tabla, $item, $valor)
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

    static public function mdlRegistroAdministradores($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, usuario, password, perfil, estado) VALUES (:nombre, :usuario, :password, :perfil, :estado)");

        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
        $stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
        $stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            // Depuración: mostrar error PDO
            echo "\nPDO::errorInfo():\n";
            print_r($stmt->errorInfo());
        }
    }

    /* EDITAR ADMINISTRADOR */

    static public function mdlEditarAdministrador($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, usuario = :usuario, password = :password, perfil = :perfil WHERE id = :id");

        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
        $stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
    }

    /* ACTUALIZAR ADMINISTRADO */

    static public function mdlActualizarAdministrador($tabla, $item1, $valor1, $item2, $valor2)
    {
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item2 = :$item2 WHERE $item1 = :$item1");

        $stmt->bindParam(":" . $item2, $valor2, PDO::PARAM_INT);
        $stmt->bindParam(":" . $item1, $valor1, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
    }
    static public function mdlEliminarAdministrador($tabla, $id){
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "ok";
        } else {
            // Mostrar error PDO
            echo "\nPDO::errorInfo():\n";
            print_r($stmt->errorInfo());
            return "error";
        }
    }
}
