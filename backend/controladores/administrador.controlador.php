<?php

class ControladorAdministradores
{
    public function ctrIngresoAdministradores()
    {
        if (isset($_POST["ingresoUsuario"])) {
            if (
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingresoUsuario"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingresoPassword"])
            ) {
                $encriptarPassword = crypt($_POST["ingresoPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
                $tabla = "administradores";
                $item = "usuario";
                $valor = $_POST["ingresoUsuario"];

                $respuesta = ModeloAdministradores::mdlMostrarAdministradores($tabla, $item, $valor);

                if ($respuesta) {
                    if ($respuesta["estado"] == 1) {
                        if ($respuesta["usuario"] == $_POST["ingresoUsuario"] && $respuesta["password"] == $encriptarPassword) {
                            $_SESSION["validarSesionBackend"] = 'ok';
                            $_SESSION['idBackend'] = $respuesta["id"];
                            echo '<script>
                                window.location= "' . $_SERVER["REQUEST_URI"] . '";
                            </script>';
                        } else {
                            echo "<div class='alert alert-danger mt-3 small'>ERROR: Usuario y/o contraseña incorrectos</div>";
                        }
                    } else {
                        echo "<div class='alert alert-danger mt-3 small'>ERROR: El usuario está desactivado</div>";
                    }
                } else {
                    echo "<div class='alert alert-danger mt-3 small'>ERROR: Usuario y/o contraseña incorrectos</div>";
                }
            } else {
                echo "<div class='alert alert-danger mt-3 small'>ERROR: Ingreso caracteres inválidos</div>";
            }
        }
    }

    static public function ctrMostrarAdministradores($item, $valor)
    {
        $tabla = "administradores";
        $respuesta = ModeloAdministradores::mdlMostrarAdministradores($tabla, $item, $valor);

        return $respuesta;
    }

    /* REGISTRO ADMINISTRADOR */

    public function ctrRegistroAdministrador(){
        if (isset($_POST["registroNombre"])) {
            if (
                preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$/', $_POST["registroNombre"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["registroUsuario"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["registroPassword"])
            ) {
                $encriptarPassword = crypt($_POST["registroPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
                $tabla = 'administradores';
                $datos = array(
                    "nombre" => $_POST["registroNombre"],
                    "usuario" => $_POST["registroUsuario"],
                    "password" => $encriptarPassword,
                    "perfil" => $_POST["registroPerfil"],
                    "estado" => 0
                );

                // Depuración: mostrar datos
                echo "<pre>";
                print_r($datos);
                echo "</pre>";

                $respuesta = ModeloAdministradores::mdlRegistroAdministradores($tabla, $datos);
                if ($respuesta == "ok") {
                    echo '<script>
                    Swal.fire({
                        type:"success",
                        title: "¡CORRECTO!",
                        text: "El administrador ha sido creado correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result){
                        if(result.value){   
                            window.location = "administradores";
                        } 
                    });
                </script>';
                } else {
                    echo "<div class='alert alert-danger mt-3 small'>ERROR: No se pudo crear el administrador</div>";
                }
            } else {
                echo "<div class='alert alert-danger mt-3 small'>ERROR: No se permiten caracteres especiales</div>";
            }
        }
    }


    /* EDITAR ADMINISTRADOR */

    public function ctrEditarAdministrador()
    {
        if (isset($_POST["editarNombre"])) {
            if (
                preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$/', $_POST["editarNombre"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarUsuario"])
            ) {
                if ($_POST["editarPassword"] != "") {
                    if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarPassword"])) {
                        $password = crypt($_POST["editarPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
                    } else {
                        echo "<div class='alert alert-danger mt-3 small'>ERROR: No se permiten caracteres especiales en la contraseña</div>";
                        return;
                    }
                } else {
                    $password = $_POST["passwordActual"];
                }

                $tabla = 'administradores';
                $datos = array(
                    "id" => $_POST["editarId"],
                    "nombre" => $_POST["editarNombre"],
                    "usuario" => $_POST["editarUsuario"],
                    "password" => $password,
                    "perfil" => $_POST["editarPerfil"]
                );

                $respuesta = ModeloAdministradores::mdlEditarAdministrador($tabla, $datos);
                if ($respuesta == "ok") {
                    echo '<script>
                            Swal.fire({
                                type: "success",
                                title: "¡CORRECTO!",
                                text: "El administrador ha sido actualizado correctamente",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar"
                            }).then(function(result){
                                if(result.value){   
                                    window.location = "administradores";
                                }
                            });
                        </script>';
                } else {
                    echo "<div class='alert alert-danger mt-3 small'>ERROR: No se pudo actualizar el administrador</div>";
                }
            } else {
                echo "<div class='alert alert-danger mt-3 small'>ERROR: No se permiten caracteres especiales en nombre o usuario</div>";
            }
        }
    }

    /* ELIMINAR ADMINISTRADOR */

    static public function ctrEliminarAdministrador($id)
    {
        $tabla = 'administradores';
        $respuesta = ModeloAdministradores::mdlEliminarAdministrador($tabla, $id);
        return $respuesta;
    }
}
