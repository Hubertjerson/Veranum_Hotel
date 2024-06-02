$(".tablaAdministradores").DataTable({
    "ajax": "ajax/tablaAdministradores.ajax.php",
    "deferRender": true,
    "retrieve": true,
    "processing": true,
    "language": {
        "sProcessing": "Procesando...",
        "sLengthMenu": "Mostrar _MENU_ registros",
        "sZeroRecords": "No se encontraron resultados",
        "sEmptyTable": "Ningún dato disponible en esta tabla",
        "sInfo": "Mostrando registros del _START_ al _END_",
        "sInfoEmpty": "Mostrando registros del 0 al 0",
        "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix": "",
        "sSearch": "Buscar:",
        "sUrl": "",
        "sInfoThousands": ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst": "Primero",
            "sLast": "Último",
            "sNext": "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
    }
});


$(document).on("click", ".editarAdministrador", function () {
    var idAdministrador = $(this).attr("idAdministrador");

    var datos = new FormData();
    datos.append("idAdministrador", idAdministrador);

    $.ajax({
        url: "ajax/administradores.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            $('input[name="editarId"]').val(respuesta["id"]);
            $('input[name="editarNombre"]').val(respuesta["nombre"]);
            $('input[name="editarUsuario"]').val(respuesta["usuario"]);
            $('input[name="passwordActual"]').val(respuesta["password"]);
            $('select[name="editarPerfil"]').val(respuesta["perfil"]);
        }
    });
});

/* ACTIVAR O DESACTIVAR ADMIN */

$(document).on("click", ".btnActivar", function () {
    var idAdmin = $(this).attr("idAdministrador");
    var estadoAdmin = $(this).attr("estadoAdmin");
    var boton = $(this); // Definición de la variable boton

    var datos = new FormData();
    datos.append("idAdmin", idAdmin);
    datos.append("estadoAdmin", estadoAdmin);

    $.ajax({
        url: "ajax/administradores.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            if (respuesta.trim() == "ok") {

                if (estadoAdmin == 0) {

                    boton.removeClass('btn-info');
                    boton.addClass('btn-dark');
                    boton.html('Desactivado');
                    boton.attr('estadoAdmin', 1);

                } else {

                    boton.addClass('btn-info');
                    boton.removeClass('btn-dark');
                    boton.html('Activado');
                    boton.attr('estadoAdmin', 0);

                }

            }
        }
    });
});

/* ELIMINAR ADIMINISTRADOR */
$(document).on("click", ".eliminarAdministrador", function () {
    var idAdministrador = $(this).attr("idAdministrador");
    var administradorEspecial = 1; // ID del administrador especial

    if (idAdministrador == administradorEspecial) {
        Swal.fire({
            title: "Error",
            text: "El administrador no se puede eliminar",
            icon: "error",
            confirmButtonText: "Cerrar"
        });
        return;
    }

    Swal.fire({
        title: '¿Está seguro de eliminar este administrador?',
        text: "¡Si no lo está puede cancelar la acción!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, eliminar administrador!'
    }).then(function (result) {
        if (result.value) {
            var datos = new FormData();
            datos.append("idEliminar", idAdministrador);

            $.ajax({
                url: "ajax/administradores.ajax.php",
                method: "POST",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                success: function (respuesta) {
                    console.log("Respuesta del servidor:", respuesta); // Depurar la respuesta del servidor
                    if (respuesta.trim() == "ok") {
                        window.location = "administradores";
                        Swal.fire({
                            icon: "success",
                            title: "¡CORRECTO!",
                            text: "El administrador ha sido borrado correctamente",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false
                        }).then(function (result) {
                            console.log("Resultado de la confirmación:", result); // Depuración
                            console.log("Recargando la página..."); // Mensaje de depuración
                            if (result.value) {
                                // Recargar la página forzando la recarga desde el servidor
                                location.reload(true);
                            }
                        }
                        );
                    }
                },
                error: function (xhr, status, error) {
                    console.error("Error en la solicitud AJAX:", error); // Depurar errores en la solicitud AJAX
                }
            });
        }
    });
});

