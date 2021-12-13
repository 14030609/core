<!DOCTYPE html>
<html lang="en">
<head>
	<title>CORE-LOGIN</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 4 -->
    <link rel='stylesheet' href='login/css/main.css' type='text/css' media='all' />
    <link rel='stylesheet' href='login/css/util.css' type='text/css' media='all' />
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

</head>
<body>


	<div class="container-contact100">


		<div  style="background-image: url(images/fondo-login.png);"  data-scrollwhell="0" data-draggable="1"></div>

		<div class="wrap-contact100">
			<div class="contact100-form-title" style="background-image: url(images/login.jpg);">
				<span class="contact100-form-title-1">
					Login
				</span>
            </div>

			<form class="contact100-form validate-form">

				<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
					<span class="label-input100">Correo:</span>
					<input class="input100" type="text" id="correo" name="email" placeholder="Correo electronico">
					<span class="focus-input100"></span>
				</div>

                <div class="wrap-input100 validate-input" data-validate="Name is required">
                    <span class="label-input100">Contraseña:</span>
                    <input class="input100" type="password" id="contrasenia" name="name" placeholder="Contraseña">
                    <span class="focus-input100"></span>
                </div>

				<div class="container-contact100-form-btn">
                    <button type="button" id="login" value="create" class="contact100-form-btn">Login</button>
                </div>
			</form>
        </div>
		</div>
	</div>

	<div id="dropDownSelect1"></div>


</body>
<style>
    /*body.background-image: url(images/fondo_login.png);*/
    body{
        /*background-image: url(images/fondo_login.png);*/
        background-image: url('images/fondo-login.png');
    }
</style>
<script src="//cdnjs.cloudflare.com/ajax/libs/list.js/2.3.1/list.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
<link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">

<script type="text/javascript">
    $('#login').click(function(e)
    {
        e.preventDefault();
        let correo = $('#correo').val();
        let contrasenia = $('#contrasenia').val();

        $.ajax({
            type:"POST",
            url:"{{ route('inicio-sesion') }}",
            data:
                {
                    'correo': correo,
                    'contrasenia': contrasenia,
                    "_token": "{{ csrf_token() }}",
                },
            success:function(datos)
            {
                console.log(datos);
                if(datos==1){
                    alert("Se ha logueado correctamente");
                location.href = "/post";
                }
                else{
                    alert("Error al loguearse");
                }
            },
            error: function(e)
            {
                //$("#ajax-alert").addClass("alert alert-danger").text('hola');
                console.log(e);
                alert("Hubo un error, porfavor repórtalo");
            }
        });
    });
</script>
</html>
