//$.ajax({
//    "url": "ajax/tablaBanner.ajax.php",
//    success: function (respuesta) {
//        console.log("respuesta", respuesta);
//    }
//})

$(".tablaBanner").DataTable({
    "ajax": "ajax/tablaBanner.ajax.php",
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

/*=============================================
Editar Banner
=============================================*/

$(document).on("click", ".editarBanner", function () {
    var idBanner = $(this).attr("idBanner");

    var datos = new FormData();
    datos.append("idBanner", idBanner);

    $.ajax({
        url: "ajax/banner.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            $('input[name="idBanner"]').val(respuesta["id"]);
            $('input[name="bannerActual"]').val(respuesta["img"]);
            $('.previsualizarBanner').attr("src", respuesta["img"]);
        }
    })
});

// Previsualizar la nueva imagen seleccionada
$("#editarBannerInput").change(function () {
    var imagen = this.files[0];
    if (imagen) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('.previsualizarBanner').attr('src', e.target.result);
        }
        reader.readAsDataURL(imagen);
    }
});


/*=============================================
Eliminar Banner
=============================================*/

$(document).on("click", ".eliminarBanner", function () {

    var idBanner = $(this).attr("idBanner");
    var rutaBanner = $(this).attr("rutaBanner");

    Swal.fire({
        title: '¿Está seguro de eliminar este banner?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, eliminar banner!'
    }).then(function (result) {

        if (result.value) {

            var datos = new FormData();
            datos.append("idEliminar", idBanner);
            datos.append("rutaBanner", rutaBanner);

            $.ajax({

                url: "ajax/banner.ajax.php",
                method: "POST",
                data: datos,
                cache: false,
                contentType: false,
                processData: false,
                success: function (respuesta) {

                    if (respuesta == "ok") {
                        Swal.fire({
                            type: "success",
                            title: "¡CORRECTO!",
                            text: "El banner ha sido borrado correctamente",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function (result) {

                            if (result.value) {

                                window.location = "banner";

                            }
                        })

                    }

                }

            })

        }

    })

})