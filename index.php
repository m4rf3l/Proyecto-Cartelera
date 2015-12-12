<!DOCTYPE html>
<html>
	<head>
		<title>Cinesuyu</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/estilos_index.css">
		<link href='https://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'>
		<!--Script para validar que en ambos combos haya seleccion -->
		<script type="text/javascript" src="js/validacion_combos.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
		<style>
		  .carousel-inner > .item > img,
		  .carousel-inner > .item > a > img {
		      width: 100%;
		      margin: auto;
		      max-height: 450px;
		  }
		</style>
		<!--Script para llenar el combos de los cines-->
		<script type="text/javascript">
            $(document).ready(function(){
                $('#ciudades').change(function(){
                    var id=$('#ciudades').val();
                    $('#sucursalesdiv').load('llenar_sucursales.php?id='+id);
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

			//Consulta para el combo de ciudades
			$sql = "SELECT * FROM ciudad";
			$result = $conexion -> query($sql);	

			//Consulta para las peliculas en cartelera
			$sql2 = "SELECT * FROM pelicula WHERE estreno = 0";
			$result2 = $conexion -> query($sql2);	

			//Consulta para las peliculas de estreno
			$sql3 = "SELECT * FROM pelicula WHERE estreno = 1";
			$result3 = $conexion -> query($sql3);	
		?>
		<div class="container">
			<div class="row">
				<nav class="navbar">
					<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"> 
					    <a href="index.php">
					    	<img class="img-responsive imagen-centrada logo" src="images/logo.png" alt="Logo empresa">
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
			<div class="row row-carousel">
				<div id="myCarousel" class="carousel slide" data-ride="carousel">  
				    <!-- Indicators -->
				    <ol class="carousel-indicators">
				      	<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				      	<li data-target="#myCarousel" data-slide-to="1"></li>
				      	<li data-target="#myCarousel" data-slide-to="2"></li>
				      	<li data-target="#myCarousel" data-slide-to="3"></li>
				      	<li data-target="#myCarousel" data-slide-to="4"></li>
				    </ol>
				    <!-- Wrapper for slides -->
				    <div class="carousel-inner" role="listbox">
				      	<div class="item active">
					        <img src="images/banner1.jpg" alt="Chania" width="460" height="345">
					    </div>

					    <div class="item">
					        <img src="images/banner2.jpg" alt="Chania" width="460" height="345">
					    </div>
					    
					    <div class="item">
					        <img src="images/banner3.jpg" alt="Flower" width="460" height="345">
					    </div>

					    <div class="item">
					        <img src="images/banner4.jpg" alt="Flower" width="460" height="345">
					    </div>
					    <div class="item">
					        <img src="images/banner5.jpg" alt="Flower" width="460" height="345">
					    </div>
				    </div>
				</div>
			</div>
			<div class="row text-center">
				<div class="col-xs-12">
					<h1 class="h1-cartelera">¡La experiencia y emoción del cine!</h1>
					<h4 class="h5-cartelera">Consulta nuestra cartelera y no te pierdas de nuestros próximos <br> estrenos, promociones y descuentos.</h4>
				</div>					
			</div>	
			<div class="row text-center">
				<div class="col-xs-12">
					<h2 class="h2-cartelera">En cartelera</h2>
				</div>	
			</div>		

			<div class="row text-center">
				<?php 
					if($result2) {
						while($obj2 = mysqli_fetch_object($result2)) {		
				?>
				<div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
					<a class="a-poster" href="http://www.w3schools.com">
						<img class="img-responsive img-rounded imagen-centrada" src="images/posters/<?php echo $obj2->ruta; ?>" alt="<?php echo $obj2->ruta; ?>" width="190" height="280">
						<h5><?php echo $obj2->titulo; ?></h5>
						<h5><?php echo $obj2->duracion; ?></h5>
						<h5><?php echo $obj2->genero; ?></h5>
					</a>	
				</div>
				 <?php  
						}
					} 	
				?>	
			</div>
			<div class="row text-center row-estrenos">
				<div class="col-xs-12">
					<h2 class="h2-estrenos">Próximamente en cartelera</h2>
				</div>
				
				
				<?php 
					if($result3) {
						while($obj3 = mysqli_fetch_object($result3)) {		
				?>
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
					<a class="a-estreno" href="http://www.w3schools.com">
						<img class="img-responsive img-rounded imagen-centrada" src="images/estrenos/<?php echo $obj3->ruta; ?>" alt="<?php echo $obj3->ruta; ?>" width="190" height="280">
						<h5 class="h5-estrenos"><?php echo $obj3->titulo; ?></h5>
						<h5 class="h5-estrenos"><?php echo $obj3->fecha; ?></h5>
					</a>	
				</div>
				 <?php  
						}
					} 
					$conexion -> close ();
				?>			
			</div>
			<div class="row row-footer">
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 div-footer">
					<h3 class="h3-footer">Acerca de nosotros</h3>
					<a class="a-footer" href="http://www.w3schools.com">Nosotros</a>
					<a class="a-footer" href="http://www.w3schools.com">Términos y condiciones</a>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 div-footer">
					<h3 class="h3-footer">Contacto</h3>
					<a class="a-footer" href="http://www.w3schools.com">Dejanos tus comentarios</a>
					<a class="a-footer">01 800 56 56 56</a>
				</div>	
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 div-footer">
					<h3 class="h3-footer">Redes sociales</h3>
					<div class="col-lg-2 icon-redes-footer">
						<a href="http://www.facebook.com" target="_blank">
							<img class="img-responsive" src="images/icons/facebook.png" 
							onmouseover="this.src='images/icons/facebook_hover.png'"
							onmouseout="this.src='images/icons/facebook.png'"alt="Logo empresa">
						</a>
					</div>
					<div class="col-lg-2 icon-redes-footer">
						<a href="http://www.twitter.com" target="_blank">
							<img class="img-responsive" src="images/icons/twitter.png" alt="Logo empresa"
							onmouseover="this.src='images/icons/twitter_hover.png'"
							onmouseout="this.src='images/icons/twitter.png'"alt="Logo empresa" >
						</a>
					</div>
					<div class="col-lg-2 icon-redes-footer">
						<a href="http://www.plus.google.com" target="_blank">
							<img class="img-responsive" src="images/icons/google.png" alt="Logo empresa" 
							onmouseover="this.src='images/icons/google_hover.png'"
							onmouseout="this.src='images/icons/google.png'" alt="Logo empresa">
						</a>	
					</div>
					<div class="col-lg-2 icon-redes-footer">
						<a href="http://www.instagram.com" target="_blank">
							<img class="img-responsive" src="images/icons/instagram.png" alt="Logo empresa"
							onmouseover="this.src='images/icons/instagram_hover.png'"
							onmouseout="this.src='images/icons/instagram.png'"alt="Logo empresa">
						</a>
					</div>
					<div class="col-lg-2 icon-redes-footer">
						<a href="http://www.youtube.com" target="_blank">
							<img class="img-responsive" src="images/icons/youtube.png" alt="Logo empresa"
							onmouseover="this.src='images/icons/youtube_hover.png'"
							onmouseout="this.src='images/icons/youtube.png'"alt="Logo empresa">
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