<!DOCTYPE html>
<html>
	<head>
		<title>Cinesuyu</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/estilos_navbar_footer.css">
		<link rel="stylesheet" type="text/css" href="css/estilos_contacto.css">
		<link href='https://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'>
		<!--Script para validar que en ambos combos haya seleccion -->
		<script type="text/javascript" src="js/validacion_combos.js"></script>
		<!--Script para llenar el combos de los cines-->
		<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
		<!--Script para validar los campos del formulario -->
		<script type="text/javascript" src="js/validaContacto.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$('#ciudades').change(function(){
					var id=$('#ciudades').val();
					$('#sucursalesdiv').load('datos/llenar_sucursales.php?id='+id);
				});    
			});
		</script>
	</head>
	<body>
		<!--Conexion y consulta a la BD -->
		<?php
			$server = "localhost"; 
			$user = "root";
			$password = "";
			$bd = "cartelera";

			//Conexion
			$conexion = new mysqli($server, $user, $password, $bd);

			//Verificar conexion
			if ($conexion -> connect_error) {
				print("Error en la conexión a la Base de Datos");
			}

			mysqli_query ($conexion,"SET NAMES 'utf8'");

			//Consulta para el combo de ciudades
			$sql = "SELECT * FROM ciudad ORDER BY nombre ASC";
			$result = $conexion -> query($sql);

			//Consulta para el combo de sucursales del formulario
			$sql2 = "SELECT * FROM sucursal ORDER BY nombre ASC";
			$result2 = $conexion -> query($sql2);
		?>
		<div class="container">
			<div class="row">
				<nav class="navbar">
					<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"> 
						<a href="index.php">
							<img class="img-responsive imagen-centrada logo" src="img/logo.png" alt="Logo empresa">
						</a>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">      	
						<form class="navbar-form form-menu" action="listado.php" method="GET" onsubmit="return validarCombos()">
							<div class="form-group">
								<div class="div-combo">
									<select name="ciudades" id="ciudades" class="form-control combo-menu">
										<option value="">Seleccione una ciudad</option>
										<?php 
											if($result) {
												while($obj = mysqli_fetch_object($result)) { 			
													?>
													<option value="<?php echo $obj->id; ?>"><?php echo $obj->nombre; ?></option>
													<?php  
												}
											} 
										?>			
									</select>	
								</div>	
								<div class="div-combo" id="sucursalesdiv">
									<select name="sucursales" id="sucursales" class="form-control combo-menu">
										<option value="">Seleccione un cine</option>
									</select>
								</div>	
								<button type="submit" class="btn btn-default boton-menu btn btn-danger">Ver cartelera</button>
							</div>
						</form>
					</div>	
				</nav>
			</div>
			<div class="row text-center">
				<div class="col-xs-12">
					<h1 class="h1-contacto">Contáctanos</h1>
					<h4 class="h4-contacto">Déjanos tus comentarios, queremos saber lo que piensas</h4>
				</div>
				<div class="col-xs-4 col-xs-offset-4 col-md-2 col-md-offset-5 separa-hruler">
					<hr>
				</div>
			</div>
			<div class="row separa-form">
				<form method="post" action="datos/comentarios.php" name="formContacto" onsubmit="return validarContacto()">
					<div class="form-group col-xs-8 col-md-4 col-xs-offset-2">
						<label for="nombre">Nombre(s):* </label>
						<input id="nombre" name="nombre" type="text" class="form-control" placeholder="Teclea tu nombre">
					</div>
					<div class="form-group col-xs-8 col-md-4 col-xs-offset-2 col-md-offset-0">
						<label for="apellido">Apellido(s):* </label>
						<input id="apellido" name="apellido" type="text" class="form-control" placeholder="Teclea tu apellido">
					</div>
					<div class="col-xs-8 col-xs-offset-2">
						<div class="form-group">
							<label for="sucursal">Para sucursal:* </label>
							<select name="sucursal" id="sucursal" class="form-control">
								<option value="">Seleccione una sucursal</option>
								<?php 
									if($result2) {
										while($obj2 = mysqli_fetch_object($result2)) { 			
											?>
											<option value="<?php echo $obj2->id; ?>"><?php echo $obj2->nombre; ?></option>
											<?php  
										}
									} 
								?>
							</select>
						</div>
						<div class="form-group">
							<label for="asunto">Asunto:* </label>
							<input id="asunto" name="asunto" type="text" class="form-control" placeholder="Teclea tu asunto">
						</div>
						<div class="form-group">
							<label for="comentario">Comentarios:* </label>
							<textarea name="comentario" id="comentario" cols="30" rows="7" placeholder="Deja tus comentarios" class="form-control"></textarea>
						</div>
						<div class="form-group">
							<input type="submit" value="Enviar mensaje" class="btn btn-success btn-lg btn-enviar-letra">
						</div>
					</div>
				</form>	
			</div>
			<div class="row row-footer">
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 div-footer">
					<h3 class="h3-footer">Acerca de nosotros</h3>
					<a class="a-footer" href="nosotros.php">Nosotros</a>
					<a class="a-footer" href="http://www.w3schools.com">Términos y condiciones</a>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 div-footer">
					<h3 class="h3-footer">Contacto</h3>
					<a class="a-footer" href="contacto.php">Dejanos tus comentarios</a>
					<a class="a-footer">01 800 56 56 56</a>
				</div>	
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 div-footer">
					<h3 class="h3-footer">Redes sociales</h3>
					<div class="col-lg-2 icon-redes-footer">
						<a href="http://www.facebook.com" target="_blank">
							<img class="img-responsive" src="img/icons/facebook.png" 
							onmouseover="this.src='img/icons/facebook_hover.png'"
							onmouseout="this.src='img/icons/facebook.png'"alt="Logo empresa">
						</a>
					</div>
					<div class="col-lg-2 icon-redes-footer">
						<a href="http://www.twitter.com" target="_blank">
							<img class="img-responsive" src="img/icons/twitter.png" alt="Logo empresa"
							onmouseover="this.src='img/icons/twitter_hover.png'"
							onmouseout="this.src='img/icons/twitter.png'"alt="Logo empresa" >
						</a>
					</div>
					<div class="col-lg-2 icon-redes-footer">
						<a href="http://www.plus.google.com" target="_blank">
							<img class="img-responsive" src="img/icons/google.png" alt="Logo empresa" 
							onmouseover="this.src='img/icons/google_hover.png'"
							onmouseout="this.src='img/icons/google.png'" alt="Logo empresa">
						</a>	
					</div>
					<div class="col-lg-2 icon-redes-footer">
						<a href="http://www.instagram.com" target="_blank">
							<img class="img-responsive" src="img/icons/instagram.png" alt="Logo empresa"
							onmouseover="this.src='img/icons/instagram_hover.png'"
							onmouseout="this.src='img/icons/instagram.png'"alt="Logo empresa">
						</a>
					</div>
					<div class="col-lg-2 icon-redes-footer">
						<a href="http://www.youtube.com" target="_blank">
							<img class="img-responsive" src="img/icons/youtube.png" alt="Logo empresa"
							onmouseover="this.src='img/icons/youtube_hover.png'"
							onmouseout="this.src='img/icons/youtube.png'"alt="Logo empresa">
						</a>
					</div>
				</div>		
			</div>
			<div class="footer">
				<div class="container">
					<p class="texto-footer"><small>©Copyrigth 2015. Todos los derechos reservados a Cinesuyu®</small></p>
				</div>	
			</div>
		</div>	
	</body>
</html>