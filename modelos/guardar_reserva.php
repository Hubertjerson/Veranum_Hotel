<?php
// Conexión a la base de datos y otras configuraciones necesarias
require_once 'conexion.php'; // Asegúrate de incluir tu archivo de conexión

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recibir datos del formulario AJAX
    $idHabitacion = $_POST['id_habitacion'];
    $idUsuario = $_POST['id_usuario'];
    $pagoReserva = $_POST['pago_reserva'];
    $numeroTransaccion = $_POST['numero_transaccion'];
    $codigoReserva = $_POST['codigo_reserva'];
    $descripcionReserva = $_POST['descripcion_reserva'];
    $fechaIngreso = $_POST['fecha_ingreso'];
    $fechaSalida = $_POST['fecha_salida'];

    // Llama a tu método para guardar la reserva en la base de datos
    $datosReserva = array(
        'id_habitacion' => $idHabitacion,
        'id_usuario' => $idUsuario,
        'pago_reserva' => $pagoReserva,
        'numero_transaccion' => $numeroTransaccion,
        'codigo_reserva' => $codigoReserva,
        'descripcion_reserva' => $descripcionReserva,
        'fecha_ingreso' => $fechaIngreso,
        'fecha_salida' => $fechaSalida
    );

    // Llama al controlador para guardar la reserva
    $respuesta = ControladorReservas::ctrGuardarReserva($datosReserva);

    // Enviar respuesta JSON al cliente
    if ($respuesta === true) {
        echo json_encode(array('status' => 'success'));
    } else {
        echo json_encode(array('status' => 'error'));
    }
} else {
    // Si no es una solicitud POST, redirigir o manejar el error según tu aplicación
    echo json_encode(array('status' => 'error', 'message' => 'Método no permitido'));
}

