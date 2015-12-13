<!DOCTYPE html>
<html>
	<head>
		<title>Cinesuyu</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/estilos_navbar_footer.css">
		<link rel="stylesheet" type="text/css" href="css/estilos_pelicula.css">
		<link href='https://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'>
		<!--Script para validar que en ambos combos haya seleccion -->
		<script type="text/javascript" src="js/validacion_combos.js"></script>
		<!--Script para llenar el combos de los cines-->
		<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
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
			<div class="row">
				<div class="col-xs-12 div-info-pelicula">
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
						<?php 
							$estreno = $_GET["estreno"];
							if($estreno == 1) {
						?>
						<img class="img-responsive img-rounded imagen-centrada" name="ruta" src="img/estrenos/<?php echo $_GET["ruta"]; ?>" alt="poster" width="190" height="280">
						<?php
							} else {
						?>
						<img class="img-responsive img-rounded imagen-centrada" name="ruta" src="img/posters/<?php echo $_GET["ruta"]; ?>" alt="poster" width="190" height="280">
						<?php
							}
						?>	
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<h1 class="h1-titulo-pelicula" name="titulo" value=""><?php echo $_GET["titulo"]; ?></h1>
						<h3 class="h3-sinopsis">Sinopsis</h3>
						<p class="p-sinopsis" name="sinopsis" value="">
							<?php echo $_GET["sinopsis"]; ?>
						</p>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 columna-info">
						<a class="boton-trailer" href="<?php echo $_GET["trailer"]; ?>" target="_blank">Ver Trailer</a>
						<h5 class="titulo-info">Duración:<h5>
						<h4 class="valor-info" name="duracion" value=""><?php echo $_GET["duracion"]; ?></h4>
						<h5 class="titulo-info">Clasificación:<h5>
						<h4 class="valor-info" name="clasificacion" value=""><?php echo $_GET["clasificacion"]; ?></h4>
						<h5 class="titulo-info">Género:<h5>
						<h4 class="valor-info"name="genero" value=""><?php echo $_GET["genero"]; ?></h4>
						<h5 class="titulo-info">Director:<h5>
						<h4 class="valor-info" name="director" value=""><?php echo $_GET["director"]; ?></h4>
						<h5 class="titulo-info">Reparto:<h5>
						<h4 class="valor-info" name="reparto" value=""><?php echo $_GET["reparto"]; ?></h4>
						<h5 class="titulo-info">Idioma:<h5>
						<h4 class="valor-info" name="idioma" value=""><?php echo $_GET["idioma"]; ?></h4>
						<h5 class="titulo-info">Año:<h5>
						<h4 class="valor-info" name="anio" value=""><?php echo $_GET["anio"]; ?></h4>
					</div>
				</div>
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