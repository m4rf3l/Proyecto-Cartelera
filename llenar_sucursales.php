<?php
	include("conexion.php");
	$consulta = mysql_query("select id, nombre from sucursal where id_ciudad=".$_GET['id']);
	echo "<select name='sucursales' id='sucursales' class='form-control combo-menu'>";
	echo "<option value=''>Seleccione un cine</option>";
	while ($fila = mysql_fetch_array($consulta)) {
	    echo "<option value='" . $fila[0] . "'>" . utf8_encode($fila[1]) . "</option>";
	}
	echo "</select>";
?>