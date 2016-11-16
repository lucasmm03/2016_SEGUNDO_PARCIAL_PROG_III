function Login() {

		//IMPLEMENTAR...OK
		var email = $("#email").val();
		var password = $("#password").val();
		$.ajax({
			type: "POST",
			url: "./verificar_sesion.php",
			dataType: "text",
			data: {
				email : email,
				password : password
			}
		})
		.done(function(resultado)
		{
			if (resultado == "OK")
			{
				window.location.href="principal.php";
			}
			else if(resultado == "NO_OK")
			{
				alert("Error!!!\nNO coincide e-mail y/o password!!!");
			}
		})
		.fail(function()
		{
			alert("Error!!!");
		})
}