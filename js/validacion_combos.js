function validarCombos() {

	var combo1 = document.getElementById("ciudades");
	var combo2 = document.getElementById("sucursales");

	if(combo1.value == null || combo1.value == "" || combo2.value == null || combo2.value == "") {
		alert("Porfavor, seleccione la ciudad y cine.");
		return false;
	} else {
		return true;
	}
}


