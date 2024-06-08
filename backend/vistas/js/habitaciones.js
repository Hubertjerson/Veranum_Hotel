//$.ajax({
//    "url":"ajax/tablaHabitaciones.ajax.php",
//    success:function(respuesta){
//        console.log("Respuesta",respuesta);
//    }
//})

/*=============================================
360 GRADOS
=============================================*/

$(".360Antiguo").pano({
	img: $(".360Antiguo").attr("back")
});

/*=============================================
Plugin ckEditor
=============================================*/

ClassicEditor.create(document.querySelector('#descripcionHabitacion'), {

    toolbar: ['heading', '|', 'bold', 'italic', 'bulletedList', 'numberedList', '|', 'undo', 'redo']

}).then(function (editor) {

    $(".ck-content").css({ "height": "400px" })

}).catch(function (error) {

    // console.log("error", error);

})



$(".tablaHabitaciones").DataTable({
    "ajax": "ajax/tablaHabitaciones.ajax.php",
    "deferRender": true,
    "retrieve": true,
    "processing": true,
    "language": {

        "sProcessing": "Procesando...",
        "sLengthMenu": "Mostrar _MENU_ registros",
        "sZeroRecords": "No se encontraron resultados",
        "sEmptyTable": "Ningún dato disponible en esta tabla",
        "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
        "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
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

})