<?php

$item = "id_u";
$valor = $_SESSION["id"];

$usuario = ControladorUsuarios::ctrMostrarUsuario($item, $valor);
$reservas = ControladorReservas::ctrMostrarReservasUsuario($valor);

$hoy = date("Y-m-d");
$noVencidas = 0;
$vencidas = 0;

foreach ($reservas as $key => $value) {

	if ($hoy >= $value["fecha_ingreso"]) {

		++$vencidas;
	} else {

		++$noVencidas;
	}
}

?>


<!--=====================================
INFO PERFIL
======================================-->

<div class="infoPerfil container-fluid bg-white p-0 pb-5 mb-5">

	<div class="container">

		<div class="row">

			<!--=====================================
			BLOQUE IZQ
			======================================-->

			<div class="col-12 col-lg-4 colIzqPerfil p-0 px-lg-3">

				<div class="cabeceraPerfil pt-4">

					<?php if ($usuario["modo"] == "facebook") : ?>

						<a href="#" class="float-left lead text-white pt-1 px-3 mb-4 salir">
							<h5><i class="fas fa-chevron-left"></i> Salir</h5>
						</a>

					<?php else : ?>

						<a href="<?php echo $ruta;  ?>salir" class="float-left lead text-white pt-1 px-3 mb-4">
							<h5><i class="fas fa-chevron-left"></i> Salir</h5>
						</a>

					<?php endif ?>



					<div class="clearfix"></div>

					<h1 class="text-white p-2 pb-lg-5 text-center text-lg-left">MI PERFIL</h1>
				</div>

				<!--=====================================
				PERFIL
				======================================-->

				<div class="descripcionPerfil">

					<figure class="text-center imgPerfil">

						<?php if ($usuario["foto"] == "") : ?>

							<img src="<?php echo $servidor; ?>vistas/img/usuarios/default/default.png" class="img-fluid rounded-circle">

						<?php else : ?>

							<?php if ($usuario["modo"] == "directo") : ?>

								<img src="<?php echo $servidor . $usuario["foto"]; ?>" class="img-fluid rounded-circle">

							<?php else : ?>

								<img src="<?php echo $usuario["foto"]; ?>" class="img-fluid rounded-circle">

							<?php endif ?>

						<?php endif ?>

					</figure>

					<div id="accordion">

						<div class="card">

							<div class="card-header">
								<a class="card-link" data-toggle="collapse" href="#collapseOne">
									MIS RESERVAS
								</a>
							</div>

							<div id="collapseOne" class="collapse show" data-parent="#accordion">

								<ul class="card-body p-0">

									<li class="px-2 misReservas" style="background:#FFFDF4"> <?php echo $noVencidas; ?> Por vencerse</li>
									<li class="px-2 text-white misReservas" style="background:#CEC5B6"> <?php echo $vencidas; ?> vencidas</li>

								</ul>

								<!--=====================================
								TABLA RESERVAS MÓVIL
								======================================-->


								<?php

								if (!$reservas) {

									echo ' <div class="d-lg-none d-flex py-2">Aún no tiene reservas realizadas</div>';
								}


								foreach ($reservas as $key => $value) {

									$habitacion = ControladorHabitaciones::ctrMostrarHabitacion($value["id_habitacion"]);
									$categoria = ControladorCategorias::ctrMostrarCategoria($habitacion["tipo_h"]);
									$testimonio = ControladorReservas::ctrMostrarTestimonios("id_res", $value["id_reserva"]);

									echo '<div class="d-lg-none d-flex py-2">
									
												<div class="p-2 flex-grow-1">

													<h5>' . $categoria["tipo"] . " " . $habitacion["estilo"] . '</h5>
													<h5 class="small text-gray-dark">Del ' . $value["fecha_ingreso"] . ' al ' . $value["fecha_salida"] . '</h5>

												</div>

												<div class="p-2">

													  <button type="button" class="btn btn-dark text-white actualizarTestimonio" data-toggle="modal" data-target="#actualizarTestimonio" idTestimonio="' . $testimonio[0]["id_testimonio"] . '"
													     verTestimonio="' . $testimonio[0]["testimonio"] . '">

													  	<i class="fas fa-pencil-alt"></i>

													  </button>

													  <button type="button" class="btn btn-warning text-white verTestimonio" data-toggle="modal" data-target="#verTestimonio" verTestimonio="' . $testimonio[0]["testimonio"] . '">

													  	<i class="fas fa-eye"></i>

													  </button>

												</div>

											</div>

											<hr class="my-0">';
								}

								?>

							</div>

						</div>

						<div class="card">

							<div class="card-header">
								<a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
									MIS DATOS
								</a>
							</div>

							<div id="collapseTwo" class="collapse" data-parent="#accordion">
								<div class="card-body p-0">

									<ul class="list-group">

										<li class="list-group-item small"><?php echo $usuario["nombre"]; ?></li>
										<li class="list-group-item small"><?php echo $usuario["email"]; ?></li>

										<?php if ($usuario["modo"] == "directo") : ?>

											<li class="list-group-item small">

												<button class="btn btn-dark btn-sm" data-toggle="modal" data-target="#cambiarPassword">Cambiar Contraseña</button>

											</li>

											<!--=====================================
										MODAL PARA CAMBIAR CONTRASEÑA
										======================================-->

											<div class="modal formulario" id="cambiarPassword">

												<div class="modal-dialog">

													<div class="modal-content">

														<form method="post">

															<div class="modal-header">

																<h4 class="modal-title">Cambiar Contraseña</h4>

																<button type="button" class="close" data-dismiss="modal">&times;</button>

															</div>

															<div class="modal-body">

																<input type="hidden" name="idUsuarioPassword" value="<?php echo $usuario["id_u"]; ?>">

																<div class="form-group">

																	<input type="password" class="form-control" placeholder="Nueva contraseña" name="editarPassword" required>

																</div>

															</div>

															<div class="modal-footer d-flex justify-content-between">

																<div>

																	<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>

																</div>

																<div>

																	<button type="submit" class="btn btn-primary">Enviar</button>

																</div>

															</div>

															<?php

															$cambiarPassword = new ControladorUsuarios();
															$cambiarPassword->ctrCambiarPassword();

															?>

														</form>

													</div>

												</div>

											</div>

										<?php endif ?>

										<li class="list-group-item small">
											<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#cambiarFotoPerfil">Cambiar Imagen</button>
										</li>

										<!--=====================================
										MODAL PARA CAMBIAR FOTO DE PERFIL
										======================================-->

										<div class="modal formulario" id="cambiarFotoPerfil">

											<div class="modal-dialog">

												<div class="modal-content">

													<form method="post" enctype="multipart/form-data">

														<div class="modal-header">

															<h4 class="modal-title">Cambiar Imagen</h4>

															<button type="button" class="close" data-dismiss="modal">&times;</button>

														</div>

														<div class="modal-body">

															<input type="hidden" name="idUsuarioFoto" value="<?php echo $usuario["id_u"]; ?>">

															<div class="form-group">

																<input type="file" class="form-control-file border" name="cambiarImagen" required>

																<input type="hidden" name="fotoActual" value="<?php echo $usuario["foto"]; ?>">

															</div>

														</div>

														<div class="modal-footer d-flex justify-content-between">

															<div>

																<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>

															</div>

															<div>

																<button type="submit" class="btn btn-primary">Enviar</button>

															</div>

														</div>

														<?php

														$cambiarImagen = new ControladorUsuarios();
														$cambiarImagen->ctrCambiarFotoPerfil();


														?>

													</form>

												</div>

											</div>

										</div>

									</ul>

								</div>

							</div>

						</div>

					</div>

				</div>

			</div>

			<!--=====================================
			BLOQUE DER
			======================================-->

			<div class="col-12 col-lg-8 colDerPerfil">

				<div class="row">

					<div class="col-6 d-none d-lg-block">

						<h4 class="float-left">Hola <?php echo $usuario["nombre"]; ?></h4>

					</div>

					<!--=====================================
					MERCADO PAGO
					======================================-->

					<div class="col-12" id="wallet_container">

						<?php if (isset($_COOKIE["codigoReserva"])) : ?>


							<?php

							$validarPagoReserva = false;

							$hoy = date("Y-m-d");

							if ($hoy >= $_COOKIE["fechaIngreso"] || $hoy >= $_COOKIE["fechaSalida"]) {

								echo '<div class="alert alert-danger">Lo sentimos, las fechas de la reserva no pueden ser igual o inferiores al día de hoy, vuelve a intentarlo.</div>';

								$validarPagoReserva = false;
							} else {

								$validarPagoReserva = true;
							}


							/*=============================================
						 	CRUCE DE FECHAS
							=============================================*/

							$valor = $_COOKIE["idHabitacion"];

							$validarReserva = ControladorReservas::ctrMostrarReservas($valor);

							$opcion01 = array();
							$opcion02 = array();
							$opcion03 = array();

							if ($validarReserva != 0) {

								foreach ($validarReserva as $key => $value) {

									/* VALIDAR CRUCE DE FECHAS OPCIÓN 1 */

									if ($_COOKIE["fechaIngreso"] == $value["fecha_ingreso"]) {

										array_push($opcion01, false);
									} else {

										array_push($opcion01, true);
									}

									/* VALIDAR CRUCE DE FECHAS OPCIÓN 2 */

									if ($_COOKIE["fechaIngreso"] > $value["fecha_ingreso"] && $_COOKIE["fechaIngreso"] < $value["fecha_salida"]) {

										array_push($opcion02, false);
									} else {

										array_push($opcion02, true);
									}

									/* VALIDAR CRUCE DE FECHAS OPCIÓN 3 */

									if ($_COOKIE["fechaIngreso"] < $value["fecha_ingreso"] && $_COOKIE["fechaSalida"] > $value["fecha_ingreso"]) {

										array_push($opcion03, false);
									} else {

										array_push($opcion03, true);
									}

									if ($opcion01[$key] == false || $opcion02[$key] == false || $opcion03[$key] == false) {

										$validarPagoReserva = false;

										echo 'Lo sentimos, las fechas de la reserva que habías seleccionado han sido ocupadas  
											<a href="' . $ruta . '" class="btn btn-danger btn-sm">vuelve a intentarlo </a>';

										break;
									} else {

										$validarPagoReserva = true;
									}
								}
							}

							?>

							

						<?php endif ?>

					</div>

					<div class="col-6 d-none d-lg-block"></div>

					<div class="col-12 mt-3">

						<table class="table table-striped">
							<thead>
								<tr>
									<th>#</th>
									<th>Habitación</th>
									<th>Fecha de Ingreso</th>
									<th>Fecha de Salida</th>
									<th>Testimonios</th>
								</tr>
							</thead>
							<tbody>

								<?php

								if (!$reservas) {

									echo ' <tr><td colspan="5">Aún no tiene reservas realizadas</td></tr>';

									return;
								}

								foreach ($reservas as $key => $value) {

									$habitacion = ControladorHabitaciones::ctrMostrarHabitacion($value["id_habitacion"]);
									$categoria = ControladorCategorias::ctrMostrarCategoria($habitacion["tipo_h"]);
									$testimonio = ControladorReservas::ctrMostrarTestimonios("id_res", $value["id_reserva"]);

									echo '<tr>

								 <td>' . ($key + 1) . '</td>
								 <td class="text-uppercase">' . $categoria["tipo"] . " " . $habitacion["estilo"] . '</td>
								 <td>' . $value["fecha_ingreso"] . '</td>
							     <td>' . $value["fecha_salida"] . '</td>
							     <td>
					        
								  <button type="button" class="btn btn-dark text-white actualizarTestimonio" data-toggle="modal" data-target="#actualizarTestimonio" idTestimonio="' . $testimonio[0]["id_testimonio"] . '"
								     verTestimonio="' . $testimonio[0]["testimonio"] . '">

								  	<i class="fas fa-pencil-alt"></i>

								  </button>

								  <button type="button" class="btn btn-warning text-white verTestimonio" data-toggle="modal" data-target="#verTestimonio" verTestimonio="' . $testimonio[0]["testimonio"] . '">

								  	<i class="fas fa-eye"></i>

								  </button>
								
					        	</td>
					       
					     </tr>';
								}

								?>

							</tbody>
						</table>

					</div>

				</div>

			</div>

		</div>

	</div>

