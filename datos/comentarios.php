 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
 	<script src="../js/bootstrap.js"></script>
 	<title>Respuesta</title>
 </head>
 <body>
 	<?php 
	 	$server="localhost";
	 	$user="root";
	 	$password="";
	 	$bd="comentarios";

	 	$conexion=new mysqli($server, $user, $password, $bd);

	 	if ($conexion->connect_error) {
	 		print("Error en la conexión a la Base de Datos.");
	 	}

	 	$nombre=$_POST["nombre"];
	 	$apellido=$_POST["apellido"];
	 	$sucursal=$_POST["sucursal"];
	 	$asunto=$_POST["asunto"];
	 	$comentario=$_POST["comentario"];

	 	$sql=mysqli_query($conexion, "INSERT INTO comentarios (nombre, apellido, sucursal, asunto, comentario) values ('$nombre', '$apellido', $sucursal, '$asunto', '$comentario')");
 	?>
 	<div id="myModal" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
 		<div class="modal-dialog" >

 			<!-- Modal content-->
 			<div class="modal-content">
 				<div class="modal-header">
 					<button type="button" class="close"><a style="text-decoration: none" href='../contacto.php'>&times;</a></button>
 					<h4 class="modal-title">Resultado del envío</h4>
 				</div>
 				<div class="modal-body">
 					<p>
 						<?php
	 						if ($sql) {
	 							print("El comentario fué enviado correctamente.");
	 						} else	{
	 							print("Error al enviar comentario.");
	 						}
	 						$conexion->close();
 						?>
 					</p>
 				</div>
 				<div class="modal-footer">
 					<button type="button" class="btn btn-primary" ><a style="text-decoration: none; color: #FFFFFF" href='../contacto.php'>Regresar</a></button>
 				</div>
 			</div>
 		</div>
 	</div>
 	<script>
 		$('#myModal').modal('show'); 
 	</script>
 </body>
 </html>