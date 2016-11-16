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
		//IMPLEMENTAR...
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
function CargarFormUsuario() {//#4
		//IMPLEMENTAR...
}
function SubirFoto() {//#5
		//IMPLEMENTAR...
}
function AgregarUsuario() {//#6
		//IMPLEMENTAR...
}
function EditarUsuario(obj) {//#7 sin case
		//IMPLEMENTAR...
}
function EliminarUsuario() {//#7
		//IMPLEMENTAR...
}
function ModificarUsuario() {//#8
		//IMPLEMENTAR...
		$.ajax({
			type: "POST",
			url: "./administracion.php",
			dataType: "text",
			data: {
				queMuestro : "8"
			}
		})
		.done(function(resultado)
		{
			$("#divAbm").html(resultado);
		})
		.fail(function()
		{
			alert("Error!!!");
		})
}
function ElegirTheme() {//#9
		//IMPLEMENTAR...
}
function AplicarTheme(radio) {//sin case
		//IMPLEMENTAR...
}
function GuardarTheme() {//#10
		//IMPLEMENTAR...
}