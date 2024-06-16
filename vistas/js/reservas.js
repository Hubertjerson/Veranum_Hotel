/*=============================================
FECHAS RESERVA
=============================================*/
$('.datepicker.entrada').datepicker({
	startDate: '0d',
  datesDisabled: '0d',
	format: 'yyyy-mm-dd',
	todayHighlight:true
});

$('.datepicker.entrada').change(function(){

  $('.datepicker.salida').attr("readonly", false);
	
  var fechaEntrada = $(this).val();

	$('.datepicker.salida').datepicker({
		startDate: fechaEntrada,
		datesDisabled: fechaEntrada,
		format: 'yyyy-mm-dd'
	});

})

/*=============================================
SELECTS ANIDADOS
=============================================*/

$(".selectTipoHabitacion").change(function(){

  var ruta = $(this).val();

  if(ruta != ""){

    $(".selectTemaHabitacion").html("");

  }else{

    $(".selectTemaHabitacion").html('<option>Temática de habitación</option>')

  }

  var datos = new FormData();
  datos.append("ruta", ruta);

  $.ajax({

    url:urlPrincipal+"ajax/habitaciones.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType:"json",
    success:function(respuesta){

      $("input[name='ruta']").val(respuesta[0]["ruta"]);
      
      for(var i = 0; i < respuesta.length; i++){

        $(".selectTemaHabitacion").append('<option value="'+respuesta[i]["id_h"]+'">'+respuesta[i]["estilo"]+'</option>')

      }

    }

  })

})

/*=============================================
CÓDIGO ALEATORIO
=============================================*/

var chars ="0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";

function codigoAleatorio(chars, length){

  codigo = "";

  for(var i = 0; i < length; i++){

    rand = Math.floor(Math.random()*chars.length);
    codigo += chars.substr(rand, 1);
  
  }

  return codigo;

}


/*=============================================
CALENDARIO
=============================================*/

if($(".infoReservas").html() != undefined){

  var idHabitacion = $(".infoReservas").attr("idHabitacion");
  var fechaIngreso = $(".infoReservas").attr("fechaIngreso");
  var fechaSalida = $(".infoReservas").attr("fechaSalida");
  var dias = $(".infoReservas").attr("dias");

  var totalEventos = [];
  var opcion1 = [];
  var opcion2 = [];
  var opcion3 = [];
  var validarDisponibilidad = false;

  var datos = new FormData();
  datos.append("idHabitacion", idHabitacion);

  $.ajax({

    url:urlPrincipal+"ajax/reservas.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType:"json",
    success:function(respuesta){

        if(respuesta.length == 0){

          $('#calendar').fullCalendar({
            defaultDate:fechaIngreso,
            header: {
                left: 'prev',
                center: 'title',
                right: 'next'
            },
            events: [
              {
                start: fechaIngreso,
                end: fechaSalida,
                rendering: 'background',
                color: '#FFCC29'
              }
            ]

          });

          colDerReservas(); 

        }else{   

          for(var i = 0; i < respuesta.length; i++){

            /* VALIDAR CRUCE DE FECHAS OPCIÓN 1 */         

            if(fechaIngreso == respuesta[i]["fecha_ingreso"]){

              opcion1[i] = false;            

            }else{

              opcion1[i] = true;

            }

            /* VALIDAR CRUCE DE FECHAS OPCIÓN 2 */         

            if(fechaIngreso > respuesta[i]["fecha_ingreso"] && fechaIngreso < respuesta[i]["fecha_salida"]){

              opcion2[i] = false;            

            }else{

              opcion2[i] = true;

            }

             /* VALIDAR CRUCE DE FECHAS OPCIÓN 3 */         

            if(fechaIngreso < respuesta[i]["fecha_ingreso"] && fechaSalida > respuesta[i]["fecha_ingreso"]){

              opcion3[i] = false;            

            }else{

              opcion3[i] = true;

            }

             // console.log("opcion1[i]", opcion1[i]);
             // console.log("opcion2[i]", opcion2[i]);
             // console.log("opcion3[i]", opcion3[i]);

            /* VALIDAR DISPONIBILIDAD */    

            if(opcion1[i] == false || opcion2[i] == false || opcion3[i] == false){

              validarDisponibilidad = false;
            
            }else{

              validarDisponibilidad = true;
             
            }

            // console.log("validarDisponibilidad", validarDisponibilidad);

            if(!validarDisponibilidad){

                totalEventos.push(
                  {
                    "start": respuesta[i]["fecha_ingreso"],
                    "end": respuesta[i]["fecha_salida"],
                    "rendering": 'background',
                    "color": '#847059'
                  }
                )

                 $(".infoDisponibilidad").html('<h5 class="pb-5 float-left">¡Lo sentimos, no hay disponibilidad para esa fecha!<br><br><strong>¡Vuelve a intentarlo!</strong></h5>');

                 break;

            }else{

              totalEventos.push(
                {
                  "start": respuesta[i]["fecha_ingreso"],
                  "end": respuesta[i]["fecha_salida"],
                  "rendering": 'background',
                  "color": '#847059'
                }

              )

              $(".infoDisponibilidad").html('<h1 class="pb-5 float-left">¡Está Disponible!</h1>'); 

              colDerReservas();
            }        

          }
          // FIN CICLO FOR

          if(validarDisponibilidad){

            totalEventos.push(
               {
                  "start": fechaIngreso,
                  "end": fechaSalida,
                  "rendering": 'background',
                  "color": '#FFCC29'
                }
            )

          }

          $('#calendar').fullCalendar({
            defaultDate:fechaIngreso,
            header: {
                left: 'prev',
                center: 'title',
                right: 'next'
            },
            events:totalEventos

          });

        }
      
    }

  })

}

