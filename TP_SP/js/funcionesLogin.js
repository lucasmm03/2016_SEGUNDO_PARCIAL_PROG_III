function Login() {

		//IMPLEMENTAR...
		var email = $("#email").val();
		var password = $("#password").val();
		$.ajax({
			type: "POST",
			url: "../verificar_sesion.php",
			dataType: "text",
			data: {
				email : email,
				password : password
			}
			async: true
		})
		.done(function()
		{

		})
		.fail(function()
		{

		})
}