<?php
//IMPLEMENTAR...OK
require_once ("./verificar_sesion.php");
if ($_POST["queHago"] != "Agregar")
{
    $usuario = Usuario::TraerUnUsuarioPorId($_POST["idUsuario"]);
}
else
{
    $usuario = new stdClass();
    $usuario->id = 0;
    $arrayDeUsuarios = Usuario::TraerTodosLosUsuarios();
    foreach ($arrayDeUsuarios as $value)    //le asigno un id +1 que al mas grande que haya
    {
        if ($value["id"] >= $usuario->id)
        {
            $usuario->id = $value["id"] + 1;
        }
    }
    $usuario->nombre = "";
    $usuario->email = "";
    $usuario->password = "";
    $usuario->perfil = "";
    $usuario->foto = "pordefecto.jpg";
}
$usuarioEnSesion = json_decode($_SESSION["Usuario"]);

?>
<div id="divFrm" class="animated bounceInLeft" style="height:330px;overflow:auto;margin-top:0px;border-style:solid">
    <input type="hidden" id="hdnIdUsuario" value="<?php /*IMPLEMENTAR...OK*/echo $usuario->id; ?>" />
    <input type="text" placeholder="Nombre" id="txtNombre" value="<?php /*IMPLEMENTAR...OK*/echo $usuario->nombre; ?>" <?php if ($usuarioEnSesion->perfil != "administrador" || $_POST["queHago"] == "Eliminar") { echo "readonly"; }?> />
    <input type="text" placeholder="E-mail" id="txtEmail" value="<?php /*IMPLEMENTAR...OK*/echo $usuario->email; ?>" <?php if ($usuarioEnSesion->perfil != "administrador" || $_POST["queHago"] == "Eliminar") { echo "readonly"; }?> />
    <input type="password" placeholder="Password" id="txtPassword" value="<?php /*IMPLEMENTAR...OK*/echo $usuario->password; ?>" <?php if ($_POST["queHago"] == "Eliminar") { echo "readonly"; }?> />

    <span>Perfil</span>
    <select id="cboPerfiles" <?php if ($usuarioEnSesion->perfil != "administrador" || $_POST["queHago"] == "Eliminar") { echo "disabled"; }?> >
        <?php
		//IMPLEMENTAR...OK
        echo "<option "; if($usuario->perfil == "administrador")echo "selected"; echo ">administrador</option>
            <option "; if($usuario->perfil == "usuario")echo "selected"; echo ">usuario</option>
            <option "; if($usuario->perfil == "invitado")echo "selected"; echo ">invitado</option>";
		?>	
    </select>
    <br/><br/>

    <?php
        if ($_POST["queHago"] != "Eliminar")
        {
            echo '<input type="file" id="archivo" onchange="SubirFoto()" />';
        }
    ?>

    <input type="button" class="MiBotonUTN" onclick="<?php
                                                    //IMPLEMENTAR...
                                                    switch ($_POST['queHago'])
                                                    {
                                                        case 'Modificar':
                                                            echo 'ModificarUsuario()';
                                                            break;
                                                        case 'Eliminar':
                                                            echo 'EliminarUsuario()';
                                                            break;
                                                        case 'Agregar':
                                                            echo 'AgregarUsuario()';
                                                            break;
                                                        case 'Editar':
                                                            echo 'EditarUsuario()';
                                                            break;
                                                        default:
                                                            break;
                                                    }
                                                    ?>"
                                            value="<?php
                                                    //IMPLEMENTAR...
                                                    switch ($_POST['queHago'])
                                                    {
                                                        case 'Modificar':
                                                            echo 'Modificar';
                                                            break;
                                                        case 'Eliminar':
                                                            echo 'Eliminar';
                                                            break;
                                                        case 'Agregar':
                                                            echo 'Agregar';
                                                            break;
                                                        case 'Editar':
                                                            echo 'Editar';
                                                            break;
                                                        default:
                                                            break;
                                                    }
                                                    ?>"  />
    <input type="hidden" id="hdnQueHago" value="agregar" />
</div>
<div id="divFoto"  class="animated bounceInLeft" style="border-style:none" >
    <div style="width:25%;float:left"></div>
    <div style="width:75%;float:right">

        <img id="fotoTmp" src="./fotos/<?php /*IMPLEMENTAR...OK*/echo $usuario->foto; ?>" width="130px" height="130px" style="float:left" class="fotoform" />

        <input type="hidden" id="hdnFotoSubir" value="<?php /*IMPLEMENTAR...OK*/echo $usuario->foto; ?>" />

    </div>
</div>