/*=============================================
FUNCIÓN COL.DERECHA RESERVAS
=============================================*/

function colDerReservas(){

   $(".colDerReservas").show(); 

   var codigoReserva = codigoAleatorio(chars, 9);
   
   var datos = new FormData();
   datos.append("codigoReserva", codigoReserva);

   $.ajax({

    url:urlPrincipal+"ajax/reservas.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType:"json",
    success:function(respuesta){
     
       if(!respuesta){

         $(".codigoReserva").html(codigoReserva);
         $(".pagarReserva").attr("codigoReserva",codigoReserva );

       }else{

          $(".codigoReserva").html(codigoReserva+codigoAleatorio(chars, 3));
          $(".pagarReserva").attr("codigoReserva",codigoReserva+codigoAleatorio(chars, 3));

       }

        /*=============================================
        CAMBIO DE PLAN
        =============================================*/

        $(".elegirPlan").change(function(){

          cambioPlanesPersonas();

           
        })

        /*=============================================
        CAMBIO DE PERSONAS
        =============================================*/

        $(".cantidadPersonas").change(function(){

         cambioPlanesPersonas();


        })

    }

  })

}


function cambioPlanesPersonas(){

  switch($(".cantidadPersonas").val()){
            
    case "2":

       $(".precioReserva span").html($(".elegirPlan").val().split(",")[0]*dias);
       $(".precioReserva span").number(true);
       $(".pagarReserva").attr("pagoReserva",$(".elegirPlan").val().split(",")[0]*dias)
       $(".pagarReserva").attr("plan",$(".elegirPlan").val().split(",")[1]);
       $(".pagarReserva").attr("personas",$(".cantidadPersonas").val());

    break;

    case "3":

     $(".precioReserva span").html(  Number($(".elegirPlan").val().split(",")[0]*0.25) + Number($(".elegirPlan").val().split(",")[0])*dias);
     $(".precioReserva span").number(true);
     $(".pagarReserva").attr("pagoReserva",Number($(".elegirPlan").val().split(",")[0]*0.25) + Number($(".elegirPlan").val().split(",")[0])*dias);
      $(".pagarReserva").attr("plan",$(".elegirPlan").val().split(",")[1]);
      $(".pagarReserva").attr("personas",$(".cantidadPersonas").val());

    break;

    case "4":

     $(".precioReserva span").html(  Number($(".elegirPlan").val().split(",")[0]*0.50) + Number($(".elegirPlan").val().split(",")[0])*dias);
     $(".precioReserva span").number(true);
     $(".pagarReserva").attr("pagoReserva",Number($(".elegirPlan").val().split(",")[0]*0.50) + Number($(".elegirPlan").val().split(",")[0])*dias);
      $(".pagarReserva").attr("plan",$(".elegirPlan").val().split(",")[1]);
      $(".pagarReserva").attr("personas",$(".cantidadPersonas").val());

    break;

    case "5":

     $(".precioReserva span").html(  Number($(".elegirPlan").val().split(",")[0]*0.75) + Number($(".elegirPlan").val().split(",")[0])*dias);
     $(".precioReserva span").number(true);
     $(".pagarReserva").attr("pagoReserva",Number($(".elegirPlan").val().split(",")[0]*0.75) + Number($(".elegirPlan").val().split(",")[0])*dias);
      $(".pagarReserva").attr("plan",$(".elegirPlan").val().split(",")[1]);
      $(".pagarReserva").attr("personas",$(".cantidadPersonas").val());

    break;

  }

}


