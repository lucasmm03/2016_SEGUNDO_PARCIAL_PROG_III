function Logout() {//#2

		//IMPLEMENTAR...
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
			alert(resultado);
		})
		.fail(function()
		{

		})
}
function MostrarGrilla() {//#3
		//IMPLEMENTAR...
}
function Home() {//#3-sin case
		//IMPLEMENTAR...
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