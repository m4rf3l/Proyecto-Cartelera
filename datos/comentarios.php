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

	if ($sql) {
		print("Registro exitoso <br>");
	}
	else
	{
		print("Error al registrar paciente <br>");
	}

	print("<a href='../contacto.php'>Regresar a la página anterior</a>");

	$conexion->close();
 ?>