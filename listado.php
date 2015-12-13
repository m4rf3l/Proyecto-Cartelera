<!DOCTYPE html>
<html>
	<head>
		<title>Cinesuyu</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/estilos_navbar_footer.css">
		<link rel="stylesheet" type="text/css" href="css/estilos_listado.css">
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

			//Consulta para obtener las peliculas de determinado cine (sucursal)
			$id_sucursal = $_GET["sucursales"];
			$sql2 = "SELECT DISTINCT * FROM pelicula, sucursalpelicula, sucursal WHERE sucursal.id = sucursalpelicula.id_sucursal and pelicula.id = sucursalpelicula.id_pelicula and sucursal.id=$id_sucursal and estreno = 0";
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
					<?php 
						if($result2) {
							$obj2 = mysqli_fetch_object($result2)	
							?>
							<h1 class="h1-listado">Películas en <?php echo $obj2->nombre; ?></h1>
							<?php  			 				
						} 
					?>			
				</div>		
			</div>
			<div class="row">
				<?php 
					if($result2) {
						 do {
							?>
							<div class="col-lg-5 col-lg-offset-2 col-md-6 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12 div-elemento">
								<a href="pelicula.php?id=<?php echo $obj2->id."&titulo=".$obj2->titulo."&sinopsis=".$obj2->sinopsis."&duracion=".$obj2->duracion."&clasificacion=".$obj2->clasificacion."&genero=".$obj2->genero."&director=".$obj2->director."&reparto=".$obj2->reparto."&idioma=".$obj2->idioma."&anio=".$obj2->anio."&ruta=".$obj2->ruta."&estreno=".$obj2->estreno."&trailer=".$obj2->trailer?>">
									<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
										<img class="img-responsive img-rounded imagen-centrada" src="img/posters/<?php echo $obj2->ruta; ?>" alt="<?php echo $obj2->ruta; ?>" width="190" height="280">
									</div>
								</a>
								<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
									<a href="pelicula.php?id=<?php echo $obj2->id."&titulo=".$obj2->titulo."&sinopsis=".$obj2->sinopsis."&duracion=".$obj2->duracion."&clasificacion=".$obj2->clasificacion."&genero=".$obj2->genero."&director=".$obj2->director."&reparto=".$obj2->reparto."&idioma=".$obj2->idioma."&anio=".$obj2->anio."&ruta=".$obj2->ruta."&estreno=".$obj2->estreno."&trailer=".$obj2->trailer?>">
										<h2 class="h2-titulo"><?php echo $obj2->titulo; ?></h2>
									</a>
									<h4 class="h4-clasificacion-duracion"><?php echo $obj2->clasificacion; ?> | <?php echo $obj2->duracion; ?> </h4>
									<h3 class="h3-horarios">Horarios</h3>
									<?php 
									$numero_caracteres = strlen($obj2->horarios);
									$horarios = $obj2 -> horarios;
									$cadena = "";
									for ($i = 0; $i < $numero_caracteres; $i++) {
										if($horarios[$i] != " ") {
											$cadena .= $horarios[$i];
										} else {
											?>			

											<h5 class="h5-hora"><?php echo $cadena?></h5>
											<?php		
											$cadena = "";
										}
									}
									?>
									<h5 class="h5-hora"><?php echo $cadena?></h5>
								</div>	
							</div>				
							<?php  			 				
						} while($obj2 = mysqli_fetch_object($result2));
					}	
				?>			
			</div>	
			<div class="row row-footer">
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 div-footer">
					<h3 class="h3-footer">Acerca de nosotros</h3>
					<a class="a-footer" href="nosotros.html">Nosotros</a>
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