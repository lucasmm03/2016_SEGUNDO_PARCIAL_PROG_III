function Logout() {//#2

		//IMPLEMENTAR...OK
		$.ajax({
			type: "POST",
			url: "./administracion.php",
			dataType: "text",
			data: {
				queMuestro : "2"
			}
		})
		.done(function(resultado)
		{
			if (resultado == "LOGOUT")
			{
				window.location.href="login.php";
			}
			else
			{
				alert("Error al salir!!!");
			}
		})
		.fail(function()
		{
			alert("Error!!!");
		})
}
function MostrarGrilla() {//#3
		//IMPLEMENTAR...OK
		$.ajax({
			type: "POST",
			url: "./administracion.php",
			dataType: "text",
			data: {
				queMuestro : "3"
			}
		})
		.done(function(resultado)
		{
			$("#divGrillaTheme").html("");
			$("#divGrilla").html(resultado);
		})
		.fail(function()
		{
			alert("Error!!!");
		})
}
function Home() {//#3-sin case
		//IMPLEMENTAR...OK
		window.location.href="principal.php";
}
function CargarFormUsuario(queHago = 0, idUsuario = 0) {//#4
		//IMPLEMENTAR...OK

		switch(queHago)
		{
			case 1:
				queHago = "Modificar";
				break;
			case 2:
				queHago = "Eliminar";
				break;
			case 3:
				queHago = "Agregar";
				break;
			case 4:
				queHago = "Editar";
				break;
			default:
				break;
		}

		$.ajax({
			type: "POST",
			url: "./administracion.php",
			dataType: "text",
			data: {
				queMuestro : "4",
				queHago : queHago,
				idUsuario : idUsuario
			}
		})
		.done(function(resultado)
		{
			$("#divGrillaTheme").html("");
			$("#divAbm").html(resultado);
		})
		.fail(function()
		{
			alert("Error!!!");
		})
}
function SubirFoto() {//#5
		//IMPLEMENTAR...OK
		var imagen = $("#archivo").val();
		$.ajax({
			type: "POST",
			url: "./administracion.php",
			dataType: "text",
			data: {
				queMuestro : "5",
				imagen : imagen
			}
		})
		.done(function(resultado)
		{
			if (resultado != "OK")
			{
				alert(resultado);
			}
		})
		.fail(function()
		{
			alert("Error!!!");
		})
}
function AgregarUsuario() {//#6
		//IMPLEMENTAR...
		var nombre = $("#txtNombre").val();
		var email = $("#txtEmail").val();
		var password = $("#txtPassword").val();
		if (!ValidarDatos(nombre, email, password))
		{
			return;
		}
		var usuarioAgregado = {
			"nombre" : nombre,
			"email" : email,
			"password" : password,
			"perfil" : $("#cboPerfiles").val(),
			"foto" : "pordefecto.jpg"
		};
		$.ajax({
			type: "POST",
			url: "./administracion.php",
			dataType: "text",
			data: {
				queMuestro : "6",
				usuarioAgregado : usuarioAgregado
			}
		})
		.done(function(resultado)
		{
			if (resultado == "OK")
			{
				alert("Usuario agregado!!!");
			}
			else
			{
				alert("No se pudo agregar el usuario");
			}
		})
		.fail(function()
		{
			alert("Error!!!");
		})		
}
function EditarUsuario() {//#7 sin case
		//IMPLEMENTAR...
		var nombre = $("#txtNombre").val();
		var email = $("#txtEmail").val();
		var password = $("#txtPassword").val();
		if (!ValidarDatos(nombre, email, password))
		{
			return;
		}
		var usuarioModificado = {
			"nombre" : nombre,
			"email" : email,
			"password" : password,
			"perfil" : $("#cboPerfiles").val(),
			"foto" : $("#archivo").val()
		};
		$.ajax({
			type: "POST",
			url: "./administracion.php",
			dataType: "text",
			data: {
				queMuestro : "8",
				usuarioModificado : usuarioModificado
			}
		})
		.done(function(resultado)
		{
			if (resultado == "OK")
			{
				alert("Perfil editado!!!");
			}
			else
			{
				alert("No se pudo editar el perfil");
			}
		})
		.fail(function()
		{
			alert("Error!!!");
		})		
}
function EliminarUsuario() {//#7
		//IMPLEMENTAR...
		var idUsuario = $("#hdnIdUsuario").val();
		$.ajax({
			type: "POST",
			url: "./administracion.php",
			dataType: "text",
			data: {
				queMuestro : "7",
				idUsuario : idUsuario
			}
		})
		.done(function(resultado)
		{
			if (resultado == "OK")
			{
				alert("Usuario eliminado!!!");
			}
			else
			{
				alert("No se pudo eliminar el usuario");
			}
		})
		.fail(function()
		{
			alert("Error!!!");
		})		
}
function ModificarUsuario() {//#8
		//IMPLEMENTAR...
		var nombre = $("#txtNombre").val();
		var email = $("#txtEmail").val();
		var password = $("#txtPassword").val();
		if (!ValidarDatos(nombre, email, password))
		{
			return;
		}
		var usuarioModificado = {
			"nombre" : nombre,
			"email" : email,
			"password" : password,
			"perfil" : $("#cboPerfiles").val(),
			"foto" : $("#archivo").val()
		};
		$.ajax({
			type: "POST",
			url: "./administracion.php",
			dataType: "text",
			data: {
				queMuestro : "8",
				usuarioModificado : usuarioModificado
			}
		})
		.done(function(resultado)
		{
			if (resultado == "OK")
			{
				alert("Usuario modificado!!!");
			}
			else
			{
				alert("No se pudo modificar el usuario");
			}
		})
		.fail(function()
		{
			alert("Error!!!");
		})		
}
function ElegirTheme() {//#9
		//IMPLEMENTAR...OK
		$.ajax({
			type: "POST",
			url: "./administracion.php",
			dataType: "text",
			data: {
				queMuestro : "9",
			}
		})
		.done(function(resultado)
		{
			$("#divAbm").html("");
			$("#divGrilla").html("");
			$("#divGrillaTheme").html(resultado);
		})
		.fail(function()
		{
			alert("Error!!!");
		})		
}
function AplicarTheme(radio) {//sin case
		//IMPLEMENTAR...OK
		var color = $("#" + radio).val();
		$("#miBody").css("background-color", color);
}
function GuardarTheme() {//#10
		//IMPLEMENTAR...
		var color = $("#miBody").css("background-color");
		$.ajax({
			type: "POST",
			url: "./administracion.php",
			dataType: "text",
			data: {
				queMuestro : "10",
				color : color
			}
		})
		.done(function(resultado)
		{
			if (resultado == "OK")
			{
				alert("Tema guardado!!!");
			}
			else
			{
				alert("No se pudo guardar el tema");
			}
		})
		.fail(function()
		{
			alert("Error!!!");
		})		
}
function ValidarDatos(nombre, email, password) {
		if (nombre.length == 0 || email.length == 0 || password.length < 6)
		{
			return false;
		}
		return true;
}