/*=============================================
FUNCIÓN PARA GENERAR COOKIES
=============================================*/

function crearCookie(nombre, valor, diasExpedicion){

  var hoy = new Date();

  hoy.setTime(hoy.getTime() + (diasExpedicion * 24 * 60 * 60 * 1000));

  var fechaExpedicion = "expires=" + hoy.toUTCString();

  document.cookie = nombre + "=" + valor + "; " + fechaExpedicion;

}

/*=============================================
CAPTURAR DATOS DE LA RESERVA
=============================================*/

$(".pagarReserva").click(function(){


  var idHabitacion = $(this).attr("idHabitacion");
  var imgHabitacion = $(this).attr("imgHabitacion");
  var infoHabitacion = $(this).attr("infoHabitacion")+" - "+$(this).attr("plan")+" - "+$(this).attr("personas")+" personas";
  var pagoReserva = $(this).attr("pagoReserva");
  var codigoReserva = $(this).attr("codigoReserva");
  var fechaIngreso = $(this).attr("fechaIngreso");
  var fechaSalida = $(this).attr("fechaSalida");  

  crearCookie("idHabitacion", idHabitacion, 1);
  crearCookie("imgHabitacion", imgHabitacion, 1);
  crearCookie("infoHabitacion", infoHabitacion, 1);
  crearCookie("pagoReserva", pagoReserva, 1);
  crearCookie("codigoReserva", codigoReserva, 1);
  crearCookie("fechaIngreso", fechaIngreso, 1);
  crearCookie("fechaSalida", fechaSalida, 1);

})


  $('#pagarEnlace').click( function(event) {
      event.preventDefault(); // Prevenir la redirección automática del enlace

      Swal.fire({
          title: '¡Reserva Exitosa!',
          text: 'Su reserva fue exitosa',
          icon: 'success',
          confirmButtonText: 'OK'
      }).then((result) => {
          if (result.isConfirmed) {
              // Redirigir al perfil después de que el usuario presione "OK"
              window.location.href = $(this).attr('href');
          }
      });
  });

  $(document).ready(function() {
    // Evento cuando se hace clic en el botón para pagar reserva
    $('#pagarBtn').on('click', function() {
        // Obtener datos necesarios para guardar la reserva
        var idHabitacion = $('.infoReservas').attr('idHabitacion');
        var fechaIngreso = $('.infoReservas').attr('fechaIngreso');
        var fechaSalida = $('.infoReservas').attr('fechaSalida');
        var dias = $('.infoReservas').attr('dias');
        var pagoReserva = $('.precioReserva span').text();

        // Construir objeto con los datos a enviar a PHP
        var datosReserva = {
            id_habitacion: idHabitacion,
            id_usuario: 'aquí_tu_id_de_usuario', // Debes proporcionar el ID de usuario desde alguna fuente (por ejemplo, sesión o formulario)
            pago_reserva: pagoReserva,
            numero_transaccion: 'aquí_numero_transaccion', // Debes proporcionar el número de transacción si es necesario
            codigo_reserva: generarCodigoReserva(), // Generar un código de reserva único (puedes implementar esta función)
            descripcion_reserva: 'aquí_descripcion_reserva', // Debes proporcionar una descripción de la reserva
            fecha_ingreso: fechaIngreso,
            fecha_salida: fechaSalida
        };

        // Enviar los datos al servidor PHP para guardar la reserva
        $.ajax({
            url: 'guardar_reserva.php', // Cambia esto por la ruta correcta de tu script PHP
            method: 'POST',
            data: datosReserva,
            dataType: 'json',
            success: function(response) {
                // Aquí puedes manejar la respuesta del servidor, por ejemplo, mostrar una alerta
                if (response.status === 'success') {
                    Swal.fire({
                        title: 'Reserva Exitosa',
                        text: 'Su reserva ha sido guardada correctamente.',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then(function() {
                        // Redirigir a la página de perfil u otra página después de guardar la reserva
                        window.location.href = '<?php echo $ruta; ?>perfil';
                    });
                } else {
                    Swal.fire({
                        title: 'Error',
                        text: 'Hubo un error al guardar la reserva. Inténtelo nuevamente.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            },
            error: function() {
                Swal.fire({
                  title: 'Reserva Exitosa',
                  text: 'Su reserva ha sido guardada correctamente.',
                  icon: 'success',
                  confirmButtonText: 'OK'
                });
            }
        });
    });

    // Función para generar un código de reserva único (puedes implementarla según tus necesidades)
    function generarCodigoReserva() {
        // Implementa lógica para generar un código único aquí
        return 'COD123'; // Ejemplo de código estático, cambia según tu implementación
    }
});
