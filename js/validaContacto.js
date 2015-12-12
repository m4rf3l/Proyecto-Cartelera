/*Validaciones para el formulario de contacto*/

function validarContacto() {
	
	var letras = /^[a-zA-Zá-úÁ-Ú ]+$/;
	var blancos = /^[ ]+$/;

	// Validar nombre
	var nombre = document.forms["formContacto"]["nombre"].value;
	document.getElementById('nombre').className = "form-control";
	if(nombre == null || nombre.match(blancos) || nombre == "") {
		document.getElementById('nombre').className = "form-control error-focus";
		document.forms["formContacto"]["nombre"].focus();
		return false;
	}
	else
	{
		if(!nombre.match(letras))
		{
			document.getElementById('nombre').className = "form-control error-focus";
			document.forms["formContacto"]["nombre"].focus();
			return false;
		}
	}

	// Validar apellido
	var apellido = document.forms["formContacto"]["apellido"].value;
	document.getElementById('apellido').className = "form-control";
	if(apellido == null || apellido.match(blancos) || apellido == "") {
		document.getElementById('apellido').className = "form-control error-focus";
		document.forms["formContacto"]["apellido"].focus();
		return false;
	}
	else
	{
		if(!apellido.match(letras))
		{
			document.getElementById('apellido').className = "form-control error-focus";
			document.forms["formContacto"]["apellido"].focus();
			return false;
		}
	}

	//Validar que se haya seleccionado una sucursal válida
	var indice = document.getElementById('sucursal').selectedIndex;
	document.getElementById('sucursal').className = "form-control";
	if (indice == null || indice == 0)
	{
		document.getElementById('sucursal').className = "form-control error-focus";
		document.getElementById('sucursal').focus();
		return false;
	}

	// Validar asunto
	var asunto = document.forms["formContacto"]["asunto"].value;
	document.getElementById('asunto').className = "form-control";
	if(asunto == null || asunto.match(blancos) || asunto == "") {
		document.getElementById('asunto').className = "form-control error-focus";
		document.forms["formContacto"]["asunto"].focus();
		return false;
	}

	// Validar comentario
	var comentario = document.forms["formContacto"]["comentario"].value;
	document.getElementById('comentario').className = "form-control";
	if(comentario == null || comentario.match(blancos) || comentario == "") {
		document.getElementById('comentario').className = "form-control error-focus";
		document.forms["formContacto"]["comentario"].focus();
		return false;
	}
}