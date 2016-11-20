function Logout() {//#2

		//IMPLEMENTAR...OK
		$.ajax({
			type: "POST",
			url: "./administracion.php",
			dataType: "text",
			data: {
				queMuestro : "2"
			},
			async: true
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
			},
			async: true
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
			},
			async: true
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
		var formData = new FormData();

		var imagen = $("#archivo")[0];
		formData.append("imagenASubir", imagen.files[0]);
		formData.append("queMuestro", "5");
		formData.append("fotoAnterior", $("#fotoTmp").attr("src"));
		formData.append("idUsuario", $("#hdnIdUsuario").val());

		$.ajax({
			type: "POST",
			url: "./administracion.php",
			dataType: "text",
			data: formData,
			contentType: false,
			processData: false,
			async: true
		})
		.done(function(resultado)
		{
			if (resultado.substring(0, 6) == "./tmp/")
			{
				$("#fotoTmp").attr("src", resultado);
			}
			else
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
			"foto" : ($("#fotoTmp").attr("src")).substring(6)
		};
		$.ajax({
			type: "POST",
			url: "./administracion.php",
			dataType: "text",
			data: {
				queMuestro : "6",
				usuarioAgregado : JSON.stringify(usuarioAgregado)
			},
			async: true
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
			"foto" : ($("#fotoTmp").attr("src")).substring(6)
		};
		$.ajax({
			type: "POST",
			url: "./administracion.php",
			dataType: "text",
			data: {
				queMuestro : "8",
				usuarioModificado : JSON.stringify(usuarioModificado)
			},
			async: true
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
			"foto" : ($("#fotoTmp").attr("src")).substring(6)
		};
		$.ajax({
			type: "POST",
			url: "./administracion.php",
			dataType: "text",
			data: {
				queMuestro : "8",
				usuarioModificado : JSON.stringify(usuarioModificado)
			},
			async: true
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
			},
			async: true
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
			},
			async: true
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
			alert("Campos vacíos o la clave es muy corta (tiene que tener 6 o más caracteres)");
			return false;
		}
		return true;
}