</div>
<!--=====================================
MODAL PARA VER TESTIMONIO
======================================-->

<div class="modal" id="verTestimonio">
	
	<div class="modal-dialog">

		<div class="modal-content">

			<div class="modal-header">

				<h4 class="modal-title">Testimonio</h4>

				<button type="button" class="close" data-dismiss="modal">&times;</button>

			</div>

			<div class="modal-body visorTestimonios">

				<script>
					
				$(".verTestimonio").click(function(){

					var testimonio = $(this).attr("verTestimonio");

					if(testimonio != ""){

						$(".modal-body.visorTestimonios").html('<p>'+testimonio+'</p>')

					}else{

						$(".modal-body.visorTestimonios").html('<p>Aún no tiene testimonios de esta reserva</p>');

					}


				})

				</script>			

			</div>

		</div>

	</div>

</div>


<!--=====================================
MODAL PARA EDITAR TESTIMONIO
======================================-->

<div class="modal" id="actualizarTestimonio">
	
	<div class="modal-dialog">

		<div class="modal-content">

			<div class="modal-header">

				<h4 class="modal-title">Testimonio</h4>

				<button type="button" class="close" data-dismiss="modal">&times;</button>

			</div>

			<div class="modal-body">

			<script>

				$(".actualizarTestimonio").click(function(){

					var testimonio = $(this).attr("verTestimonio");
					var idTestimonio = $(this).attr("idTestimonio");

					if(testimonio != ""){

						$(".modal-body textarea").val(testimonio);

					}else{

						$(".modal-body textarea").val("");

					}

					$("input[name='idTestimonio']").val(idTestimonio);


				})


			</script>

				<form method="post">

					<input type="hidden" value="" name="idTestimonio">
				
					<textarea class="form-control" rows="3" name="actualizarTestimonio" required></textarea>

					<input class="btn btn-primary my-3 float-right" type="submit" value="Guardar testimonio">

					<?php

						$actualizarTestimonio = new ControladorReservas();
						$actualizarTestimonio -> ctrActualizarTestimonio();

					?>

				</form>

			</div>

		</div>

	</div>

</div>